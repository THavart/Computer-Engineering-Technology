/**********************************************************************
Filename:			GraphicElement.cpp
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
					the =, <<, and + operator for GraphicElement Objects
*********************************************************************/

//Function headers and macros
#include <iostream>
using namespace std;
#include "Point.h"
#include "Line.h"
#include "GraphicElement.h"

/********************************************************************
Function Name: 	GraphicElement
Purpose: 		GraphicElement Constructor - Initialize pLine, name, numLines
In parameters:	Line* pLines, char* name, unsigned int numLines
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement::GraphicElement(Line* pLines, char* name, unsigned int numLines) :pLines(pLines), numLines(numLines) {
	/*Sets the pLines pointerm numLines value and copies the name */
	strcpy(this->name, name);
}

/********************************************************************
Function Name: 	GraphicElement
Purpose: 		GraphicElement Constructor - Copy
In parameters:	GraphicElement& copy
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement::GraphicElement(GraphicElement& copy) : numLines(copy.numLines){
	/*Copy constructor. Copy the name, and create a new pLines array and copy the values into the index*/
	strcpy(this->name, copy.name);
	pLines = new Line[copy.numLines];
	memcpy(this->pLines, copy.pLines, numLines*sizeof(Line));
}

/********************************************************************
Function Name: 	operator=
Purpose: 		Overloads the operator "=" which sets a GraphicElement to another GraphicElement
In parameters:	GraphicElement& assign
Out parameters:	GraphicElement&
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement& GraphicElement::operator=(GraphicElement& assign){
	/*Set this object's name, numLines to the parameter passed*/
	strcpy(this->name, assign.name);
	numLines = assign.numLines;
	/*Delete this objects pLines and create the newly sized Line array with the newly assigned numLines*/
	delete[] pLines;
	pLines = new Line[numLines];
	/*Copy from the parameter passed into the new pLine and return a pointer to this object*/
	memcpy(pLines, assign.pLines, numLines*sizeof(Line));
	return *this;
}

/********************************************************************
Function Name: 	operator=
Purpose: 		Overloads the operator "+" which adds 2 GraphicElements together
In parameters:	GraphicElement& add
Out parameters:	GraphicElement
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement GraphicElement::operator+(GraphicElement& add){
	/*Member placeholder for the new merged object*/
	static const int SIZE = 256;
	unsigned int numLines;
	Line* pLines;
	char name[SIZE];

	/*Concat the two strings and store into the new merged object*/
	strcpy(name, this->name);
	strcat(name, "_");
	strcat(name, add.name);

	/*Add the two numLines in each object and store into the new merged object*/
	numLines = this->numLines + add.numLines;
	/*Create a new pLine array to hold the merged object*/
	pLines = new Line[numLines];

	/*Copy from both this object as well as the parameter passed. Copy the values into the merged array*/
	for (unsigned int i = 0; i < this->numLines; i++) {
		memcpy(&pLines[i], &this->pLines[i], sizeof(Line));
	}
	for (unsigned int j = 0; j < add.numLines; j++) {
		memcpy(&pLines[this->numLines + j], &add.pLines[j], sizeof(Line));
	}
	/*Create the new merged object and return it to main*/
	GraphicElement merged(pLines, name, numLines);
	return merged;
}

/********************************************************************
Function Name: 	operator<<
Purpose: 		Overloads the "<<" operator for when outputting a GraphicElement object
In parameters:	ostream& out, GraphicElement& pElements
Out parameters:	ostream&
Version: 		1.0
Author: 		
**********************************************************************/
ostream& operator<<(ostream& out, GraphicElement& pElements) {
	out << "Graphic Element name: " << pElements.name << endl;
	/*Iterate through to print each Point object*/
	for (unsigned int i = 0; i < pElements.numLines; i++){
		out << "Line " << i << ":" << endl;
		out << pElements.pLines[i] << endl;
	}
	return out;
}
