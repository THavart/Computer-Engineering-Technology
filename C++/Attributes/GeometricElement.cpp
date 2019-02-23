/**************************************************************************************************************/
/*
•       Filename: GeometricElement.cpp
•       Version	Program version number: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
•       Student Number: 040 764 885
•       Course Name and Number: C++ Programing CST8219
•       Lab Section: 300
•       Assignment Number: 3
•       Assignment Name: Vector Graphic with Polymorphic Inheritance
•       Due Date: 16/04/17
•       Submission Date: 12/04/17
•       Professor’s Name: Andrew Tyler
•       Purpose: Inherits GraphicElement, performs specific functionality for GeometricElement(Intensify Colour by replacement)
*/
/**************************************************************************************************************/
#include <crtdbg.h>
#include <iostream>
#include <string>
#include <vector>
using namespace std;

#include "Attributes.h"
#include "Line.h"
#include "GraphicElement.h"
#include "GeometricElement.h"
#include "TerrainElement.h"
#include "VectorGraphic.h"

/*****************************************************************************************************************/
/*
•       Function name: operator<<()
•       Purpose: Overloads << for easier printing of GeometricElement Objects
•       Function In parameters: outputstream variable, GeometricElement Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, GeometricElement& ge){
	int i = 0;
	os << "GEOMETRIC ELEMENT" << endl;
	os << ge.colour;
	os << "name = " << ge.name << endl;

	GraphicElement* gRE;
	gRE = &ge;
	cout << *gRE;
	
	return os;
}
/*****************************************************************************************************************/
/*
•       Function name: IntensifyColour()
•       Purpose: Prints out identifying information about the printed object, takes in new colour values and assigns
				 them to the colour object.
•       Function In parameters:  N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void GeometricElement::IntensifyColour(){
	coloref newColor;
	int red = 0, green = 0, blue = 0;
	cout << "Geometric Element - Intensify Colour by Replacement" << endl;
	cout << "Name = " << name << endl;
	cout << "Please state give the new rgb color values (between 0 and 255):" << endl;
	cout << "Red = ";
	cin >> red;
	cout << "Green = ";
	cin >> green;
	cout << "Blue = ";
	cin >> blue;

	newColor = coloref(red, green, blue);
	colour = newColor;
}