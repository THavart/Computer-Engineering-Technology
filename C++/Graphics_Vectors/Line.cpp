/**********************************************************************
Filename:			Line.cpp
Version: 			1.0
Author:				
Student No:  		
Course Name/Number:	C++ Programming   CST8219
Lab Sect: 			301
Assignment #:		1
Assignment name:	Vector Graphic with Overloaded Operators
Due Date:			November 12 2016
Submission Date:	November 13 2016
Professor:			Andrew Tyler
Purpose:			A continuation of Assignment 1, this assignment converts Assignment
					1 into a C++ file which includes operator overloading. This file overloads 
					the << operator for Line Objects
*********************************************************************/

//Function headers and macros
#include <iostream>
using namespace std;
#include "Point.h"
#include "Line.h"

/********************************************************************
Function Name: 	operator<<
Purpose: 		Overloads the "<<" operator for when outputting a Line object
In parameters:	ostream& out, Line& pLines
Out parameters:	ostream&
Version: 		1.0
Author: 		
**********************************************************************/
ostream& operator<<(ostream& out, Line& pLines) {
	return out << "start Point: " << pLines.start << "." << endl << "end Point: " << pLines.end << "." << endl;
}