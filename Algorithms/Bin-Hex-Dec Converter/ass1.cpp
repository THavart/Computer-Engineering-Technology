/******************************************************************************************************************************/
/*
•	Student Name:						Taylor Havart-Labrecque
•	Student Number:						040 764 885
•	Assignment Name:					Assignment 1 (Floating Point Spy)
•	Course Name/Number:					Numerical Computing - CST8233
•	Lab Section:						303
•	Professor:							Andrew Tyler
•	Due Date:							Feb 19 2017
•	Submission date of assignment:		Feb 19 2017
•	Filename:							Ass1.cpp
•   Purpose:							Until the user quits, converts a number given in float or double, into multiple different 
										formats	(Hex/Binary) displaying this information onto the screen 
										and reprompting for another input.
*/
/******************************************************************************************************************************/

#include <iostream>
#include <cstdlib>
#include <string>
#include <sstream>
#include <iomanip>

using namespace std;

void convert(double, char);

/******************************************************************************************************************************/
/*
• Name:									main()
• Purpose:								Main Function - Takes input from user and calls the correct function 
										based on user specification.
• Function In Paramenters:				N/A
• Function Out Parameters:				EXIT_SUCCESS or EXIT_FAILURE 
• Version:								1.0
• Author/Student Name:					Taylor Havart-Labrecque
*/
/******************************************************************************************************************************/
int main(void){
	unsigned short n = 0;
	double input;
	bool stop = false;

	while (stop == false){
		cout << "\n1 - Convert a Float\n";
		cout << "2 - Convert a Double\n";
		cout << "3 - Quit\n";
		cin >> n;
		switch (n){
		case 1:
			cout << "\nPlease enter the number to convert: ";
			cin >> input;
			convert((float)input, 'f');
			fflush(stdin);
			break;
		case 2:
			cout << "\nPlease enter the number to convert: ";
			cin >> input;
			convert(input, 'd');
			fflush(stdin);
			break;
		case 3:
			exit(EXIT_SUCCESS);
		default:
			return EXIT_FAILURE;
		}
	}
	return EXIT_FAILURE;
}
/******************************************************************************************************************************/
/*
• Name:									convert()
• Purpose:								Converts a float or double input into Hex & Binary numbers - outputs to screen.
• Function In Parameters:				User Input, type of input ('d' = double, 'f' = float)
• Function Out Parameters:				N/A - Function of type void
• Version:								1.0
• Author/Student Name:					Taylor Havart-Labrecque
*/
/******************************************************************************************************************************/
void convert(double input, char type){
	unsigned int i = 0, typeMod = 0; /*Count Variable, array start indicator*/
	stringstream ss; /*Used for hex conversion*/
	string bHexConv, sReturn = ""; /*Holds Hex Value, Holds Binary Value*/

	/*If converting a float, modify the typeMod and define the conversion union*/
	if (type == 'f'){
		typeMod = 8;
		/*Union for float defined*/
		union {
			unsigned long long num;
			float fp;
		} fc;
		/*Hex conversion*/
		fc.fp = (float)input;
		ss << hex << fc.num;
		bHexConv = ss.str();
	}
	else if (type == 'd'){
		typeMod = 0;
		/*Union for double defined*/
		union {
			unsigned long long num;
			double fp;
		} fc;
		/*Double Conversion*/
		fc.fp = input;
		ss << hex << fc.num;
		bHexConv = ss.str();
	}
	/*Converts Hex Characters to uppercase letters*/
	for (i = 0; bHexConv[i] != '\0'; i++){
		bHexConv[i] = toupper(bHexConv[i]);
	}
	/*Prints out the Number*/
	if (type == 'f'){
		cout << fixed << setprecision(6) << "Float Number:\t\t" << input;
	}
	else{
		cout << fixed << setprecision(6) << "Double Number:\t\t" << input;
	}
	 
	/*Hex to Binary Conversion Table*/
	for (i = typeMod; i < bHexConv.length(); i++)
	{
		switch (bHexConv[i])
		{
		case '0': sReturn.append("0000"); break;
		case '1': sReturn.append("0001"); break;
		case '2': sReturn.append("0010"); break;
		case '3': sReturn.append("0011"); break;
		case '4': sReturn.append("0100"); break;
		case '5': sReturn.append("0101"); break;
		case '6': sReturn.append("0110"); break;
		case '7': sReturn.append("0111"); break;
		case '8': sReturn.append("1000"); break;
		case '9': sReturn.append("1001"); break;
		case 'A': sReturn.append("1010"); break;
		case 'B': sReturn.append("1011"); break;
		case 'C': sReturn.append("1100"); break;
		case 'D': sReturn.append("1101"); break;
		case 'E': sReturn.append("1110"); break;
		case 'F': sReturn.append("1111"); break;
		}
	}

	cout << "\nBinary:      \t\t";

	for (i = 0; i < sReturn.length(); i++){
		cout << sReturn[i];
		if ((i + 1) % 4 == 0){
			cout << " ";
		}
	}

	/*Print out array of Big Endian Hex Values*/
	cout << "\nBig Endian Hex: \t";
	for (i = typeMod; i < 16; i++){
		cout << bHexConv[i];
		if ((i + 1) % 2 == 0){
			cout << " ";
		}
	}

	cout << "\nLittle Endian Hex: \t";

	/*Swapping the MSB from beginning to end*/
	if (type == 'f'){
		swap(bHexConv[8], bHexConv[14]);
		swap(bHexConv[9], bHexConv[15]);
		swap(bHexConv[10], bHexConv[12]);
		swap(bHexConv[11], bHexConv[13]);
	}else if (type == 'd'){
		swap(bHexConv[0], bHexConv[14]);
		swap(bHexConv[1], bHexConv[15]);
		swap(bHexConv[2], bHexConv[12]);
		swap(bHexConv[3], bHexConv[13]);
		swap(bHexConv[4], bHexConv[10]);
		swap(bHexConv[5], bHexConv[11]);
		swap(bHexConv[6], bHexConv[8]);
		swap(bHexConv[7], bHexConv[9]);
	}
	for (i = 8; i < 16; i++){
		cout << bHexConv[i];
		if ((i + 1) % 2 == 0){
			cout << " ";
		}
	}
	cout << endl;
}
