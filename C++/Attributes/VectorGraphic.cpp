/**************************************************************************************************************/
/*
•       Filename: VectorGraphic.cpp
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
•       Purpose: Handle all the main functions of the VectorGraphic - add, report, delete.
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
•       Function name: AddGraphicElement()
•       Purpose: Adds a new GraphicElement to the Element array
•       Function In parameters: N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void VectorGraphic::AddGraphicElement(){ //Build name on heap, build vector.  (Push it)
	GraphicElement** temp = new GraphicElement*[numElements + 1];
	char name[256];
	int elementType = 0;
	int numLines = 0, j = 0;
	int x, y, r, g, b;
	string filename;
	Point start, end;
	Line L;
	vector<Line> V;
	coloref newColors;
	TerrainElement tElement;
	GeometricElement gElement;
	texture text;
	/*Copy everything from Elements to temp, and delete Elements*/

	cout << "\nPlease enter the name of the new GraphicElement (<256 characters): ";
	cin.ignore();
	cin.getline(name, 256);

	for (int i = 0; i < numElements; i++){
		temp[i] = Elements[i];
	}
	delete Elements;

	cout << "\nHow many lines are there in the new GraphicElement?: ";
	cin >> numLines;

	for (int i = 0; i < numLines; i++){
		cout << "\nPlease enter the x coord of the start point of the line index " << i << ": ";
		cin >> x;
		cout << "\nPlease enter the y coord of the start point of the line index " << i << ": ";
		cin >> y;
		start = Point(x, y);
		cout << "\nPlease enter the x coord of the end point of the line index " << i << ": ";
		cin >> x;
		cout << "\nPlease enter the y coord of the end point of the line index " << i << ": ";
		cin >> y;
		end = Point(x, y);
		L = Line(start, end);
		V.push_back(L);
	}
	cout << "\nWhat is the type of the new element: Geometric = 1, Terrain = 2?\n";
	cin.ignore();
	cin >> elementType;
	cout << elementType;
	cout << "\nPlease enter the rgb values of the coloref (255 max)\n";
	cin >> r;
	cin >> g;
	cin >> b;
	newColors = coloref(r, g, b);

	if (elementType == 2){
		cout << "Please enter the name of the texture file" << endl;
		cin >> filename;
		text = texture(filename, newColors);
		temp[numElements] = new TerrainElement(text, V, name);
	} else if (elementType == 1){
		temp[numElements] = new GeometricElement(newColors, V, name);
	}

	numElements++;
	Elements = temp;
}
/*****************************************************************************************************************/
/*
•       Function name: DeleteGraphicElement()
•       Purpose: Removes a select GraphicElement from the array
•       Function In parameters: N/A
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void VectorGraphic::DeleteGraphicElement(){
	GraphicElement** pNewElements = new GraphicElement*[numElements - 1];
	int index = 0, j = 0;
	cout << "Please enter the index for the element to delete, between 0 and " << numElements - 1;
	cin >> index;

	/*Transfer all elements from one past the deleted index to the end of the array*/
	for (int i = index; i < numElements; i++){
		if (i != index){
			pNewElements[j] = Elements[i];
			++j;
		}
		else{
			delete Elements[index];
		}
	}

	delete Elements;
	Elements = pNewElements;
	--numElements;
}
/*****************************************************************************************************************/
/*
•       Function name: operator<<
•       Purpose: Overloads the << operator for easier printing of the VectorGraphic Object
•       Function In parameters: output stream, VectorGraphic Object.
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
ostream& operator<<(ostream& os, VectorGraphic& vg){ //Don't use this in Assignment 2 - Will be used in Assignment 3.
	os << "VectorGraphic Report " << endl;
	/*Iterate through to display elements*/
	for (int i = 0; i < vg.numElements; i++) {				/*Iterate through the elements and display*/
		os << "\nReporting Graphic Element #" << i << endl;
			GeometricElement* ge = dynamic_cast<GeometricElement*>(vg.Elements[i]);
			if (ge){
				cout << *ge;
			}
			else{
				TerrainElement* te = dynamic_cast<TerrainElement*>(vg.Elements[i]);
				if (te){
					cout << *te;
				}
			}
	}
	return os;
}
void VectorGraphic::IntensifyColour(){
	for (int i = 0; i < numElements; i++){
		GeometricElement* ge = dynamic_cast<GeometricElement*>(Elements[i]);
		if (ge){
			ge->IntensifyColour();
		}
		else{
			TerrainElement* te = dynamic_cast<TerrainElement*>(Elements[i]);
			if (te){
				te->IntensifyColour();
			}
		}
	}
}