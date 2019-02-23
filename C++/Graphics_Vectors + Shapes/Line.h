// Line.h
#ifndef LINE_H	
#define LINE_H

#include "Shape.h"

class Line :public Shape
{
public:
	Line(char* name, Pair start, Pair end) :Shape(name, start, end){};
	~Line(){}
	Pair CalculateCentre();
	void Report();
};

#endif