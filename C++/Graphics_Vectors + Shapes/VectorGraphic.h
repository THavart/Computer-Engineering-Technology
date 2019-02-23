// VectorGraphic.h
#ifndef VECTORGRAPHIC_H
#define VECTORGRAPHIC_H

#include <vector>
using namespace std;

#include "GraphicElement.h"

class VectorGraphic : public vector<GraphicElement>
{
public:
	VectorGraphic();
	~VectorGraphic();
	void AddGraphicElement();
	void DeleteGraphicElement();
	friend ostream& operator<<(ostream&, VectorGraphic&);
};

#endif