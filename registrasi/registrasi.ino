#include <SPI.h>
#include <MFRC522.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

#define SS_PIN 10
#define RST_PIN 9
#define BUZZER_PIN 8

MFRC522 mfrc522(SS_PIN, RST_PIN);
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  Serial.begin(9600);
  SPI.begin();
  mfrc522.PCD_Init();
  lcd.begin(16, 2);
  lcd.backlight();
  pinMode(BUZZER_PIN, OUTPUT);
  lcd.setCursor(0, 0);
  lcd.print("Scan Your Card");
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent()) {
    if (mfrc522.PICC_ReadCardSerial()) {
      String uid = "";
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        uid += String(mfrc522.uid.uidByte[i], DEC) + " ";
      }

      Serial.println(uid);  // Kirim UID ke Python

      // Tunggu respons dari Python
      while (Serial.available() == 0) {}

      String response = Serial.readStringUntil('\n');

      lcd.clear();
      if (response == "berhasil") {
        lcd.setCursor(0, 0);
        lcd.print("Absen Berhasil");
      } else if (response == "sudah_absen") {
        lcd.setCursor(0, 0);
        lcd.print("Anda sudah absen");
      } else if (response == "gagal") {
        lcd.setCursor(0, 0);
        lcd.print("Absen Gagal");
        lcd.setCursor(0, 1);
        lcd.print("UID tidak terdaftar");
      } else if(response == "sudah_absen")
      {
        lcd.setCursor(0, 0);
        lcd.print("Anda Sudah Absen");
        lcd.setCursor(0, 1);
        lcd.print("Tidak Perlu Absen Lagi");
      }

      tone(BUZZER_PIN, 1000);
      delay(1000);
      noTone(BUZZER_PIN);

      delay(2000);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Scan Your Card");
    }
  }
}