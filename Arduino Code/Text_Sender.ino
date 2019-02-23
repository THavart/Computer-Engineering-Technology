void setup() {
  // put your setup code here, to run once:
  delay(500);
  Keyboard.begin();
}

void loop() {
  Keyboard.press(KEY_LEFT_CTRL);
  Keyboard.press(KEY_ESC);
  Keyboard.releaseAll();
  delay(500);
  Keyboard.print("Mail");
  delay(250);
  Keyboard.press(KEY_RETURN);   
  Keyboard.releaseAll();
  delay(1000);
  Keyboard.press(KEY_LEFT_CTRL);
  Keyboard.press(KEY_LEFT_SHIFT);
  Keyboard.press('m');
  delay(500);
  Keyboard.releaseAll();
  Keyboard.print("6136004093@txt.bell.ca");
  Keyboard.press(KEY_TAB);
  Keyboard.releaseAll();
  delay(500);
  Keyboard.press(KEY_TAB);
  Keyboard.releaseAll();
  delay(500);
  Keyboard.press(KEY_TAB);
  Keyboard.releaseAll();
  delay(500);
  Keyboard.print("Testing");
  delay(500);
  Keyboard.press(KEY_TAB);
  Keyboard.releaseAll();
  delay(500);
  Keyboard.print("Text Message");
  delay(500);
  Keyboard.press(KEY_LEFT_ALT);
  Keyboard.press('s');
  delay(250);
  Keyboard.releaseAll();
  delay(5000);
}
