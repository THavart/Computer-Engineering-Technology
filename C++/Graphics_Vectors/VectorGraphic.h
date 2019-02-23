#include <iostream>
using namespace std;

class VectorGraphic
{
	unsigned int numGraphicElements;
	GraphicElement* pElements;
public:
	VectorGraphic() :pElements(nullptr), numGraphicElements(0){}
	~VectorGraphic()
	{
		if (pElements)
			delete[]pElements;
	}
	void AddGraphicElement();
	void DeleteGraphicElement();
	void operator+=(GraphicElement&); // add Element at end
	GraphicElement& operator[](int index);
	friend ostream& operator<<(ostream&, VectorGraphic&);
};
