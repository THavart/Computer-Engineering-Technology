void setup() {
  Keyboard.begin();
  Mouse.begin();
  Mouse.screenSize(3840,2160);
  openPaint();
}

void loop() {

  Mouse.moveTo(500,700);
  delay(250);
  //SQUARE ---------------------------------------------------------
  Mouse.press();
  //LEFT
  Mouse.move(150,0,0);
  delay(250);
  Mouse.move(150,0,0);
  delay(250);
  
  //UP
  Mouse.move(0,150,0);
  delay(250);
  Mouse.move(0,150,0);
  delay(250);

  //RIGHT
  Mouse.move(-150,0,0);
  delay(250);
  Mouse.move(-150,0,0);
  delay(250);
  
  //DOWN
  Mouse.move(0,-150,0);
  delay(250);
  Mouse.move(0,-150,0);
  delay(250);
  
  Mouse.release();
  delay(5000);

  Mouse.moveTo(500,1000);

  //TRIANGLE --------------------------------------------------------
  Mouse.press();
  //BOTTOM
  Mouse.move(150,0);
  delay(250);
  Mouse.move(150,0);
  delay(250);
  //HYPOTENUSE
  Mouse.move(224.5,149);
  delay(250);
  Mouse.move(224.5,149);
  delay(250);
  //LAST SIDE
  Mouse.move(-22,108);
  delay(250);
  Mouse.move(-22,108);
  delay(250);
  Mouse.release();
  delay(5000);

  // for circle
  Mouse.moveTo(500, 1300);
  delay(500);
  Mouse.press();

  int i;
  int x;
  int y;
  float theta;

  for(i = 0; i < 360; i++){
    theta = 3.14*i/180;
    x = 10 * cos(theta);
    y = 10 * sin(theta);
    Mouse.move(x,y);
    delay(100);
  }
  Mouse.release();
}
void openPaint(){
  delay(2000);
  Keyboard.press(KEY_LEFT_CTRL);
  Keyboard.press(KEY_LEFT_ALT);
  Keyboard.press('p');
  delay(500);
  Keyboard.releaseAll();
  delay(5000);
}

