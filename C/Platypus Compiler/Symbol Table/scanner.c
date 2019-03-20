/*
* File Name:	scanner.c
* Compiler:		Microsoft Visual Studio 2013
* Authors:		Gianpiero Beraldin #040-732-150
*				Taylor Havart-Labrecque #040-764-885
* Course:		CST 8152 - Compilers, Lab Section: 10
* Assignment:	2
* Due Date		8 March 2017
* Date Sub.:	22 March 2017
* Professor:	Sv. Ranev
* Purpose:
*
* Function List:
*				int scanner_init()
*				Token malar_next_token()
*				int get_next_state()
*				int char_class()
*				Token aa_func02()
*				Token aa_func03()
*				Token aa_func08()
*				Token aa_func05()
*				Token aa_func011()
*				Token aa_func012()
*				long atool()
*				int iskeyword()
*/

/* The #define _CRT_SECURE_NO_WARNINGS should be used in MS Visual Studio projects
* to suppress the warnings about using "unsafe" functions like fopen()
* and standard sting library functions defined in string.h.
* The define does not have any effect in Borland compiler projects.
*/
#define _CRT_SECURE_NO_WARNINGS

#include <stdio.h>   /* standard input / output */
#include <ctype.h>   /* conversion functions */
#include <stdlib.h>  /* standard library functions and constants */
#include <string.h>  /* string functions */
#include <limits.h>  /* integer types constants */
#include <float.h>   /* floating-point types constants */

/*#define NDEBUG        to suppress assert() call */
#include <assert.h>  /* assert() prototype */

/* project header files */
/*Ignores warnings from incorrect comments in sal.h*/
#pragma warning(push)
#pragma warning(disable : 4001)
#include "buffer.h"
#include "token.h"
#include "table.h"
#include "stable.h"
#pragma warning(pop)


#define DEBUG  /* for conditional processing */
#undef  DEBUG

/* Global objects - variables */
/* This buffer is used as a repository for string literals.
It is defined in platy_st.c */
extern Buffer * str_LTBL; /*String literal table */
int line; /* current line number of the source code */
extern int scerrnum;     /* defined in platy_st.c - run-time error number */
/* Local(file) global objects - variables */
static Buffer *lex_buf;/*pointer to temporary lexeme buffer*/
STD sym_table;

/* No other global variable declarations/definitiond are allowed */

/* scanner.c static(local) function  prototypes */
static int char_class(char c); /* character class function */
static int get_next_state(int, char, int *); /* state machine function */
static long atool(char * lexeme); /* converts octal string to decimal value */
static int iskeyword(char * kw_lexeme); /*keywords lookup functuion */


int scanner_init(Buffer * sc_buf) {
	if (b_isempty(sc_buf)) return EXIT_FAILURE;/*1*/
	/* in case the buffer has been read previously  */
	b_setmark(sc_buf, 0);
	b_retract_to_mark(sc_buf);
	b_reset(str_LTBL);
	line = 1;
	return EXIT_SUCCESS;/*0*/
	/*   scerrnum = 0;  *//*no need - global ANSI C */
}

