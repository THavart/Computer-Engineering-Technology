/*****************************************************************************************************************/
/*
•       Filename: assign2.cpp
•       Version	Program version number (change history): 1.0
•       Author/Student Name: Taylor Havart-Labrecque
•       Student Number: 040 764 885
•       Course Name and Number: CST8233 - Numerical Computing 
•       Lab Section: 300
•       Assignment Number: 2
•       Assignment Name: Lagrange Interpolation
•       Due Date: 19/03/17
•       Submission Date: 16/03/17
•       Professor’s Name: Andrew Tyler
•       Purpose: Take in point inputs and output the lagrange interpolation of the inputs.
*/
/*****************************************************************************************************************/

#include <stdio.h>
#include <cstdlib>
#include <iostream>
#include <iomanip>

void interpolation();
double interpolate(int, double[], double[], double);
using namespace std;
/*****************************************************************************************************************/
/*
•       main()
•       Purpose: Display Menu and call exterior functions - return exit values.
•       Function In parameters: void
•       Function Out parameters: EXIT_SUCCESS or EXIT_FAILURE
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
int main(void){
		char option = ' ';
	
	while (option != 'q'){
		cout << "Please select an option:\nPress i to do an interpolation\nPress q to quit\n";
		cin >> option;
		switch (option){
		case 'i':
			interpolation();
		case 'q':
			exit(EXIT_SUCCESS);
		default:
			cout << "You have entered an incorrect key! Try again\n";
		}
	}
	return 0;
}
/*****************************************************************************************************************/
/*
•       interpolation()
•       Purpose: Display Menu options, Take in control point values from user and output formatted values back.
•       Function In parameters: void
•       Function Out parameters: N/A
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
void interpolation(){
	cout << "Do a Lagrange Interpolation\n";
	unsigned char i = 0, choice = 0;
	int controlPoint = 0, xValues = 0;
	double interpolateValue = 0, xArr[256], yArr[256], temp; 

	cout << "How many control points are there?\n";
	cin >> controlPoint;
	for (i = 0; i < controlPoint; i++){
		cout << "Please enter the x coordinate for control point #" << (int)i << ": ";
		cin >> xArr[i];
		cout << "Please enter the y coordinate for control point #" << (int)i << ": ";
		cin >> yArr[i];
		}	
	while (choice != 'q'){
		cout << "Please select an option\n";
		cout << "Press s to do a single interpolation\n";
		cout << "Press r to interpolate in increments over the entire range\n";
		cout << "Press q to quit\n";
		cin >> choice;
		switch (choice){
		case 's':
			cout << "Interpolate Single\n";
			cout << "Please enter the value of x you wish to interpolate for: ";
			cin >> interpolateValue;
			cout << setprecision(6) << fixed << "Interpolated pair is (" << interpolateValue << "," << interpolate(controlPoint, xArr, yArr, interpolateValue) << ")\n";
			break;
			/*Single Interpolation Here*/
		case 'r':
			cout << setprecision(4) << fixed;
			cout << "The interpolation goes from x = 1.000000 to x = 2.200000\n";
			cout << "Please enter the number of values of x you wish to interpolate for: ";
			cin >> xValues;
			cout << "#\t";
			for (i = 0; i < xValues; i++){
				if ((i+1) % 10 == 0 && i != 0){
					cout << "\n";
				}
					cout << (int)i+1 << "\t";
			}
			cout << "\nx:\t";

			temp = 1.2 / (xValues-1);
			interpolateValue = 1;
			for (i = 0; i < xValues; i++){
				if ((i + 1) % 10 == 0 && i != 0){
					cout << "\n";
				}
				cout << interpolateValue << "\t";
				interpolateValue += temp;
			}
			interpolateValue = 1;
			cout << "\ny:\t";
			for (i = 0; i < xValues; i++){
				if ((i + 1) % 10 == 0 && i != 0){
					cout << "\n";
				}
				cout << interpolate(controlPoint, xArr, yArr, interpolateValue) << "\t";
				interpolateValue += temp;
			}

			cout << "\n";
			break;
			/*Interpolate in increments over entire range here*/
		case 'q':
			exit(EXIT_SUCCESS);
		default:
			exit(EXIT_FAILURE);
		}
	}
}
/*****************************************************************************************************************/
/*
•       interpolate()
•       Purpose: Display Menu and call exterior functions - return exit values.
•       Function In parameters: int controlPoint, double xArr[], double yArr[], double interpolateValue
•       Function Out parameters: f(x) - Y Value
•       Version	Function version: 1.0
•       Author/Student Name: Taylor Havart-Labrecque
*/
/*****************************************************************************************************************/
double interpolate(int controlPoint, double xArr[], double yArr[], double interpolateValue){
	double value[25], temp = 0, fx = 0;
	int i = 0, k = 0, j = 0;
	
	for (i = 0; i < controlPoint; i++){
		temp = 1;
		k = i;
		for (j = 0; j < controlPoint; j++){
			if (k == j){
				continue;
			}
			else{
				temp = temp * ((interpolateValue - xArr[j]) / (xArr[k] - xArr[j]));
			}
		}
		value[i] = yArr[i] * temp;
	}
	for (i = 0; i < controlPoint; i++){
		fx = fx + value[i];
	}
	return fx;
}