
#include <stdio.h>
#include <stdlib.h>
#include <iostream>
#include <fstream>
#include <vector>
#include <iomanip>
#include <math.h>
using namespace std;

double calculateSD(vector<double>);

int main(void){
	int option = 0, i = 0;
	char filename[64];
	double input;
	vector <double> timeArr;
	vector <double> coArr;
	cout << "******************************************************************" << endl;
	cout << "Linear Regression of Data - Function Type Menu" << endl;
	cout << "1. Linear:\ty = a*x + b" << endl;
	cout << "2. Power Law:\ty = a*x^b" << endl;
	cout << "3. Quit" << endl;
	cout << "******************************************************************" << endl;

	cout << "Select an Option: ";
	cin >> option;
	cout << endl << "Please enter the name of the file to open: ";
	cin >> filename;

	ifstream file(filename);

	if (file.is_open()){
		while (file >> input){
			timeArr.push_back(input);
			if (file >> input){
				coArr.push_back(input);
			}
		}
	}
	double sXY = 0, sX = 0, sX2 = 0, sY = 0, n = 0, m = 0, b = 0;

	/*Sum of X & Y Calculation*/
	for (i = 0; i < timeArr.size() && i < coArr.size(); i++){
		sXY += timeArr[i] * coArr[i];
		sX += timeArr[i];
		sY += coArr[i];
		sX2 += timeArr[i] * timeArr[i];
	}
	/*Slope calculation*/
	n = timeArr.size();

	m = (n*sXY - (sX*sY)) / (n*sX2 - (sX*sX));

	b = (sY - (m*sX)) / n;

	switch (option){
	case 1:
		cout << setprecision(4) << "y = " << m << "x " << setprecision(3) << b << endl;
		cout << "Standard Deviation = " << calculateSD(coArr);
		break;
	case 2:
		vector <double> y;
		vector <double> x;
		
		for (i = 0; i < timeArr.size(); i++){
			x.push_back(log(timeArr[i]));
		}
		for (i = 0; i < coArr.size(); i++){
			y.push_back(log(coArr[i]));
		}

		n = x.size();

		for (i = 0; i < x.size() && i < y.size(); i++){
			sXY += x[i] * y[i];
			sX += x[i];
			sY += y[i];
			sX2 += x[i] * x[i];
		}
		
		/*Slope calculation*/
		m = log(n*sXY - (sX*sY)) / (n*sX2 - (sX*sX));
		m = exp(m);
		b = (sY - (m*sX)) / n;

		cout << "y = " << m << "x^" << setprecision(3) << b << endl;
	}
	

	return 0;
}
double calculateSD(vector <double> data)
{
	double sum = 0.0, mean, standardDeviation = 0.0;

	int i;

	for (i = 0; i < data.size(); ++i)
	{
		sum += data[i];
	}

	mean = sum / data.size();

	for (i = 0; i < data.size(); ++i)
		standardDeviation += pow(data[i] - mean, 2);

	return sqrt(standardDeviation / data.size());
}

