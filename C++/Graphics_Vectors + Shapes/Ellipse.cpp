/**********************************************************************
Filename:			Ellipse.cpp
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
					this class holds the source code for an Ellipse.
*********************************************************************/

//Function headers and macros
#include "Pair.h"
#include "Ellipse.h"

/********************************************************************
Function Name: 	CalculateCentre
Purpose: 		Returns a Pair object initalized to p1
In parameters:	N/A
Out parameters:	Pair
Version: 		1.0
Author: 		
**********************************************************************/
Pair Ellipse::CalculateCentre() {
	Pair pair = p1;				/*Returns a Pair object initalized to p1*/
	return pair;
}

/********************************************************************
Function Name: 	Report
Purpose: 		Reports information containing an Ellipse object
In parameters:	N/A
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
void Ellipse::Report() {
	cout << "Shape ELLIPSE " << name << endl;
	cout << "center coordinates: ";
	p1.Report();				/*Calls the report for a Ellipse member object p1*/
	cout << "axes dimension: ";
	p2.Report();				/*Calls the report for a Ellipse member object p2*/	
}