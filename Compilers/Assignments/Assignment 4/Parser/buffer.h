/* File name : buffer.h
Compiler : MS Visual Studio 2013
Author : Taylor Havart - Labrecque - 040 764 885
Course : CST 8152 – Compilers, Lab Section : [12]
Assignment : Buffer - Assignment 1
Date : 01 / 02 / 17
Professor : Sv.Ranev
Purpose : Contains all necessary information about the array of characters :
-Pointer to the beginning of the character array location in memory
- Current Size
- Next Character entry position
- Increment factor
- Operational Mode
- End of Buffer flag
- Reallocation Flag
*/
#ifndef BUFFER_H_
#define BUFFER_H_

/*#pragma warning(1:4001) *//*to enforce C89 type comments  - to make //comments an warning */

/*#pragma warning(error:4001)*//* to enforce C89 comments - to make // comments an error */

/* standard header files */

#include <stdio.h>  /* standard input/output */
#include <malloc.h> /* for dynamic memory allocation*/
#include <limits.h> /* implementation-defined data type ranges and limits */
#include <string.h>

/* constant definitions */
/* You may add your own constant definitions here */
#define R_FAIL1 -1         /* fail return value */
#define R_FAIL2 -2         /* fail return value */
#define LOAD_FAIL -2       /* load fail error */
#define SET_R_FLAG 1       /* realloc flag set value */
#define B_FULL(pBD)((pBD->addc_offset >= b_capacity(pBD)) ? 1 : 0) /*isFull Macro (Bonus)*/

/* user data type declarations */
typedef struct BufferDescriptor {
	char *cb_head;   /* pointer to the beginning of character array (character buffer) */
	short capacity;    /* current dynamic memory size (in bytes) allocated to character buffer */
	short addc_offset;  /* the offset (in chars) to the add-character location */
	short getc_offset;  /* the offset (in chars) to the get-character location */
	short markc_offset; /* the offset (in chars) to the mark location */
	char  inc_factor; /* character array increment factor */
	char  r_flag;     /* reallocation flag */
	char  mode;       /* operational mode indicator*/
	int   eob;       /* end-of-buffer flag */
} Buffer, *pBuffer;



/*****************************************************/
/*Function Prototypes*/
/*****************************************************/
Buffer * b_create(short init_capacity, char inc_factor, char o_mode); /*Creates a new buffer in memory (on the heap)*/
pBuffer b_addc(pBuffer const pBD, char symbol); /*Resets r_flag to 0, and tries to add the character symbol to the
												character array of the given buffer pointed by pBD.*/
int b_reset(Buffer * const pBD); /*Retains the memory space allocated to the buffer but re-initializes
								 all appropriate data members of the given buffer*/
void b_free(Buffer * const pBD); /*De-allocates(frees) the memory occupied by the buffer*/
int b_isfull(Buffer * const pBD); /*Returns 1 if the buffer is full, 0 otherwise*/
short b_size(Buffer * const pBD); /*Returns the current size of the character buffer*/
short b_capacity(Buffer * const pBD); /*Returns current capacity of the character buffer*/
char * b_setmark(Buffer * const pBD, short mark); /*Sets markc_offset to mark, returns a pointer to the markc_offset location in
												  the character buffer array.*/
short b_mark(Buffer * const pBD); /* Returns markc_offset*/
int b_mode(Buffer * const pBD); /*Returns mode value*/
size_t b_incfactor(Buffer * const pBD); /*Returns the non-negative value of inc_factor*/
int b_load(FILE * const fi, Buffer * const pBD); /*Loads an open input file into a specified buffer using fgetc*/
int b_isempty(Buffer * const pBD); /*Returns 1 if addc_offset is 0, otherwise returns 0*/
int b_eob(Buffer * const pBD); /*Returns eob*/
char b_getc(Buffer * const pBD); /*Checks for argument validity, compares addc_offset and getc_offset and sets eob
								 accordingly, returns character located at getc_offset*/
int b_print(Buffer * const pBD); /*Diagnostic Purposes only - prints character by character the contents of the
								 character buffer*/
Buffer * b_pack(Buffer * const pBD); /*Shrinks/Expands the buffer to a new capacity*/
char b_rflag(Buffer * const pBD); /*Returns r_flag*/
short b_retract(Buffer *const pBD); /*Decrements getc_offset by 1*/
short b_retract_to_mark(Buffer * const pBD); /*Sets getc_offset to the value of the current markc_offset*/
short b_getcoffset(Buffer * const pBD); /*Returns getc_offset*/

#endif
