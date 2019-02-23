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
int BUTTON = 8;
int DISPLAY1 = 1;
int state = LOW;
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
  pinMode(BUTTON, INPUT);
  pinMode(DISPLAY1, OUTPUT);
  attachInterrupt(8, one_ISR, HIGH);
  resetter();
    zero();
digitalWrite(DISPLAY1, HIGH);
}

// the loop routine runs over and over again forever:
void loop() {

  for (int i =0; i < 100; i++){
    delay(100);
  }
}
void one_ISR(){
  state = digitalRead(BUTTON);
  if (state == HIGH){
    one();
  }
  else{
    zero();
  }
}

 void zero(){
 //ZERO - A,B,C,D,E,F
 digitalWrite(LED_A, LOW);
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 digitalWrite(LED_D, LOW);
 digitalWrite(LED_E, LOW);
 digitalWrite(LED_F, LOW);
 }
 void one(){
 //ONE - B,C
 digitalWrite(LED_B, LOW);
 digitalWrite(LED_C, LOW);
 resetter();
 }

 void resetter(){
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

