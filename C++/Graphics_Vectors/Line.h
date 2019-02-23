#include <iostream>
using namespace std;

class Line
{
	Point start, end;
public:
	Line(Point s = 0, Point e = 0) :start(s), end(e){}
	friend ostream& operator<<(ostream&, Line&);
};
