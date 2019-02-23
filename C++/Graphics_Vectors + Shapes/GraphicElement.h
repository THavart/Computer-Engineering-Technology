// GraphicElement.h
#ifndef GRAPHICELEMENT_H
#define GRAPHICELEMENT_H

#include <vector>
using namespace std;

#include "Shape.h"

class GraphicElement : public vector<Shape*>
{
	static const int SIZE = 256;
	char name[SIZE];
public:
	GraphicElement(Shape**, char*, unsigned int);
	GraphicElement(const GraphicElement&);
	GraphicElement& operator=(GraphicElement&);
	~GraphicElement();
	friend ostream& operator<<(ostream&, GraphicElement&);
};

#endif