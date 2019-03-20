/*
File name : buffer.c
Compiler : MS Visual Studio 2013
Author : Taylor Havart-Labrecque - 040 764 885
Course : CST 8152 – Compilers, Lab Section : [12]
Assignment : Buffer - Assignment 1
Date : 01/02/17
Professor : Sv.Ranev
Purpose : Contains all necessary information about the array of characters:
- Pointer to the beginning of the character array location in memory
- Current Size
- Next Character entry position
- Increment factor
- Operational Mode
- End of Buffer flag
- Reallocation Flag
Function list :
- b_create() - Creates a new buffer in memory (on the heap)
- b_addc() - Resets r_flag to 0, and tries to add the character symbol to the
character array of the given buffer pointed by pBD.
- b_reset() - Retains the memory space allocated to the buffer but re-initializes
all appropriate data members of the given buffer
- b_free() - De-allocates(frees) the memory occupied by the buffer
- b_isfull() - Returns 1 if the buffer is full, 0 otherwise
- b_size() - Returns the current size of the character buffer
- b_capacity() - Returns current capacity of the character buffer
- b_setmark() - Sets markc_offset to mark, returns a pointer to the markc_offset location in
the character buffer array.
- b_mark() - Returns markc_offset
- b_mode() - Returns mode value
- b_incfactor() - Returns the non-negative value of inc_factor
- b_load() - Loads an open input file into a specified buffer using fgetc
- b_isempty() - Returns 1 if addc_offset is 0, otherwise returns 0
- b_eob() - Returns eob
- b_getc() - Checks for argument validity, compares addc_offset and getc_offset and sets eob
accordingly, returns character located at getc_offset
- b_print - Diagnostic Purposes only - prints character by character the contents of the
character buffer
- b_pack() - Shrinks/Expands the buffer to a new capacity
- b_rflag() - Returns r_flag
- b_retract() - Decrements getc_offset by 1
- b_retract_to_mark() - Sets getc_offset to the value of the current markc_offset
- b_getcoffset() - Returns getc_offset
*/

/*Ignores warnings from incorrect comments in sal.h*/
#pragma warning(push)
#pragma warning(disable : 4001)
#include "buffer.h"
#pragma warning(pop)

/*Bonus marks macro preprocessor*/
#if (BFULL)

#define b_isFull B_FULL