/*
* Purpose:			the symbols defined will produce a token that will be later used.
when scanning the .AND. and .OR. the scanner will set a mark to
the biginning of the symbol, if it does not match it will retract to mark
and continue. Afterwards starts the state table and points transition in the
right direction
* Author:			Gianpiero Beraldin #040-732-150
*					Taylor Havart-Labrecque #
* Version:			1.0 / March 20 2017
* Called Functions:
* Parameters:		Buffer * sc_buf: pointer to Buffer
* Return Value:		Valid tokens
* Algorithm:		N/A
*/
Token malar_next_token(Buffer * sc_buf)
{
	Token t; /* token to return after recognition */
	unsigned char c; /* input symbol */
	int state = 0; /* initial state of the FSM */
	short lexstart;  /*start offset of a lexeme in the input buffer */
	short lexend;    /*end   offset of a lexeme in the input buffer */
	int accept = NOAS; /* type of state - initially not accepting */
	/*
	lexstart is the offset from the beginning of the char buffer of the
	input buffer (sc_buf) to the first character of the current lexeme,
	which is being processed by the scanner.
	lexend is the offset from the beginning of the char buffer of the
	input buffer (sc_buf) to the last character of the current lexeme,
	which is being processed by the scanner.
	*/


	//DECLARE YOUR VARIABLES HERE IF NEEDED
	char temp = ' ';
	int i = 0;
	short str_len = 0;
	short temp_offset = 0;

	while(1){ /* endless loop broken by token returns it will generate a warning */

		c = b_getc(sc_buf); //GET THE NEXT SYMBOL FROM THE INPUT BUFFER

		switch (c){
		case ALT_EOF: /*Alternate End of File*/
			t.code = SEOF_T;
			return t;
		case SEOF: //source end of file
			t.code = SEOF_T;
			return t;
		case ' ': //blank space
			continue;
		case '{': //left brace
			t.code = LBR_T;
			return t;
		case '}': //right brace
			t.code = RBR_T;
			return t;
		case '/': //division
			t.code = ART_OP_T;
			t.attribute.arr_op = DIV;
			return t;
		case '*': //multiplication
			t.code = ART_OP_T;
			t.attribute.arr_op = MULT;
			return t;
		case '+': //addition
			t.code = ART_OP_T;
			t.attribute.arr_op = PLUS;
			return t;
		case '-': //minus
			t.code = ART_OP_T;
			t.attribute.arr_op = MINUS;
			return t;
		case '(': //left bracket
			t.code = LPR_T;
			return t;
		case ')': //right bracket
			t.code = RPR_T;
			return t;
		case ',': //comma
			t.code = COM_T;
			return t;
		case ';': //semi colon
			t.code = EOS_T;
			return t;
		case '\n': //new line
			++line;
			continue;
		case '\t':
			continue;
		case '=':// assignment operation
			if (b_getc(sc_buf) == '='){ //checks if its relation equals 
				t.code = REL_OP_T;
				t.attribute.rel_op = EQ;
				return t;
			}
			b_retract(sc_buf);
			t.code = ASS_OP_T; //if not then its assignment
			return t;
		case '<': /*less than*/
			c = b_getc(sc_buf);
			if (c == '<') {
				t.code = SCC_OP_T;
				return t;
			}
			else if (c == '>') {
				t.code = REL_OP_T;
				t.attribute.rel_op = NE;
				return t;
			}
			t.code = REL_OP_T;
			t.attribute.rel_op = LT;
			b_retract(sc_buf);
			return t;
		case '>': //gratter than
			t.code = REL_OP_T;
			t.attribute.rel_op = GT;
			return t;
		case '.'://dot
			//set a mark to come back if .AND. isnt found
			b_setmark(sc_buf, b_getcoffset(sc_buf));
			if (b_getc(sc_buf) == 'A'){ //checks for A		
				if (b_getc(sc_buf) == 'N'){ //checks for N			
					if (b_getc(sc_buf) == 'D'){ //checks for D			
						if (b_getc(sc_buf) == '.'){ //checks for dot
							t.code = LOG_OP_T;
							t.attribute.log_op = AND; //returns and is all cases match
							return t;
						}
					}
				}
			}
			else
				b_retract_to_mark(sc_buf);
			//after dot and no A, checks for .OR. case
			if (b_getc(sc_buf) == 'O'){ //checks for O
				if (b_getc(sc_buf) == 'R'){ //checks for R
					if (b_getc(sc_buf) == '.'){ //chcks for .
						t.code = LOG_OP_T;
						t.attribute.log_op = OR; //returns or token
						return t;
					}
				}
			}
			t.code = ERR_T; // no match returns error token
			b_retract_to_mark(sc_buf);
			t.attribute.err_lex[0] = c;
			t.attribute.err_lex[1] = '\0';
			return t;
		case '!':
			temp = b_getc(sc_buf);

			/* make sure the next symbol matches for comments*/
			if (temp == '<') {
				/*Wait for line terminator*/
				temp = b_getc(sc_buf);
				while (temp != '\n' && temp != '\r') {
					/*If there is no line terminator*/
					if ((temp == SEOF) || (temp == ALT_EOF)) {
						t.code = ERR_T;
						t.attribute.err_lex[0] = '!';
						t.attribute.err_lex[1] = '<';
						t.attribute.err_lex[2] = SEOF;
						b_retract(sc_buf);
						return t;
					}
					/* Keep checking for line terminator */
					temp = b_getc(sc_buf);
				}
				/*increment lines*/
				++line;
				continue;
			}
			/*Process illegal comment token*/
			t.code = ERR_T;
			t.attribute.err_lex[0] = c;
			t.attribute.err_lex[1] = temp;
			t.attribute.err_lex[2] = SEOF;
			/* Skip all symbols until line terminator or SEOF */
			temp = b_getc(sc_buf);
			while (temp != '\n') {
				if ((temp == '\0') || (temp == ALT_EOF)) {
					b_retract(sc_buf);
					return t;
				}
				/* Keep checking for line terminator */
				temp = b_getc(sc_buf);
			}
			/* Process line terminator and return error token */
			line++;
			return t;

		case '"':
			/* Set mark to beginning of string */
			b_setmark(sc_buf, b_getcoffset(sc_buf) - 1);
			/* Check for legal string  */
			temp = b_getc(sc_buf);
			while (temp != '"') {
				/* If string literal crosses to new line, count it*/
				if (temp == '\n' || temp == '\r'){
					line++;
					temp = b_getc(sc_buf);
					if (temp != '\n'){
						b_retract(sc_buf);
					}
				}

				/* If SEOF found before closing ", illegal string */
				if ((temp == SEOF) || (temp == ALT_EOF)) {
					t.code = ERR_T;
					lexend = b_getcoffset(sc_buf);
					str_len = lexend - b_mark(sc_buf);
					b_retract_to_mark(sc_buf);

					/* Add string to error token attribute */
					for (i = 0; i < str_len && i < ERR_LEN; i++) {
						t.attribute.err_lex[i] = b_getc(sc_buf);
					}
					//t.attribute.err_lex[i] = '\0';

					/*If the string is too long cut and append 3 dots*/
					if (str_len > ERR_LEN) {
						t.attribute.err_lex[i - 1] = '.';
						t.attribute.err_lex[i - 2] = '.';
						t.attribute.err_lex[i - 3] = '.';
						t.attribute.err_lex[i] = '\0';
						b_setmark(sc_buf, lexend);
						b_retract_to_mark(sc_buf);
					}
					return t;
				}
				temp = b_getc(sc_buf);
			}
			/* Calculate length of string literal */
			str_len = (b_getcoffset(sc_buf)) - b_mark(sc_buf);
			b_retract_to_mark(sc_buf);

			/* Mark offset in string literal table for token attribute */
			temp_offset = b_size(str_LTBL);

			/* Add string to string literal table, excluding "" */
			for (i = 0; i < str_len; i++) {
				temp = b_getc(sc_buf);
				if (temp != '"')
					b_addc(str_LTBL, temp);
			}
			b_addc(str_LTBL, SEOF);

			/* Return string literal token */
			t.code = STR_T;
			t.attribute.str_offset = temp_offset;
			return t;
		}
		/*if value is a legal string character*/
		if (isalpha(c) || isdigit(c)) {
			state = get_next_state(state, c, &accept);
			lexstart = b_getcoffset(sc_buf) - 1;
			b_setmark(sc_buf, lexstart);
			//printf("lexstart: %d\n", lexstart);
			//state = 0;

			/*No Accepting State*/
			while (accept == NOAS) {
				c = b_getc(sc_buf);
				state = get_next_state(state, c, &accept);
			}
			//printf("state: |%d| |%c||%d| %d\n", state, c, c, accept);
			/* Accepting state With Retract */
			if (accept == ASWR){
				b_retract(sc_buf);
			}

			/* Get beginning and end of the lexeme */
			lexend = b_getcoffset(sc_buf) - 1;
			str_len = lexend - lexstart;
			//printf("lexend: %d\n", lexend);
			/* Create temporary lexeme buffer and store lexeme */
			lex_buf = b_create(100, 0, 'f'); //changed from 100, is this right? 
			b_retract_to_mark(sc_buf);

			for (;;){
				if (lexstart > lexend){
					break;
				}
				c = b_getc(sc_buf);
				b_addc(lex_buf, c);
				++lexstart;
			}

			/* Call accepting function, pass pointer to start of lex_buf */
			b_addc(lex_buf, SEOF);
			t = aa_table[state](b_setmark(lex_buf, 0));
			b_free(lex_buf);
			return t;
		}

		else {
			t.code = ERR_T;
			t.attribute.err_lex[0] = c;
			t.attribute.err_lex[1] = SEOF;
			return t;
		}
	}
}
/*
* Purpose:			gets next state of machine
* Author:			Provided by Svillen Ranev
* Version:			1.0 / January 31 2017
* Called Functions:
* Parameters:
* Return Value:
* Algorithm:		N/A
*/
int get_next_state(int state, char c, int *accept)
{
	int col;
	int next;
	col = char_class(c);
	next = st_table[state][col];

#ifdef DEBUG
	printf("Input symbol: %c Row: %d Column: %d Next: %d \n", c, state, col, next);
#endif

	assert(next != IS);

#ifdef DEBUG
	if (next == IS){
		printf("Scanner Error: Illegal state:\n");
		printf("Input symbol: %c Row: %d Column: %d\n", c, state, col);
		exit(1);
	}
#endif
	*accept = as_table[next];
	return next;
}


