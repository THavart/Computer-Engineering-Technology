/**********************************************************************
Filename:			Pair.cpp
Version: 			1.0
Author:				
Course Name/Number:	C++ Programming   CST8219
Lab Sect: 			301
Assignment #:		1
Assignment name:	Vector Graphic with Polymorphic Inheritance and Templates
Due Date:			December 03 2016
Submission Date:	December 04 2016
Professor:			Andrew Tyler
Purpose:			A continuation of Assignment 2 using polymorphic inheritance,
					this class holds the source code for a Pair .
*********************************************************************/

//Function headers and macros
#include <iostream>
using namespace std;
#include "Pair.h"

/********************************************************************
Function Name: 	operator +
Purpose: 		Overloads the addition operator
In parameters:	Pair&
Out parameters:	Pair
Version: 		1.0
Author: 		*********************************/
Pair Pair::operator + (Pair& second) {
	Pair newPair;							/*Creates a Pair object*/

	newPair.x = this->x + second.x;			/*Adds this class member x to the parameter pass member x and sets into the newPair member x*/
	newPair.y = this->y + second.y;			/*Adds this class member y to the parameter pass member y and sets into the newPair member y*/

	return newPair;							/*Returns the Pair object created*/
}

/********************************************************************
Function Name: 	operator /
Purpose: 		Overloads the division operator
In parameters:	double
Out parameters:	Pair
Version: 		1.0
Author: 		
**********************************************************************/
Pair Pair::operator / (double div) {
	Pair pair;						/*Creates a Pair object*/	
	pair.x = this->x / div;			/*Divides this class member x to the parameter pass member x and sets into the newPair member x*/
	pair.y = this->y / div;			/*Divides this class member y to the parameter pass member y and sets into the newPair member y*/

	return pair;					/*Returns the Pair object created*/
}

/********************************************************************
Function Name: 	Report
Purpose: 		Reports information specific to a Pair object
In parameters:	N/A
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
void Pair::Report() {
	cout << "x = " << x << "; y = " << y << endl;
}