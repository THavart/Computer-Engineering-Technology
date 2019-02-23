#include <iostream>
using namespace std;

class Point
{
	int x, y;
public:
	Point(int x = 0, int y = 0) :x(x), y(y){}
	friend ostream& operator<<(ostream&, Point&);
};
