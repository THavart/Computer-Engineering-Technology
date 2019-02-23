#include "IntervalTimer.h"

int DISPLAY1 = 2;
int DISPLAY2 = 17;
 
int latchPin1 = 22;
int clockPin1 = 21;
int dataPin1 = 23;

int latchPin2 = 19;
int clockPin2 = 18;
int dataPin2 = 20;

byte leds = 0;
byte dataArray[10]; 

int i = 0;
int j = 0;

IntervalTimer myTimer;

void setup() 
{
  pinMode(DISPLAY1, OUTPUT);
  pinMode(DISPLAY2, OUTPUT);
  pinMode(latchPin1, OUTPUT);
  pinMode(dataPin1, OUTPUT);  
  pinMode(clockPin1, OUTPUT);
  pinMode(latchPin2, OUTPUT);
  pinMode(dataPin2, OUTPUT);  
  pinMode(clockPin2, OUTPUT);

  //Binary notation as comment
//Zero
  dataArray[0] = 0x18; //0x00011000
//One
  dataArray[1] = 0x7B; //0b01111011
//Two
  dataArray[2] = 0x2C; //0b00101100  
//Three
  dataArray[3] = 0x29; //0b00101001
//Four
  dataArray[4] = 0x4B; //0b01001011
//Five
  dataArray[5] = 0x89; //0b10001001
//Six
  dataArray[6] = 0xC8; //0b11001000  
//Seven
  dataArray[7] = 0x3B; //0b00111011
//Eight
  dataArray[8] = 0x08; //0b00001000
//Nine
  dataArray[9] = 0x0B; //0b00001011
/*
  dataArray[0] = 0xBF; //0b10111111 //Segment A
  dataArray[0] = 0x7F; //0b01111111 //Segment B
  dataArray[0] = 0xFB; //0b11111011 //Segment C
  dataArray[0] = 0xFD; //0b11111101 //Segment D
  dataArray[0] = 0xFE; //0b11111110 //Segment E
  dataArray[0] = 0xDF; //0b11011111 //Segment F
  dataArray[0] = 0xEF; //0b11101111 //Segment G
  dataArray[0] = 0xF7; //0b11110111 //Segement DP
  */

  blinkAll_2Bytes(2,500); 
  
  //float resetNum = 200000*23;
  //myTimer.begin(timer, resetNum);
}

void loop() {
  digitalWrite(DISPLAY1, HIGH);
  digitalWrite(DISPLAY2, HIGH);
  for (j = 0; j < 10; j++) {
    //load the light sequence you want from array
    leds = dataArray[j];
    //ground latchPin and hold low for as long as you are transmitting
    digitalWrite(latchPin1, 0);
    //move 'em out
    shiftOut(dataPin1, clockPin1, leds);
    //return the latch pin high to signal chip that it 
    //no longer needs to listen for information
    digitalWrite(latchPin1, 1);
      for (i = 0; i < 10; i++) {
        //load the light sequence you want from array
        leds = dataArray[i];
        //ground latchPin and hold low for as long as you are transmitting
        digitalWrite(latchPin2, 0);
        //move 'em out
        shiftOut(dataPin2, clockPin2, leds);
        //return the latch pin high to signal chip that it 
        //no longer needs to listen for information
        digitalWrite(latchPin2, 1);
        delay(200); 
        }
  }
/*
  digitalWrite(DISPLAY1, HIGH); //Turn on Tens
  leds = dataArray[8];
  digitalWrite(latchPin1, 0);
  shiftOut(dataPin1, clockPin1, leds);
  digitalWrite(latchPin1, 1);
  delay(300);
  */
}
// the heart of the program
void shiftOut(int myDataPin, int myClockPin, byte myDataOut) {
  // This shifts 8 bits out MSB first, 
  //on the rising edge of the clock,
  //clock idles low

  //internal function setup
  int i=0;
  int pinState;
  pinMode(myClockPin, OUTPUT);
  pinMode(myDataPin, OUTPUT);

  //clear everything out just in case to
  //prepare shift register for bit shifting
  digitalWrite(myDataPin, 0);
  digitalWrite(myClockPin, 0);

  //for each bit in the byte myDataOut�
  //NOTICE THAT WE ARE COUNTING DOWN in our for loop
  //This means that %00000001 or "1" will go through such
  //that it will be pin Q0 that lights. 
  for (i=7; i>=0; i--)  {
    digitalWrite(myClockPin, 0);

    //if the value passed to myDataOut and a bitmask result 
    // true then... so if we are at i=6 and our value is
    // %11010100 it would the code compares it to %01000000 
    // and proceeds to set pinState to 1.
    if ( myDataOut & (1<<i) ) {
      pinState= 1;
    }
    else {  
      pinState= 0;
    }

    //Sets the pin to HIGH or LOW depending on pinState
    digitalWrite(myDataPin, pinState);
    //register shifts bits on upstroke of clock pin  
    digitalWrite(myClockPin, 1);
    //zero the data pin after shift to prevent bleed through
    digitalWrite(myDataPin, 0);
  }

  //stop shifting
  digitalWrite(myClockPin, 0);
}
 //blinks the whole register based on the number of times you want to 
//blink "n" and the pause between them "d"
//starts with a moment of darkness to make sure the first blink
//has its full visual effect.
void blinkAll_2Bytes(int n, int d) {
  digitalWrite(latchPin1, 0);
  shiftOut(dataPin1, clockPin1, 0);
  shiftOut(dataPin1, clockPin1, 0);
  digitalWrite(latchPin1, 1);
  delay(200);
  for (int x = 0; x < n; x++) {
    digitalWrite(latchPin1, 0);
    shiftOut(dataPin1, clockPin1, 255);
    shiftOut(dataPin1, clockPin1, 255);
    digitalWrite(latchPin1, 1);
    delay(d);
    digitalWrite(latchPin1, 0);
    shiftOut(dataPin1, clockPin1, 0);
    shiftOut(dataPin1, clockPin1, 0);
    digitalWrite(latchPin1, 1);
    delay(d);
  }
}
void timer(){
  i = 0;
  j = 0;
}


