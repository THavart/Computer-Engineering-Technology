/**************************************************************************************************************/
/*
•       Filename: GraphicElement.cpp
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
•       Purpose: Format a GraphicElement (name and Lines) and properly set a GraphicElement object
*/
/**************************************************************************************************************/

#include <crtdbg.h>
#include <iostream>
#include <string>
#include <vector>
using namespace std;

#include "attributes.h"
#include "Line.h"
#include "GraphicElement.h"
#include "GeometricElement.h"
#include "TerrainElement.h"
#include "VectorGraphic.h"

/*****************************************************************************************************************/
/*
•       Function name: GraphicElement()
•       Purpose: Sets the Lines and Name parameters to the class variables.
•       Function In parameters: N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
GraphicElement::GraphicElement(vector<Line> cL, string s) :Lines(){
	name = s;
	Lines = cL;
}
/*****************************************************************************************************************/
/*
•       Function name: GraphicElement()
•       Purpose: Sets a object of GraphicElement type to GraphicElement
•       Function In parameters: GraphicElement Object
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
GraphicElement::GraphicElement(GraphicElement& ge){
	*this = ge;
}
/*****************************************************************************************************************/
/*
•       Function name: operator <<
•       Purpose: Overloads << for easier printing of GraphicElement Objects
•       Function In parameters: OutputStream variable, GraphicElement
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, GraphicElement& ge){
	for (unsigned int i = 0; i < ge.Lines.size(); i++){
		os << "Element[" << i << "] : ";
		os << ge.Lines[i];
	}
	/*has access to all variables in GraphicElement. --> char* name, vector<Line> Lines;*/
	return os;
}
/*****************************************************************************************************************/
/*
•       Function name: IntensifyColour()
•       Purpose: Used in inherited classes
•       Function In parameters: N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void GraphicElement::IntensifyColour(){
	/*No Code Here*/
}