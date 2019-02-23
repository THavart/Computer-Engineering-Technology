/**********************************************************************
Filename:			Point.cpp
Version: 			1.0
Author:				
Course Name/Number:	C++ Programming   CST8219
Lab Sect: 			301
Assignment #:		1
Assignment name:	Vector Graphic with Overloaded Operators
Due Date:			November 12 2016
Submission Date:	November 13 2016
Professor:			Andrew Tyler
Purpose:			A continuation of Assignment 1, this assignment converts Assignment
					1 into a C++ file which includes operator overloading. This file overloads
					the << operator for Point Objects
*********************************************************************/

//Function headers and macros
#include <iostream>
using namespace std;
#include "Point.h"

/********************************************************************
Function Name: 	operator<<
Purpose: 		Overloads the "<<" operator for when outputting a Point object
In parameters:	ostream& out, Line& ostream& out, Point& se
Out parameters:	ostream&
Version: 		1.0
Author: 		
**********************************************************************/
ostream& operator<<(ostream& out, Point& se) {
	return out << "x = " << se.x << "; y = " << se.y;
}