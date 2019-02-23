/**************************************************************************************************************/
/*
•       Filename: Attributes.cpp
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
•       Purpose: Provide overloaded operators and basic functions for 3 classes - coloref, texture, and point.
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
•       Function name: operator=()
•       Purpose: Overloads = for comparison between Coloref Objects
•       Function In parameters: Coloref Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
coloref& coloref::operator=(coloref& RCR){
	red = RCR.red;
	green = RCR.green;
	blue = RCR.blue;
	return *this;
}
/*****************************************************************************************************************/
/*
•       Function name: operator++()
•       Purpose: Overloads ++ for easier incrementation of colours in Coloref Objects
•       Function In parameters: N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void coloref::operator++(){
	red++;
	green++;
	blue++;
}
/*****************************************************************************************************************/
/*
•       Function name: operator<<()
•       Purpose: Overloads << for easier printing of Coloref Objects
•       Function In parameters: outputstream variable, Coloref Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, coloref& cref){
	os << "rgb = " << (int)cref.red << "," << (int)cref.green << "," << (int)cref.blue << endl;
	return os;
}
/*****************************************************************************************************************/
/*
•       Function name: IntensifyColour()
•       Purpose: Overloads << for easier printing of GeometricElement Objects
•       Function In parameters: increment variable
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void texture::IntensifyColour(int increment){
	for (int i = 0; i < increment; i++){
		++bkgColour;
	}
}
/*****************************************************************************************************************/
/*
•       Function name: operator<<()
•       Purpose: Overloads << for easier printing of Texture Objects
•       Function In parameters: outputstream variable, Texture Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, texture& text){
	os << "texture file name = " << text.textureFileName << "," << "background colour = " << text.bkgColour << endl;
	return os;
}
/*****************************************************************************************************************/
/*
•       Function name: operator<<()
•       Purpose: Overloads << for easier printing of Point Objects
•       Function In parameters: outputstream variable, Point Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, Point& px){
	return os << "x = " << px.x << ", y = " << px.y;
}