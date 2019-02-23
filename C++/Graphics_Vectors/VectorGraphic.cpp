/**********************************************************************
Filename:			VectorGraphic.cpp
Version: 			1.0
Author:				
Course Name/Number:	C++ Programming   CST8219
Lab Sect: 			301
Assignment #:		1
Assignment name:	Vector Graphic with Overloaded Operators
Due Date:			November 12 2016
Submission Date:	November 13 2016
Professor:			Andrew Tyler
Purpose:			A continuation of Assignment 1, this assignment converts Assignment
					1 into a C++ file which includes operator overloading. This file overloads
					the += and << operator for VectorGraphic Objects
*********************************************************************/

//Function headers and macros
#include <crtdbg.h>
#include <iostream>
using namespace std;
#include "Point.h"
#include "Line.h"
#include "GraphicElement.h"
#include "VectorGraphic.h"

/********************************************************************
Function Name: 	AddGraphicElement
Purpose: 		Creates a new allocated array of GraphicElements with size one greater than the current array using
				the new operator. Transfers all elements from the current array to the new array. Once elements within
				the current array are copied into the new array, the current array is freed using the C++ operator "delete".
				The last index in the new array is used for the new VectorGraphic Element.
In parameters:	N/A
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
void VectorGraphic::AddGraphicElement() {
	GraphicElement* pNewElements = new GraphicElement[numGraphicElements + 1];		/*The new allocated memory to hold ALL previous elements and the new one*/
	static const int SIZE = 256;			/*Placeholder for the max size of the GraphicElements name*/
	unsigned int numLines;					/*Placeholder for the number of lines in the new GraphicElement*/
	Line* pLines;							/*Placeholder for the pointer used to create the new lines*/
	char name[SIZE];						/*Placeholder for the new Graphic Elements name*/
	
	for (unsigned int i = 0; i < numGraphicElements; i++) {					/*Loop through the old array and copy the values into the new array*/
		pNewElements[i] = pElements[i];
	}
	delete[] pElements;						/*Delete the old array*/

	/*Adding new information for the new Graphic Element*/
	cout << "Adding a Graphic Element";
	cout << "Please enter the name of the new GraphicElement(<256 characters): ";
	cin >> name;
	cout << "How many lines are there in the  new GraphicElement? ";
	cin >> numLines;
	/*Newly allocated memory for the Lines*/
	pLines = new Line[numLines];
	
	/*Iterate throught the new pLines and set the values for each line*/
	for (unsigned int i = 0; i < numLines; i++) {
		int x, y;
		cout << "Please enter the x coord of the start point of line index " << i << ": ";
		cin >> x;
		cout << "Please enter the y coord of the start point of line index " << i << ": ";
		cin >> y;
		/*Create a new Point start object*/
		Point s(x, y);
		cout << "Please enter the x coord of the end point of line index " << i << ": ";
		cin >> x;
		cout << "Please enter the y coord of the end point of line index " << i << ": ";
		cin >> y;
		/*Create a new Point end object*/
		Point e(x, y);
		/*Add the new start and end Point objects to the line*/
		Line line(s, e);
		/*Set the index i of pLine to the line object created*/
		pLines[i] = line;
	}
	/*The new GraphicElement object with the pLine, name and numLines initialized in the constructor*/
	GraphicElement newElement(pLines, name, numLines);

	/*Set the last index equal to the new GraphicElement object*/
	pNewElements[numGraphicElements] = newElement;
	/*Set the pElements pointer to point to the new GraphicElements created and increment the number of Graphic Elements by 1*/
	pElements = pNewElements;
	numGraphicElements++;
}

/********************************************************************
Function Name: 	DeleteGraphicElement
Purpose: 		Deletes a specific VALID index within the current array in the heap. A new array
				is allocated with size one less than the current array and all elements are transfered
				with the expection of the one deleted. The current array is freed and set to the new array.
In parameters:	N/A
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
void VectorGraphic::DeleteGraphicElement() {
	//If there are no Graphic Elements, return
	if (numGraphicElements == 0) {
		cout << "No elements to delete..." << endl;
		return;
	}

	//Select the index to delete
	unsigned int index;
	cout << "Deleting a Graphic Element" << endl;
	cout << "Please enter the index of the Graphic Element you wish to delete: ";
	cin >> index;

	/*If the index selected was incorrect, give the user 2 additional tries to
	* enter a valid array. If both those additional entries were invalid, return
	out of the function.
	*/
	int errCount = 0;
	while (index < 0 || index > numGraphicElements - 1) {
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

	/*
	* Set the new allocated array to size one smaller than the current array
	*/
	GraphicElement* pNewElements = new GraphicElement[numGraphicElements - 1];

	/*
	* Transfer all elements from the first index to the deleted index
	*/
	for (unsigned int i = 0; i < index; i++){ 
		pNewElements[i] = pElements[i];
	}

	/*
	* Transfer all elements from one past the deleted index to the end of the array
	*/
	for (unsigned int i = index; i < numGraphicElements - 1; i++){ 
		pNewElements[i] = pElements[i + 1];
	}
	
	/*Deallocate the current array and set the pointer to point at the new allocated array*/
	delete[]pElements;
	pElements = pNewElements;
	/*Decrement the size of the array by 1*/
	numGraphicElements--;
}

/********************************************************************
Function Name: 	operator+=
Purpose: 		Overloads the operator "+=" which addAssigns the pElements
In parameters:	GraphicElement& addAssign
Out parameters:	N/A
Version: 		1.0
Author: 		
**********************************************************************/
void VectorGraphic::operator+=(GraphicElement& addAssign){
	GraphicElement *merge = new GraphicElement[numGraphicElements + 1]; /*the new merge array*/
	GraphicElement * tmp = new GraphicElement(addAssign);				/*temp object holding the */

	for (unsigned int i = 0; i < numGraphicElements; i++){			/*Copy all the pElement objects into the merged array*/
		merge[i] = pElements[i];
	}
	delete[]pElements; // delete old array

	merge[numGraphicElements] = *tmp;		/*Set the last index equal to the added object*/
	delete tmp;								/*Delete the temporary pointer memory*/
	pElements = merge;						/*Set pElements to the new merge array and increment the numGraphicElements*/
	numGraphicElements++;
}

/********************************************************************
Function Name: 	operator[]
Purpose: 		Overloads the operator "[]" which returns the pElements at the index passed
In parameters:	int index
Out parameters:	GraphicElement&
Version: 		1.0
Author: 		
**********************************************************************/
GraphicElement& VectorGraphic::operator[](int index){														
	return pElements[index];			/*Return the GraphicElement object at the index*/

	/******************************************************************************************
	NOTE.....HOW AM I SUPPOSED TO HANDLE THE CASE WHERE THE INDEX IS INVALID...I AM ASSUMING THAT YOU WILL
	NOT CRASH THE PROGRAM WITH AN INVALID INDEX WHEN YOU ATTEMPT TO MERGE SINCE I HAVE NO CONTROL OF MAIN*
	******************************************************************************************/
}

/********************************************************************
Function Name: 	operator<<
Purpose: 		Overloads the "<<" operator for when outputting a VectorGraphic object
In parameters:	ostream& out, VectorGraphic& image
Out parameters:	ostream&
Version: 		1.0
**********************************************************************/
ostream& operator<<(ostream& out, VectorGraphic& image) {
	out << "VectorGraphic Report " << endl;
	/*Iterate through to display elements*/
	for (unsigned int i = 0; i < image.numGraphicElements; i++) {				/*Iterate through the elements and display*/
		out << "Reporting Graphic Element " << i << endl << image.pElements[i];
	}
	return out;
}