/*
* Purpose:			returns column number in transition table for current char
* Author:			Gianpiero Beraldin
* Version:			1.0
* Called Functions:	isalpha
* Parameters:		char c: currrent char
* Return Value:		column number
* Algorithm:		N/A
*/
int char_class(char c)
{
	int val;

	if (isalpha(c)) //checks if c is a letter
		val = 0;
	else if (c == '0') //checks if c is 0
		val = 1;
	else if ((c >= '1') && (c <= '7')) // checks if c is a NzO/NzD
		val = 2;
	else if ((c == '8') || (c == '9')) // checks if c is a NzD
		val = 3;
	else if (c == '.') // checks if c is a point
		val = 4;
	else if (c == '#') // checks if c is a cross-hatch
		val = 5;
	else val = 6; // sets c to 6 if it is other

	return val; // returns the column number 
}
/*****************************************************************************/
/* ERROR - Will output unnecessary characters like = if transition table does not -1*/
/*****************************************************************************/

/*
* Purpose:			AVID
* Author:			Taylor Havart-Labrecque
* Version:			1.0
* Called Functions:
* Parameters:		char lexeme[]
* Return Value:
* Algorithm:		N/A
*/
Token aa_func02(char lexeme[]){
	/*printf("Into AVID...\n");*/
	//printf("| %s |", lexeme);
	char data_type;
	Token t;
	int vid_offset = 0;
	//printf("|%s|", lexeme);
	if ((t.attribute.kwt_idx = iskeyword(lexeme)) >= 0){
		t.code = KW_T;
		return t;
	}
	/*Set AVID Token*/
	t.code = AVID_T;
	/*Check if integer type - as defined in the informal language*/
	if (lexeme[0] == 'i' || lexeme[0] == 'o' || lexeme[0] == 'd' || lexeme[0] == 'n'){
		data_type = 'I';
	} else {
		data_type = 'F';
	}

	if (strlen(lexeme) > VID_LEN){
		lexeme[VID_LEN] = '\0';
	}
	
	vid_offset = st_install(sym_table, lexeme, data_type, line);
	
	/*If st_install throws an error*/
	if (vid_offset == -1){
		printf("\nError: Install failed - Symbol Table is full.\n");
		st_store(sym_table);
		b_free(lex_buf);
		exit(0);
	}

	t.attribute.vid_offset = vid_offset;
	return t;
}
/*
* Purpose:			SVID
* Author:			Taylor Havart-Labrecque
* Version:			1.255
* Called Functions:
* Parameters:		char lexeme[]
* Return Value:
* Algorithm:		N/A
*/
Token aa_func03(char lexeme[]){

	//	printf("|%s|", lexeme);

	Token t;
	int vid_offset;
	/*Set SVID Token*/
	t.code = SVID_T;

	if (strlen(lexeme) > VID_LEN){
		lexeme[VID_LEN - 1] = '#';
		lexeme[VID_LEN] = '\0';
		vid_offset = st_install(sym_table, lexeme, 'S', line);
	} else {
		vid_offset = st_install(sym_table, lexeme, 'S', line);
	}
	if (vid_offset == -1){
		printf("\nError: Install failed - Symbol Table is full.\n");
		st_store(sym_table);
		b_free(lex_buf);
		exit(0);
	}
	t.attribute.vid_offset = vid_offset;
	return t;
}
/*
* Purpose:			Converts lexeme to floating point value
* Author:			Gianpiero Beraldin
* Version:			1.0
* Called Functions:	atof, strlen, strncpy
* Parameters:		char lexeme []: lexeme array of chars
* Return Value:		a floating point literal or error token
* Algorithm:		N/A
*/
Token aa_func08(char lexeme[]){

	Token t;
	double fpl = 0.0;
	fpl = atof(lexeme);
	/*checks range of float*/
	if (fpl != 0.0 && (fpl < FLT_MIN || fpl > FLT_MAX)){
		t.code = ERR_T;
		/*if the error length is langer than 20 chars, calls Token aa_func12()*/
		if (strlen(lexeme) > ERR_LEN){
			t = aa_table[ES](lexeme);
		}
		else {
			strcpy(t.attribute.err_lex, lexeme); /*less than 20, copy everything*/
			t.attribute.err_lex[ERR_LEN] = '\0';
		}
	}
	else {
		t.code = FPL_T;
		t.attribute.flt_value = (float)fpl;
	}
	return t;
}


