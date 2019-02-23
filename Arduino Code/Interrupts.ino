/*
  Blink
  Turns on an LED on for one second, then off for one second, repeatedly.
 
  This example code is in the public domain.
 */
 
// Pin 13 has an LED connected on most Arduino boards.
// Pin 11 has the LED on Teensy 2.0
// Pin 6  has the LED on Teensy++ 2.0
// Pin 13 has the LED on Teensy 3.0
// give it a name:
int led = 13;
int RED_LED = 21;
int BLUE_LED = 22;
int GREEN_LED = 23;
int BUTTON = 2;
int count = 0;
int state = LOW;
int GCHECK = 4;
int BCHECK = 5;
int RCHECK = 7;
int fail = 0;

// the setup routine runs once when you press reset:
void setup() {                
  // initialize the digital pin as an output.
  pinMode(RED_LED, OUTPUT);
  pinMode(BLUE_LED, OUTPUT);
  pinMode(GREEN_LED, OUTPUT);
  pinMode(BUTTON, INPUT);

   attachInterrupt(2, pin_ISR, CHANGE);
}

// the loop routine runs over and over again forever:
void loop() {
  if (fail == 0){
   digitalWrite(GREEN_LED, LOW);
   digitalWrite(RED_LED, HIGH);
   delay(1000);
   digitalWrite(RED_LED, LOW);
   digitalWrite(BLUE_LED, HIGH);
   delay(1000);
   digitalWrite(BLUE_LED, LOW);
   digitalWrite(GREEN_LED, HIGH);
   delay(1000);
  }
}
void pin_ISR() {
  fail = 1;
        state = digitalRead(BUTTON);
        delay(100);
        if (state == HIGH){
          count++;
          if (count == 4){
            count = 1;
          }
        }
          if (count == 1){
            digitalWrite(RED_LED, HIGH);
            digitalWrite(BLUE_LED, LOW);
            digitalWrite(GREEN_LED, LOW);
          }
          if (count == 2){
            digitalWrite(RED_LED, LOW);
            digitalWrite(BLUE_LED, HIGH);
            digitalWrite(GREEN_LED, LOW);
          }
          if (count == 3){
            digitalWrite(RED_LED, LOW);
            digitalWrite(BLUE_LED, LOW);
            digitalWrite(GREEN_LED, HIGH);
      }
}
