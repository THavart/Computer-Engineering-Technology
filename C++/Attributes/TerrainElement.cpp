/**************************************************************************************************************/
/*
•       Filename: TerrainElement.cpp
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
•       Purpose: Inherits GraphicElement, performs specific functionality for a TerrainElement(Intensify Colour by increment - take in
		file)
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
•       Purpose: Overloads << for easier printing of TerrainElement Objects
•       Function In parameters: outputstream variable, TerrainElement Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, TerrainElement& te){
	os << "TERRAIN ELEMENT" << endl;
	os << te.terrain;

	GraphicElement* gRE;
	gRE = &te;
	cout << *gRE;
	return os;
}
/*****************************************************************************************************************/
/*
•       Function name: IntensifyColour()
•       Purpose: Prints out identifying information about the printed object, takes in increment value and passes data
				 to texture.
•       Function In parameters: N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void TerrainElement::IntensifyColour(){
	int increment = 0;
	cout << "Terrain Element - Intensify Colour by Increment" << endl;
	cout << "name = " << name << endl;
	cout << "Please state give the increment to the rgb color values (Between 1 and 255): ";
	cin >> increment;
	terrain.IntensifyColour(increment);
}