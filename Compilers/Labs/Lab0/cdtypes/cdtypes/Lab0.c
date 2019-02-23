#include <stdio.h>
#include <math.h>
#include <limits.h>

int main(void){
	int max_value = 0;
	short iov = 0;
	int temp = 0;

	printf("The size of type char is: %u\n", sizeof(char));
	printf("The size of type short is: %u\n", sizeof(short));
	printf("The size of type int is: %u\n", sizeof(int));
	printf("The size of type unsigned int is: %u\n", sizeof(unsigned int));
	printf("The size of type long is: %u\n", sizeof(long));
	printf("The size of type float is: %u\n", sizeof(float));
	printf("The size of type double is: %u\n", sizeof(double));


	max_value = (int)pow(2, (sizeof(short)*8) - 1) - 1;

	printf("\n-------------------------------------\n\n");
	printf("The last positive value is: %d\n", max_value);

	max_value = (int)pow(2, (sizeof(short)* 8)) - 1;

	printf("The last positive unsigned value is: %d\n", max_value);

	printf("\n-------------------------------------\n\n");

	printf("Short max value = %d\n", SHRT_MAX);
	printf("Unsigned max value = %d\n", USHRT_MAX);

	while (iov >= 0){
		iov += 10000;
		if (iov > 0){
			temp = iov;
		}
		if (iov < 0){
			printf("IOV Value: %d\n", temp);
		}
	}
	printf("Negative IOV Value: %d\n", iov);

	printf("\n-------------------------------------\n\n");

	printf("As the value of short is reached, it will add the remaining \namount onto the back of the short (negative side), \nin effect wrapping around.\n");

	return 0;
}
