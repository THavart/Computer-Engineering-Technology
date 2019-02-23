// ass3 W17 

#define _CRT_SECURE_NO_WARNINGS
#define _CRTDBG_MAP_ALLOC	// need this to get the line identification
//_CrtSetDbgFlag(_CRTDBG_ALLOC_MEM_DF|_CRTDBG_LEAK_CHECK_DF); // in main, after local declarations
//NB must be in debug build
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

enum{ RUNNING = 1 };

VectorGraphic Image;

int main()
{
	char response;
	_CrtSetDbgFlag(_CRTDBG_ALLOC_MEM_DF | _CRTDBG_LEAK_CHECK_DF);

	while (RUNNING)
	{
		cout << endl << "Please select an option:\n" << endl;
		cout << "1. Add a Graphic Element\n";
		cout << "2. Delete a Graphic Element\n";
		cout << "3. List the Graphic Elements\n";
		cout << "4. Intensify Colours\n";
		cout << "q. Quit\n";
		cout << "\nCHOICE: ";
		cin >> response;

		switch (response)
		{
		case '1':Image.AddGraphicElement(); break;
		case '2':Image.DeleteGraphicElement(); break;
		case '3':cout << Image; break;
		case '4':Image.IntensifyColour(); break;
		case 'q':return 0;
		default:cout << "Please enter a valid option\n";
		}
		cout << endl;
	}
	return 0;
}

