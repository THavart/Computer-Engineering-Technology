#include <iostream>
using namespace std;
#include "Point.h"
#include "Line.h"
#include "GraphicElement.h"
#include "VectorGraphic.h"
#define _CRT_SECURE_NO_WARNINGS
enum{ RUNNING = 1 };

int main()
{
	char response;
	VectorGraphic Image;

	while (RUNNING)
	{
		cout << endl << "Please select an option:" << endl;
		cout << "1. Add a Graphic Element" << endl;
		cout << "2. Delete a GraphicElement" << endl;
		cout << "3. Merge two Graphic Elements (added at the end)" << endl;
		cout << "4. List the Graphic Elements" << endl;
		cout << "q. Quit" << endl;
		cout << "CHOICE: ";
		cin >> response;
		switch (response)
		{
		case '1':Image.AddGraphicElement(); break;
		case '2':Image.DeleteGraphicElement(); break;
		case '3':
		{
					int index1, index2;
					cout << "Please enter the index of the first Graphic Element to merge" << endl;
					cin >> index1;
					cout << "Please enter the index of the second Graphic Element to merge" << endl;
					cin >> index2;
					Image += Image[index1] + Image[index2];
					break;
		}
		case '4':cout << Image; break;
		case 'q': 
			_CrtSetDbgFlag(_CRTDBG_ALLOC_MEM_DF | _CRTDBG_LEAK_CHECK_DF);
			return 0;
		default:cout << "Please enter a valid option\n";
		}
		cout << endl;
	}
}
