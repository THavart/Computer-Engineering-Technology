#ifndef STABLE_H_
#define STABLE_H_
/*********************************************************************************/
/*Includes*/
/*********************************************************************************/
#pragma warning(push)
#pragma warning(disable : 4001)
#include <stdio.h>  /* standard input/output */
#include <malloc.h> /* for dynamic memory allocation*/
#include <limits.h> /* implementation-defined data type ranges and limits */
#include "buffer.h" /* Buffer */
#pragma warning(pop)

/*********************************************************************************/
/*Define Statements*/
/*********************************************************************************/
#define DEFAULT_VALUE 0xFFF8 /*Keeps the remaining 3 bits 0 - 1111 1111 1111 1000*/
#define RESET		  0xFFF9 /*Mask for resetting the type  - 1111 1111 1111 1001*/
#define SETCHK_LSB    0x0001 /*Mask for Updating last bit   - 0000 0000 0000 0001*/

#define CHECK_FLOAT   0x0002 /*Mask for checking Float type - 0000 0000 0000 0010*/
#define CHECK_INT     0x0004 /*Mask for checking Int Type   - 0000 0000 0000 0100*/
#define CHECK_STR     0x0006 /*Mask for checking String Type- 0000 0000 0000 0110*/

#define SWITCH        0x0006 /*Mask for setting float type  - 0000 0000 0000 0110*/

#define STATUS_FLOAT  0xFFFA /*Mask for setting float type  - 1111 1111 1111 1010*/
#define STATUS_INT    0xFFFC /*Mask for setting int type    - 1111 1111 1111 1100*/
#define STATUS_STRING 0xFFFE /*Mask for setting string type - 1111 1111 1111 1110*/
/*********************************************************************************/
/*Structures*/
/*********************************************************************************/

/*Lexeme Storage*/
typedef union InitialValue {
	int int_val; /* integer variable initial value */
	float fpl_val; /* floating-point variable initial value */
	int str_offset; /* string variable initial value (offset) */
} Value;

/*Stores VID records. Each VID has one record(entry). The record
structure (contents) is described by the Symbol Table Variable
Record(STVR) structure declaration below. Dynamically allocated array
of VID*/
typedef struct SymbolTableVidRecord {
	unsigned short status_field; /* variable record status field*/
	char * plex; /* pointer to lexeme (VID name) in CA */
	int o_line; /* line of first occurrence */
	Value i_value; /* variable initial value */
	void * reserved; /*reserved for future use*/
}STVR;

/*Links the database elements and stores data about different
parameters of the database. Non-Dynamic Structure*/
typedef struct SymbolTableDescriptor {
	STVR *pstvr; /* pointer to array of STVR */
	int st_size; /* size in number of STVR elements */
	int st_offset; /*offset in number of STVR elements */
	Buffer *plsBD; /* pointer to the lexeme storage buffer descriptor */
} STD;

/*********************************************************************************/
/* Function Prototypes */
/*********************************************************************************/
STD st_create(int st_size);
int st_install(STD sym_table, char *lexeme, char type, int line);
int st_lookup(STD sym_table, char *lexeme);
int st_change_type(STD sym_table, int vid_offset, char v_type);
int st_change_value(STD sym_table, int vid_offset, Value value);
char st_get_type(STD sym_table, int vid_offset);
Value st_get_value(STD sym_table, int vid_offset);
void st_destroy(STD sym_table);
int st_print(STD sym_table);
static void st_setsize(void);
static void st_incoffset(void);
int st_store(STD sym_table);
int st_sort(STD sym_table, char s_order);

#endif