/*
* Purpose:			Converts lexeme to decimal integer literal
* Author:			Gianpiero Beraldin
* Version:			1.0
* Called Functions:	atol, strlen, strncpy
* Parameters:		char lexeme []: lexeme array of chars
* Return Value:		a decimal integer literal or error token
* Algorithm:		N/A
*/
Token aa_func05(char lexeme[]){
	Token t;
	long dil = 0;
	dil = atol(lexeme);
	/*checks range of integer*/
	if (dil >= 0 && dil <= SO_MAX && strlen(lexeme) <= INL_LEN){
		t.code = INL_T;
		t.attribute.int_value = (long)dil;
	}
	else {
		t.code = ERR_T;
		/*if the error length is langer than 20 chars, calls Token aa_func12()*/
		if (strlen(lexeme) > ERR_LEN){
			t = aa_table[ES](lexeme);
		}
		else{
			strcpy(t.attribute.err_lex, lexeme); /*less than 20, copy everything*/
			t.attribute.err_lex[ERR_LEN] = '\0';
		}
	}
	return t;
}
/*
* Purpose:			Converts lexeme to octal integer literal
* Author:			Taylor Havart-Labrecque
* Version:			1.0
* Called Functions:	atool, strlen, strncpy
* Parameters:		char lexeme []: lexeme array of chars
* Return Value:		a floating point literal or error token
* Algorithm:		N/A
*/
Token aa_func11(char lexeme[]){

	Token t;
	long oil = atool(lexeme);/*converts to octal intenger literal*/
	if (strlen(lexeme) > INL_LEN + 1 || oil < 0 || oil > SO_MAX){
		t.code = ERR_T;
		/*if the error length is langer than 20 chars, calls Token aa_func12()*/
		if (strlen(lexeme) > ERR_LEN){
			t = aa_table[ES](lexeme);
		}
		else{
			strcpy(t.attribute.err_lex, lexeme); /*less than 20, copy everything*/
			t.attribute.err_lex[ERR_LEN] = '\0';
			return t;
		}
	}
	else{
		t.code = INL_T;
		t.attribute.int_value = (int)oil;
		return t;
	}
	return t;
}
/*
* Purpose:			Error function
* Author:			Taylor Havart-Labrecque
* Version:			1.0
* Called Functions:	strlen(): to check error length
* Parameters:		char lexeme[]
* Return Value:		error token with complete error message
or error message with 3 dots ...
* Algorithm:		N/A
*/
Token aa_func12(char lexeme[]){
	Token t;
	unsigned int i, j = ERR_LEN - 1;
	t.code = ERR_T;
	/*If the error lexeme is longer than ERR_LEN characters, only the first ERR_LEN-3 characters
	are stored in err_lex*/
	if (strlen(lexeme) > ERR_LEN){
		for (i = 0; i < ERR_LEN; i++){
			t.attribute.err_lex[i] = lexeme[i];
		}
		t.attribute.err_lex[j--] = '.';
		t.attribute.err_lex[j--] = '.';
		t.attribute.err_lex[j--] = '.';
	}
	else {
		for (i = 0; (i < strlen(lexeme)) && (i < ERR_LEN); i++){
			t.attribute.err_lex[i] = lexeme[i];
		}
	}
	t.attribute.err_lex[i] = '\0';
	return t;
}


/*
* Purpose:			Converts string from octal to long int
* Author:			Gianpiero Beraldin
* Version:			1.0
* Called Functions:	strtol: string to long
* Parameters:		Char * lexeme: lexeme to convert
* Return Value:		long int value of string
* Algorithm:		N/A
*/
long atool(char * lexeme){
	//takes the lexeme string in base 8 and converts to long int
	return strtol(lexeme, NULL, 8);
}


/*
* Purpose:			checks if lexeme is a valid keyword
* Author:			Taylor Havart-Labrecque
* Version:			1.0
* Called Functions:	strcmp: string compare
* Parameters:		char * kw_lexeme: check validity of lexeme
* Return Value:		index of keyword in table if correct,
-1 if not a correct keyword
* Algorithm:		N/A
*/
int iskeyword(char * kw_lexeme){
	unsigned int i;

	for (i = 0; i < KWT_SIZE; i++){
		if (!strcmp(kw_lexeme, kw_table[i])){
			return i;
		}
	}
	return -1;
}

