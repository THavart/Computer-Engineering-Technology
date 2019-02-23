#include <iostream>
using namespace std;

class GraphicElement
{
	static const int SIZE = 256;
	unsigned int numLines;
	Line* pLines;
	char name[SIZE];
public:
	GraphicElement() :pLines(nullptr), numLines(0){}
	GraphicElement(Line*, char*, unsigned int);
	GraphicElement(GraphicElement&);
	GraphicElement& operator=(GraphicElement&);
	GraphicElement operator+(GraphicElement&);
	~GraphicElement()
	{
		if (pLines)
			delete[]pLines;
	}
	friend ostream& operator<<(ostream&, GraphicElement&);
};
