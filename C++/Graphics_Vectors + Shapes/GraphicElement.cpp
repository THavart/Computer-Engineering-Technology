/**********************************************************************
Filename:			GraphicElement.cpp
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
					this class holds the source code for a Grahpic Element.
*********************************************************************/

//Function headers and macros
#include "GraphicElement.h"

/********************************************************************
Function Name: 	GraphicElement
Purpose: 		Initializer constructor taking 3 parameters
In parameters:	Shape**, char*, unsigned int
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement::GraphicElement(Shape** shapes, char* name, unsigned int numShapes) {
	strcpy_s(this->name, name);							/*Copies the name passed*/
	for (unsigned int i = 0; i < numShapes; i++) {		/*Adds the pointers into the vector<Shape*>*/
		this->push_back(shapes[i]);
	}
}

/********************************************************************
Function Name: 	GraphicElement
Purpose: 		Copy constructor
In parameters:	const GraphicElement&
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement::GraphicElement(const GraphicElement& graphicElement) {
	strcpy_s(this->name, graphicElement.name);			/*Copies the name passed*/
	for (GraphicElement::const_iterator i = graphicElement.begin(); i != graphicElement.end(); i++) {
		push_back(*i);
	}													/*Loops and dereferences each Shape** to store the pointer*/
}

/********************************************************************
Function Name: 	operator =
Purpose: 		Overloads the assignment operator for assiging GraphicElements
In parameters:	GraphicElement&
Out parameters:	GraphicElement&
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement& GraphicElement::operator = (GraphicElement&) {
	return *this;							/*Returns this class object*/
}

/********************************************************************
Function Name: 	operator =
Purpose: 		Destructor for Graphic Elements
In parameters:	N/A
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement::~GraphicElement() {
	this->clear();						/*Clears all Shape* stored in the vector*/
}

/********************************************************************
Function Name: 	operator<<
Purpose: 		Overloads the assignment operator Bitwise left shift
In parameters:	N/A
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
ostream& operator<<(ostream& out, GraphicElement& RGE) {
	Pair centre;

	out << "Graphic Element " << RGE.name << endl;
	
	for (GraphicElement::iterator i = RGE.begin(); i != RGE.end(); i++)			/*Loop using overloaded operators 
																				to calculate the centre*/
		centre = centre + (*i)->CalculateCentre();

	out << "The centre = ";
	centre = centre / RGE.size();			/*Centre divided by the number of elements*/
	centre.Report();
	out << "List of Shapes in " << RGE.name << endl;
	for (GraphicElement::iterator i = RGE.begin(); i != RGE.end(); i++)			/*Loop through each Shape* object and
																				dereference to call the Report function
																				specific to the shape*/
		(*i)->Report();

	return out;
}