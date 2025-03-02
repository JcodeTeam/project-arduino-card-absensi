import serial
import mysql.connector
import time
import serial.tools.list_ports

# Fungsi untuk menemukan port Arduino
def cari_port_arduino():
    ports = serial.tools.list_ports.comports()
    for port in ports:
        if 'Arduino' in port.description or 'CH340' in port.description:  # Sesuaikan deskripsi sesuai perangkat Anda
            return port.device
    raise Exception("Port Arduino tidak ditemukan. Pastikan perangkat terhubung.")

# Koneksi Serial ke Arduino
try:
    port_arduino = cari_port_arduino()
    ser = serial.Serial(port_arduino, 9600)  # Sambungkan ke port Arduino yang ditemukan
    print(f"Arduino terhubung pada port: {port_arduino}")
except Exception as e:
    print(f"Error: {e}")
    exit()

# Koneksi ke database MySQL
try:
    conn = mysql.connector.connect(
        host="localhost",
        user="root",         # Ganti dengan username MySQL Anda
        password="",          # Ganti dengan password MySQL Anda
        database="card_access"    # Pastikan database ini sudah ada
    )
    cursor = conn.cursor()
    print("Koneksi ke database berhasil.")
except mysql.connector.Error as err:
    print(f"Error: {err}")
    exit()

# Fungsi untuk mengecek keberadaan UID di tabel data_siswa
def cek_uid_terdaftar(uid):
    cursor.execute("SELECT * FROM data_siswa WHERE uid = %s", (uid,))
    result = cursor.fetchone()
    return result[0] if result else None

# Fungsi untuk mengecek apakah sudah absen hari ini
def sudah_absen_hari_ini(uid):
    tanggal_hari_ini = time.strftime('%Y-%m-%d')
    cursor.execute("SELECT * FROM data_absen WHERE uid = %s AND DATE(waktu) = %s", (uid, tanggal_hari_ini))
    return cursor.fetchone() is not None

# Fungsi untuk mencatat absensi
def catat_absensi(uid):
  # Ambil waktu absensi saat ini
    waktu_absen = time.strftime('%Y-%m-%d %H:%M:%S')
    
    # Cek apakah UID sudah ada dalam tabel data_absen
    cursor.execute("SELECT * FROM data_absen WHERE uid = %s", (uid,))
    result = cursor.fetchone()

    if result:
        # Jika UID sudah ada, beri pesan bahwa absensi sudah tercatat
        print(f"UID {uid} sudah tercatat pada {result[1]}. Tidak perlu mencatat lagi.")
        ser.write(b'sudah_absen\n')
    else:
        # Jika UID belum ada, catat absensi
        cursor.execute("INSERT INTO data_absen (uid, waktu) VALUES (%s, %s)", (uid, waktu_absen))
        conn.commit()
        print(f"Absensi untuk UID {uid} tercatat pada {waktu_absen}.")
        ser.write(b'berhasil\n')  # Kirim status ke Arduino  # Kirim status ke Arduino

print("Menunggu data dari RFID...")

# Loop utama untuk membaca data RFID
try:
    while True:
        if ser.in_waiting > 0:
            rfid_uid = ser.readline().decode('latin-1').strip()  # Membaca data dari serial
            print(f"UID terbaca: {rfid_uid}")
            uid = cek_uid_terdaftar(rfid_uid)
            if uid:
                if sudah_absen_hari_ini(uid):
                    print("Anda sudah absen.")
                    ser.write(b'sudah_absen\n')  # Kirim status ke Arduino
                else:
                    catat_absensi(rfid_uid)  # Catat UID dan NISN
            else:
                print("UID tidak terdaftar.")
                ser.write(b'gagal\n')  # Kirim status ke Arduino

except KeyboardInterrupt:
    print("Program dihentikan oleh pengguna.")

finally:
    cursor.close()
    conn.close()
    ser.close()