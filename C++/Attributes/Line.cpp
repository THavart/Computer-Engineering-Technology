/**************************************************************************************************************/
/*
•       Filename: Line.cpp
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
•       Purpose: Prints out a formatted Line
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
•       Function name: operator<<
•       Purpose: Overloads the << operator for easier printing of the Line Objects.
•       Function In parameters: Output Stream, Line Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, Line& xl){
	return os << "start is " << xl.start << ". " << "end is " << xl.end << "." << endl;
}