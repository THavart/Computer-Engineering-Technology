/**********************************************************************
Filename:			VectorGraphic.cpp
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
					this class holds the source code for a Vector Graphic .
*********************************************************************/

//Function headers and macros
#include "Line.h"
#include "Rectangle.h"
#include "Ellipse.h"
#include "VectorGraphic.h"

/********************************************************************
Function Name: 	VectorGraphic
Purpose: 		The default constructor
In parameters:	N/A
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
VectorGraphic::VectorGraphic() {
	/*Needed at runtime to initalize the VectorGraphic Image Object. The vector class will initialize itself*/
}

/********************************************************************
Function Name: 	VectorGraphic
Purpose: 		The destructor
In parameters:	N/A
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
VectorGraphic::~VectorGraphic() {
	vector<Shape*>::iterator shapeDelete;
	/*Iterates through this class vector GraphicElement size.*/
	for (unsigned int i = 0; i < this->size(); i++) {
		/*Iterateor shapeDelete will iterate until the end of the Shape**/
		for (shapeDelete = this->at(i).begin(); shapeDelete != this->at(i).end(); shapeDelete++) {
			/*Dereference the pointer and delete the index*/
			delete (*shapeDelete);
		}
	}
	/*Delete the vector<GraphicElements> elements*/
	this->clear();
}

/********************************************************************
Function Name: 	AddGraphicElement
Purpose: 		Adds a Graphic Element to a vector template
In parameters:	N/A
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
void VectorGraphic::AddGraphicElement() {
	/*Declare variables*/
	static const int SIZE = 256;
	char name[SIZE];
	unsigned int numShapes;
	char type;
	char shapeName[SIZE];
	double x, y;
	Shape** shapes;
	Pair* p1;
	Pair* p2;

	cout << "Adding a Graphic Element" << endl;
	cout << "Please enter the name of the new Graphic Element (<256 characters): ";
	cin.ignore();			/*Clear garbage from input buffer*/
	cin.getline(name, SIZE);		/*Prompt the user to enter name*/
	cout << "Please enter the number of Shapes it contains: ";
	cin >> numShapes;			/*Prompt the user to enter the number of Shapes*/
	shapes = new Shape*[numShapes];				/*Allocate an array of Shape pointer arrays*/

	for (unsigned int i = 0; i < numShapes; i++) {			/*Loop to create the number of Shapes*/
		cout << "Please enter the type (L for line, R for rectangle, E for ellipse) for Shape #" << i << endl;
		cin >> type;			/*Prompt user to declare shape type*/

		switch (type) {
			case 'L':
			case 'l':{
				cout << "Please enter the name of the new line(<256 characters): ";
				cin.ignore();			/*Clear garbage from input buffer*/
				cin.getline(shapeName, SIZE);				/*Prompt the user to enter shapes name*/
				cout << "please enter the coordinates of the start point: (x,y) ";
				cin >> x >> y;			/*Prompt the user two decimals seperated by a space and terminated the the newline character*/	
				p1 = new Pair(x, y);		/*Allocate a new Pair object p1*/
				cout << "please enter the coordinates of the end point: (x,y) ";
				cin >> x >> y;			/*Prompt the user two decimals seperated by a space and terminated the the newline character*/	
				p2 = new Pair(x, y);		/*Allocate a new Pair object p2*/
				shapes[i] = new Line(shapeName, *p1, *p2);			/*Allocate a new Line object */
				delete p1;				/*Deletes the allocated memory of p1*/
				delete p2;				/*Deletes the allocated memory of p2*/
			}
			break;
			case 'R': 
			case 'r':{
				cout << "Please enter the name of the new Rectangle(<256 characters): ";
				cin.ignore();			/*Clear garbage from input buffer*/
				cin.getline(shapeName, SIZE);			/*Prompt the user to enter shapes name*/
				cout << "please enter the coordinates of the top-left: (x,y) ";
				cin >> x >> y;			/*Prompt the user two decimals seperated by a space and terminated the the newline character*/	
				p1 = new Pair(x, y);	/*Allocate a new Pair object p1*/
				cout << "please enter the coordinates of the bottom-right: (x,y) ";
				cin >> x >> y;			/*Prompt the user two decimals seperated by a space and terminated the the newline character*/	
				p2 = new Pair(x, y);	/*Allocate a new Pair object p2*/
				shapes[i] = new Rectangle(shapeName, *p1, *p2);		/*Allocate a new Rectangle object */
				delete p1;			/*Deletes the allocated memory of p1*/
				delete p2;			/*Deletes the allocated memory of p2*/
			}
			break;
			case 'E': 
			case 'e': {
				cout << "Please enter the name of the new Ellipse(<256 characters): ";
				cin.ignore();				/*Clear garbage from input buffer*/
				cin.getline(shapeName, SIZE);			/*Prompt the user to enter shapes name*/
				cout << "please enter the coordinates of the centre: (x,y) ";
				cin >> x >> y;			/*Prompt the user two decimals seperated by a space and terminated the the newline character*/
				p1 = new Pair(x, y);	/*Allocate a new Pair object p1*/
				cout << "please enter the width and height: (width, height) ";
				cin >> x >> y;			/*Prompt the user two decimals seperated by a space and terminated the the newline character*/
				p2 = new Pair(x, y);	/*Allocate a new Pair object p2*/
				shapes[i] = new Ellipse(shapeName, *p1, *p2);		/*Allocate a new Ellipse object */
				delete p1;			/*Deletes the allocated memory of p1*/
				delete p2;			/*Deletes the allocated memory of p2*/
			}
			break;
			default: {
				i--;				/*Decrement i since the index will not be populated and could cause errors*/
				cout << "Invalid selection..." << endl;	
			}
		}
	}
	GraphicElement graphicElements(shapes, name, numShapes);			/*Object initalized with parameters passed*/
	delete[] shapes;				/*Frees the array of Shape pointers*/
	this->push_back(graphicElements);		/*Adds to the vector the graphicElements object*/
};

