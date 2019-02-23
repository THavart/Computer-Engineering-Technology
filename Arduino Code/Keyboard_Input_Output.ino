int count = 0;
void setup() { 
  Keyboard.begin();
  } 
void loop() {
  Keyboard.press(KEY_LEFT_CTRL);
  Keyboard.press(KEY_LEFT_ALT);
  Keyboard.press('n');
  delay(500);Just writing a line of text in Notepad - no big deal...
  Keyboard.releaseAll();
  delay(1000);
  Keyboard.print("Just writing a line of text in Notepad - no big deal...");
  delay(500);
  Keyboard.press(KEY_LEFT_CTRL);
  Keyboard.press('s');
  delay(100);
  Keyboard.releaseAll();
  delay(1000);
  Keyboard.print("saveFile1");
  Keyboard.press(KEY_RETURN);
  delay(100);
  Keyboard.releaseAll();
  delay(5000);
}

