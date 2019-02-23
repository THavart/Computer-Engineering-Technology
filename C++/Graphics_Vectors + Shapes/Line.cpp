/**********************************************************************
Filename:			Line.cpp
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
					this class holds the source code for a Line.
*********************************************************************/

//Function headers and macros
#include "Pair.h"
#include "Line.h"

/********************************************************************
Function Name: 	CalculateCentre
Purpose: 		Returns a Pair object with the Calculated Centre
In parameters:	N/A
Out parameters:	Pair
Version: 		1.0
Author: 		
**********************************************************************/
Pair Line::CalculateCentre() {
	Pair pair = (p1 + p2) / 2;				/*Returns a Pair object initalized to (p1 + p2) / 2*/
	return pair;
}
/********************************************************************
Function Name: 	Report
Purpose: 		Reports information containing a Line object
In parameters:	N/A
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
void Line::Report() {
	cout << "Shape LINE " << name << endl;
	cout << "start coordinates: ";
	p1.Report();									/*Calls the report for a Line member object p1*/
	cout << "end coordinates: ";
	p2.Report();									/*Calls the report for a Line member object p2*/
}