/********************************************************************
Function Name: 	DeleteGraphicElement
Purpose: 		Deletes a Graphic Element from a vector template
In parameters:	N/A
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
void VectorGraphic::DeleteGraphicElement() {
	/*Declare Variables*/
	unsigned int index;
	vector<GraphicElement> newElements;
	int errCount = 0;

	/*If this class vector has no elements, return the message*/
	if (this->size() == 0) {
		cout << "No elements are present to delete..." << endl;
		return;
	}
	cout << "Please enter the index to delete in the range 0 to " << this->size() - 1 << endl;
	cin >> index;					/*Prompt the user to select index to delete*/

	
	/*If the user makes a mistake a mistake, give them 2 additional tries to select a valid index.
	If the user selects 3 incorrect in a row, it returns from the function*/
	while (index < 0 || index > this->size() - 1) {
		errCount++;
		if (errCount == 3) {
			cout << "Too many invalid index elements...exiting delete\n";
			return;
		}
		if ((3 - errCount) == 1) {
			cout << "LAST TRY...Please enter the index of the Graphic Element you wish to delete: ";
		}
		else {
			cout << "Invalid index..." << 3 - errCount << " delete tries remaining...Please enter the index of the Graphic Element you wish to delete: ";
		}
		cin >> index;
	}

	
	for (unsigned int i = 0; i < this->size(); i++) {		/*Iterate through the size of the vector*/
		if (i != index) {
			newElements.push_back(this->at(i));				/*Add all indexes to the created vector object excluding the index you wish to delete*/
		}
	}

	/*Iterate through this objects vector and deallocate all Shapes* attached at the index desired*/
	for (vector<Shape*>::iterator deleteShapes = this->at(index).begin(); deleteShapes != this->at(index).end();deleteShapes++) {
		delete (*deleteShapes);
	}

	/*Clear this class vector*/
	this->clear();
	/*Add the temp vector objects into this class vector*/
	for (unsigned int i = 0; i < newElements.size(); i++) {
		this->push_back(newElements.at(i));
	}
	/*Shrink this classes vector due to resizing*/
	this->shrink_to_fit();
	cout << "erase index = " << index << endl;
}

/********************************************************************
Function Name: 	operator<<
Purpose: 		Overloads the assignment operator Bitwise left shift
In parameters:	ostream&, VectorGraphic&
Out parameters:	void
Version: 		1.0
Author: 		
**********************************************************************/
ostream& operator<<(ostream& out, VectorGraphic& vectorGraphic) {
	/*If no elements are stored in the vector, return the message*/
	if (vectorGraphic.size() == 0) {
		return out << "No elements are present to list..." << endl;
	}
	out << "VectorGraphic Report" << endl << endl;

	/*Loop through this class vector and print element. Calls the overload operator << to report each graphic element*/
	for (unsigned int i = 0; i < vectorGraphic.size(); i++) {
		out << "Reporting Graphic Element " << i << endl;
		out << vectorGraphic.at(i) << endl;
	}
	return out;
}