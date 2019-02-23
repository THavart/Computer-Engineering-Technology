#include "IntervalTimer.h"
 
// Pin 13 has an LED connected on most Arduino boards.
// Pin 11 has the LED on Teensy 2.0
// Pin 6  has the LED on Teensy++ 2.0
// Pin 13 has the LED on Teensy 3.0
// give it a name:
int LED_A = 21;
int LED_B = 20;
int LED_C = 4;
int LED_D = 3;
int LED_E = 2;
int LED_F = 22;
int LED_G = 23;
int LED_DP = 5;

int DISPLAY1 = 6;
int DISPLAY2 = 19;
int i = 0;
IntervalTimer myTimer;
// the setup routine runs once when you press reset:
void setup() {                
  // initialize the digital pin as an output.
  pinMode(LED_A, OUTPUT);  
  pinMode(LED_B, OUTPUT);
  pinMode(LED_C, OUTPUT);
  pinMode(LED_D, OUTPUT);
  pinMode(LED_E, OUTPUT);
  pinMode(LED_F, OUTPUT);
  pinMode(LED_G, OUTPUT);
  pinMode(LED_DP, OUTPUT);  

  pinMode(DISPLAY1, OUTPUT);
  pinMode(DISPLAY2, OUTPUT);
  
  reset();
  float resetNum = 500000*3;
  myTimer.begin(timer, resetNum);
}

// the loop routine runs over and over again forever:
void loop() {
  
  
digitalWrite(DISPLAY1, HIGH);
zero();
for (i = 0; i <= 9; i++){
  
  if (i == 1){
    one();
  }
  if (i == 2){
    two();
  }
  if (i == 3){
    three();
  }
  if (i == 4){
    four();
  }
  if (i == 5){
    five();
  }
  if (i == 6){
    six();
  }
  if (i == 7){
    seven();
  }
  if (i == 8){
    eight();
  }
  if (i == 9){
    nine();
  }
}

}
void timer(){
  i = 0;
}
 void zero(){
 //ZERO - A,B,C,D,E,F
 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_D, LOW);
 digitalWrite(LED_E, LOW);
 digitalWrite(LED_F, LOW);
 delay(500);
 reset();
 }
 void one(){
 //ONE - B,C
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 delay(500);
 reset();
 }
void two(){
 //TWO - A,B,G,E,D

 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_G, LOW);
 digitalWrite(LED_E, LOW);
 digitalWrite(LED_D, LOW);
 delay(500);
 reset();
}
void three(){
 //THREE - A,B,C,D,G

 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_D, LOW);
 digitalWrite(LED_G, LOW);
 delay(500);
 reset();
}
void four(){
 //FOUR - B,C,F,G

 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_F, LOW);
 digitalWrite(LED_G, LOW);
 delay(500);
 reset();
}
void five(){
 //FIVE - A,C,D,F,G

 digitalWrite(LED_A, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_D, LOW);
 digitalWrite(LED_F, LOW);
 digitalWrite(LED_G, LOW);
 delay(500);
 reset();
}
void six(){
 //SIX - C,D,E,F,G  

 digitalWrite(LED_C, LOW);
 digitalWrite(LED_D, LOW);
 digitalWrite(LED_E, LOW);
 digitalWrite(LED_F, LOW);
 digitalWrite(LED_G, LOW);
 delay(500);
 reset();
}
void seven(){
 //SEVEN - A,B,C

 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 delay(500);
 reset();
}
void eight(){
 //EIGHT - A,B,C,D,E,F,G

 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_D, LOW);
 digitalWrite(LED_E, LOW);
 digitalWrite(LED_F, LOW);
 digitalWrite(LED_G, LOW);
 delay(500);
 reset(); 
}
void nine(){
 //NINE - A,B,C,F,G

 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_F, LOW);
 digitalWrite(LED_G, LOW);
 delay(500);
 reset();
}

void reset(){
  //set all values off
 digitalWrite(LED_A, HIGH);
 digitalWrite(LED_B, HIGH);
 digitalWrite(LED_C, HIGH);
 digitalWrite(LED_D, HIGH);
 digitalWrite(LED_E, HIGH);
 digitalWrite(LED_F, HIGH);
 digitalWrite(LED_G, HIGH);
 digitalWrite(LED_DP, HIGH);
}