#endif
/*****************************************************/
/*
Purpose: Creates a new buffer in memory (on the heap)
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: initial capacity (< 0), increment factor (non-negative), o_mode('f', 'a', or 'm' expected)
Return Value: NULL if something went wrong, pBD if was successful.
Algorithm: Allocates memory to the buffer pointer, sets mode/inc_factor based on the mode and inc_factor parameters
*/
/*****************************************************/
Buffer* b_create(short init_capacity, char inc_factor, char o_mode){

	/*tries to allocate memory for one Buffer structure using calloc();*/
	Buffer* pBD;
	/*If calloc fails to allocate memory, return out of function*/
	if ((pBD = (Buffer*)calloc(1, sizeof(Buffer))) == NULL){
		return NULL;
	}
	/*tries to allocates memory for one dynamic character buffer(character array) calling malloc() with
	the given initial capacity init_capacity and.The returned pointer is assigned to cb_head; */
	if (init_capacity < 0){
		return NULL;
	}
	if ((pBD->cb_head = malloc(init_capacity*sizeof(char))) == NULL){
		return NULL;
	}
	/*sets the buffer operational mode indicator mode and the Buffer structure increment factor inc_factor*/

	/*If the o_mode is the symbol f or inc_factor is 0, the mode and the buffer inc_factor are set to number 0.*/

	if (o_mode == 'f' || inc_factor == 0){
		pBD->mode = 0;
		pBD->inc_factor = 0;

		if (init_capacity == 0){
			return NULL;
		}
	}
	/*If the o_mode is a and inc_factor is in the range of 1 to 255 inclusive
	the mode is set to number 1 and the buffer inc_factor is set to the value of inc_factor.*/
	else if (o_mode == 'a' && ((unsigned char)inc_factor >= 1 && (unsigned char)inc_factor <= 255)){
		pBD->mode = 1;
		pBD->inc_factor = inc_factor;
	}
	/*If the o_mode is m and inc_factor is in the range of 1 to 100 inclusive, the mode is
	set to number -1 and the inc_factor value is assigned to the buffer inc_factor*/
	else if (o_mode == 'm' && ((unsigned char)inc_factor >= 1 && (unsigned char)inc_factor <= 100)){
		pBD->mode = -1;
		pBD->inc_factor = inc_factor;
	}
	else{
		return NULL;
	}
	/*copies the given init_capacity into the Buffer structure capacity variable*/
	pBD->capacity = init_capacity;

	return pBD;
}
/*****************************************************/
/*
Purpose: Resets r_flag to 0, and tries to add the character symbol to the
character array of the given buffer pointed by pBD.
- Function varies based on mode:
- 'f' - fixed mode will not change capacity
- 'a' - additive mode will increment capacity by adding inc_factor
- 'm' - multiplicative mode will increment capacity with algorithm
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: b_isfull(), b_capacity(), b_incfactor(),
Parameters: pBD - Buffer Constant, symbol - character to be added
Return Value: pBD - Buffer Constant
Algorithm: Checks if the buffer is full - if not full, add char. If full, specify mode then act according algorithm for each mode is defined as:
- 'f' - fixed mode - return NULL if full
- 'a' - additive mode - add inc_factor to capacity
- 'm' - multiplicative mode - newCapacity = Capacity + newIncrement((inc_factor / 100) * availableSpace(SHRT_MAX * Capacity))
*/
/*****************************************************/
pBuffer b_addc(pBuffer const pBD, char symbol){

	/*Holds the newCapacity before being integrated into the char buffer*/
	short newCapacity = 0, newIncrement = 0;
	/*Used in equations for multiplicative mode*/
	double availableSpace = 0;
	/*Failsafe so relloc doesn't corrupt buffer*/
	char* temp;
	/*The function resets r_flag to 0*/
	pBD->r_flag = 0;
	/*Checks if buffer is full, if not add*/
	if (b_isfull(pBD) == 0){
		pBD->cb_head[pBD->addc_offset++] = symbol;
		return pBD;
	}
	/*If the Buffer is full*/
	/*Fixed*/
	if (b_isfull(pBD) == 1){
		if (pBD->mode == 0){
			return NULL;
		} /*Fixed Mode End*/
		/*Additive*/
		if (pBD->mode == 1){
			if ((b_capacity(pBD) + b_incfactor(pBD)) > SHRT_MAX){
				newCapacity = SHRT_MAX;
				return NULL;
			}
			else{
				if (newCapacity < 0){
					return NULL;
				}
				newCapacity = (b_capacity(pBD) + (short)b_incfactor(pBD));
			}
		} /* Additive Mode end*/
		/*Multiplicative*/
		if (pBD->mode == -1){
			/*Capacity can't be more than the variable can hold*/
			if (b_capacity(pBD) == SHRT_MAX){
				return NULL;
			}
			/*Capacity Expansion Algorithm*/
			availableSpace = SHRT_MAX - b_capacity(pBD);
			newIncrement = (short)(((double)b_incfactor(pBD) / 100)*availableSpace);
			if (newIncrement == 0){
				newCapacity = SHRT_MAX;
			}
			else {
				newCapacity = (short)(b_capacity(pBD) + newIncrement);
			}
		} /*Multiplicative mode end*/
	} /* Is full end*/

	/*Attempt to realloc*/
	temp = (char*)realloc(pBD->cb_head, (size_t)newCapacity);
	if (!temp){
		return NULL;
	}
	/*If they are not the same, update necessary variables*/
	if (temp != pBD->cb_head){
		pBD->r_flag = SET_R_FLAG;
		pBD->cb_head = temp;
	}
	/*Update values*/
	pBD->cb_head[pBD->addc_offset++] = symbol;
	pBD->capacity = (short)newCapacity;

	return pBD;
}
/*****************************************************/
/*
Purpose: Retains the memory space allocated to the buffer at the moment
but re-initializes all data members of the given Buffer structure
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1 SUCCESS: 1
Algorithm: Sets necessary items to 0
*/
/*****************************************************/
int b_reset(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	/*Sets necessary variables to 0*/
	pBD->addc_offset = 0;
	pBD->markc_offset = 0;
	pBD->getc_offset = 0;
	pBD->r_flag = 0;
	pBD->eob = 0;

	return 1;
}
/*****************************************************/
/*
Purpose: De-Allocates the memory occupied by the char buffer & Buffer Structure
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: N/A
Algorithm: Frees
*/
/*****************************************************/
void b_free(Buffer* const pBD){
	if (pBD){
		free(pBD->cb_head);
		free(pBD);
	}
}
/*****************************************************/
/*
Purpose: Returns 1 if the char buffer is full, 0 if otherwise
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: b_capacity()
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1 FULL: 1 NOT FULL: 0
Algorithm: Compare addc_offset to Capacity to check if full
*/
/*****************************************************/
int b_isfull(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	/*If the add location is at or is greater than the capacity*/
	if (pBD->addc_offset >= b_capacity(pBD)){
		return 1;
	}
	else {
		return 0;
	}
}
/*****************************************************/
/*
Purpose: Returns the current size of the char buffer
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: addc_offset
Algorithm: N/A
*/
/*****************************************************/
short b_size(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	return pBD->addc_offset;
}
/*****************************************************/
/*
Purpose: Returns the current capacity of the char buffer
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: Capacity
Algorithm: N/A
*/
/*****************************************************/
short b_capacity(Buffer* const pBD){
	/*Tests to make sure capacity is in bounds*/
	if (!pBD || pBD->capacity < 0 || pBD->capacity > SHRT_MAX){
		return R_FAIL1;
	}
	return pBD->capacity;
}
/*****************************************************/
/*
Purpose: Sets markc_offset to mark
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer, mark (within size of buffer)
Return Value: FAIL: NULL SUCCESS: Pointer to the char buffer array at markc_offset
Algorithm: N/A
*/
/*****************************************************/
char* b_setmark(Buffer* const pBD, short mark){
	if (!pBD){
		return NULL;
	}
	/*Tests that mark is within bounds*/
	if (0 <= mark && mark <= pBD->addc_offset){
		pBD->markc_offset = mark;
		return &pBD->cb_head[pBD->markc_offset];
	}
	return NULL;
}
/*****************************************************/
/*
Purpose: Returns markc_offset to the calling function
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: markc_offset
Algorithm: N/A
*/
/*****************************************************/
short b_mark(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	return pBD->markc_offset;
}
/*****************************************************/
/*
Purpose: Returns value of mode to the calling function
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: mode
Algorithm: N/A
*/
/*****************************************************/
int b_mode(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	return pBD->mode;
}
/*****************************************************/
/*
Purpose: Returns the non-negative value of inc_factor to the calling function
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: 256 SUCCESS: inc_factor (non-negative)
Algorithm: Returns non-negative inc_factor
*/
/*****************************************************/
size_t b_incfactor(Buffer* const pBD){
	if (!pBD){
		return 256;
	}
	if (pBD->inc_factor < 0){
		return pBD->inc_factor * -1;
	}

	return pBD->inc_factor;
}
/*****************************************************/
/*
Purpose: Loads(reads) an open input file specified by fi into a buffer
specified by pBD
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: b_addc()
Parameters: pBD - Buffer Pointer, fi - file pointer constant
Return Value: Number of Characters in char buffer, -1 on fail.
Algorithm: While there is content in the file the data is loaded and added into addc(), numbers of chars is counted
*/
/*****************************************************/
int b_load(FILE* const fi, Buffer* const pBD){
	/*Counts the number of characters - is the return value*/
	short numChars = 0;
	/*Temp variable to hold the input from file*/
	char symbol = 0;
	if (!fi || !pBD){
		return R_FAIL1;
	}
	symbol = (char)fgetc(fi);
	/*While there is still characters, call function to add the char and increment numChars*/
	while (!feof(fi)){
		if (!(b_addc(pBD, symbol))){
			return LOAD_FAIL;
		}
		symbol = (char)fgetc(fi);
		numChars++;
	}
	return numChars;
}
/*****************************************************/
/*
Purpose: If the addc_offset is 0, return 1. Otherwise return 0
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1 SUCCESS: 0
Algorithm: N/A
*/
/*****************************************************/
int b_isempty(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	if (pBD->addc_offset == 0){
		return 1;
	}
	return 0;
}
/*****************************************************/
/*
Purpose: Returns eob to calling function
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: N/A
Algorithm: eob
*/
/*****************************************************/
int b_eob(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	return pBD->eob;
}
/*****************************************************/
/*
Purpose: Returns the character located at getc_offset
increments getc_offset by 1
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -2, EOB: -1, SUCCESS: Char at getc_offset in char buffer
Algorithm:
*/
/*****************************************************/
char b_getc(Buffer* const pBD){
	if (!pBD){
		return R_FAIL2;
	}
	/*if the offsets are equal update end of buffer flag*/
	if (pBD->getc_offset == pBD->addc_offset){
		pBD->eob = 1;
		return -1;
	}
	pBD->eob = 0;
	return pBD->cb_head[pBD->getc_offset++];
}
/*****************************************************/
/*
Purpose: Diagnostic Purposes only - uses printf to print char by char
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: b_isempty(), b_getcoffset(), b_getc(), b_eob()
Parameters: pBD - Buffer Pointer
Return Value: Number of Chars, -1 on fail.
Algorithm: while the eob flag is not 1, data is printed out of b_getc()
*/
/*****************************************************/
int b_print(Buffer* const pBD){

	/*Offset - Temp variable to hold offset, numChars - Counts the number of characters - return value*/
	short offset, numChars = 0;
	/*Holds a char from b_getc()*/
	char temp = 0;

	if (!pBD){
		return R_FAIL1;
	}
	if (b_isempty(pBD) == 1){
		printf("The buffer is empty.\n");
		return 0;
	}
	/*Temporarily set getc_offset to 0*/
	offset = b_getcoffset(pBD);
	pBD->getc_offset = 0;

	temp = b_getc(pBD);

	/*While the end of the buffer is not met, print characters from b_getc() function*/
	while (b_eob(pBD) == 0){
		printf("%c", temp);
		temp = b_getc(pBD);
		numChars++;
	}

	pBD->getc_offset = offset;
	printf("\n");
	return numChars;
}
/*****************************************************/
/*
Purpose: Shrinks(or may expand) the buffer to a new capacity
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: pBD - Buffer Pointer, NULL on fail
Algorithm: Attempts to realloc the char buffer, if successful update fields in the buffer.
*/
/*****************************************************/
Buffer* b_pack(Buffer* const pBD){
	/*Failsafe for realloc - avoids corrupting buffer*/
	char* temp;
	/*Temp variable to hold the expanded/shrunk capacity*/
	short newCapacity;

	if (!pBD){
		return NULL;
	}
	/*Sets r_flag to 0, attempts to reallocate memory for new capacity*/
	pBD->r_flag = 0;
	newCapacity = (pBD->addc_offset + 1)*sizeof(char);
	temp = realloc(pBD->cb_head, newCapacity);
	if (temp == NULL){
		return NULL;
	}
	/*if successful, update r_flag and temp*/
	if (temp != pBD->cb_head){
		pBD->cb_head = temp;
		pBD->r_flag = SET_R_FLAG;
	}
	/*update capacity*/
	pBD->capacity = newCapacity;
	return pBD;
}
/*****************************************************/
/*
Purpose: Returns r_flag to the calling function
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1, SUCCESS: rflag
Algorithm: N/A
*/
/*****************************************************/
char b_rflag(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	return pBD->r_flag;
}
/*****************************************************/
/*
Purpose: Decrements getc_offset by 1
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1, SUCCESS: getc_offset - 1
Algorithm: N/A
*/
/*****************************************************/
short b_retract(Buffer* const pBD){
	if (!pBD || pBD->getc_offset <= 0){
		return R_FAIL1;
	}
	return --pBD->getc_offset;
}
/*****************************************************/
/*
Purpose: Sets getc_offset to the value of the current markc_offset
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1, SUCCESS: getc_offset
Algorithm: getc_offset equals markc_offset
*/
/*****************************************************/
short b_retract_to_mark(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	pBD->getc_offset = pBD->markc_offset;
	return pBD->getc_offset;
}
/*****************************************************/
/*
Purpose: Returns getc_offset to the calling function
Author: Taylor Havart-Labrecque
History/Versions: 1.0 - 01/02/17
Called Functions: N/A
Parameters: pBD - Buffer Pointer
Return Value: FAIL: -1, SUCCESS: getc_offset
Algorithm: N/A
*/
/*****************************************************/
short b_getcoffset(Buffer* const pBD){
	if (!pBD){
		return R_FAIL1;
	}
	return pBD->getc_offset;
}