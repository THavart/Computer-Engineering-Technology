/**********************************************************************
Filename:			Rectangle.cpp
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
					this class holds the source code for a Rectangle .
*********************************************************************/

//Function headers and macros
#include "Pair.h"
#include "Rectangle.h"

/********************************************************************
Function Name: 	CalculateCentre
Purpose: 		Returns a Pair object with a calculated centre
In parameters:	N/A
Out parameters:	Pair
Version: 		1.0
Author: 		
**********************************************************************/
Pair Rectangle::CalculateCentre() {
	Pair pair = (p1 + p2) / 2;			/*Returns a Pair object initalized to (p1 + p2) / 2*/
	return pair;
}

/********************************************************************
Function Name: 	CalculateCentre
Purpose: 		Reports information containing a Rectangle object
In parameters:	N/A
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
void Rectangle::Report() {
	cout << "Shape RECTANGLE " << name << endl;
	cout << "top left coordinates: ";
	p1.Report();									/*Calls the report for a Rectangle member object p1*/
	cout << "bottom right coordinates: ";
	p2.Report();									/*Calls the report for a Rectangle member object p2*/
}