/*************************************************/
/*Includes*/
/************************************************/
#include "stable.h"

STD sym_table;
/*
Creates a new (empty) symbol table. Declares a local variables of type STD. 
Allocates dynamic memory for an array of STVR with st_size number of elements. 
Creates an additive self-incrementing buffer using the buffer function initializes 
plsBD pointer. Initializes st_offset to 0. Returns STD structure. If Successful, 
sets STD st_size to st_size; else st_size = 0
*/
STD st_create(int st_size){
	/*Creates a new (empty) symbol table*/
	STD sym_table;
	sym_table.pstvr = NULL;
	sym_table.plsBD = NULL;
	sym_table.st_offset = 0;
	if (st_size <= 0){
		sym_table.st_size = 0;
		return sym_table;
	} else {
		/*Allocates dynamic memory for an array of STVR with st_size number of elements*/
		if ((sym_table.pstvr = (STVR*)malloc(st_size*sizeof(STVR))) == NULL){
			sym_table.st_size = 0;
			return sym_table;
		}
		/*Creates an additive self-incrementing buffer using the buffer function initializes plsBD pointer*/
		if ((sym_table.plsBD = b_create(100, '1', 'a')) == NULL){
			free(sym_table.pstvr);
			sym_table.pstvr = NULL;
			return sym_table;
		}
		/*Initializes st_offset to 0*/
		sym_table.st_size = st_size;
		return sym_table;
	}
}
/*Installs new entry (VID Record) in symbol table.
Call st_lookup() to search for lexeme(variable name) in table
If no lexeme, install new entry at st_offset, set plex and o_line, and status
field to default value. Sets datatype indicator to value of type variable in type. (I, F, S)
if string, update flag = 1. TO SET DATATYPE INDICATOR/UPDATE FLAG USE BITWISE OPERATIONS.
Set i_value = 0 for I and F, -1 for string. Returns current offset of entry from STVR. Before
returning increment st_offset of global sym_table by 1.

if the lexeme is in the symbol table, return offset. If the symbol table is full, return -1. 
Lexemes are entered in the symbol table as strings. 

WARNING: Function can create dangling pointers. Prevent this.
*/

int st_install(STD sym_table, char *lexeme, char type, int line){
	int offset = 0;
	unsigned int i = 0;
	/*If the table doesn't exist*/
	if (sym_table.st_size == 0){
		return R_FAIL1;
	}
		/*Check and see if lexeme is in the table*/
			offset = st_lookup(sym_table, lexeme);
			/*If not already there...*/
			if (offset == -1){
				offset = sym_table.st_offset;
				/*Check if the table is full*/
				if (sym_table.st_size == offset){
					return R_FAIL1;
				}
				/*Assign plex to mark*/
				sym_table.pstvr[offset].plex = b_setmark(sym_table.plsBD, b_size(sym_table.plsBD));
				/*Add the lexeme into the buffer*/
				for (i = 0; i < strlen(lexeme); i++){
					b_addc(sym_table.plsBD, lexeme[i]);
				}
				/*Append for C-type String*/
				b_addc(sym_table.plsBD, '\0');

				/*Use line parameter and set default status*/
				sym_table.pstvr[offset].o_line = line;
				sym_table.pstvr[offset].status_field = DEFAULT_VALUE;
				if (type == 'I'){
					sym_table.pstvr[offset].status_field |= CHECK_INT;
					sym_table.pstvr[offset].i_value.int_val = 0;
				}
				else if (type == 'F'){
					sym_table.pstvr[offset].status_field |= CHECK_FLOAT;
					sym_table.pstvr[offset].i_value.fpl_val = 0.0;
				}
				else if (type == 'S'){
					sym_table.pstvr[offset].status_field |= CHECK_STR;
					/*Set update flag for string*/
					sym_table.pstvr[offset].status_field |= SETCHK_LSB;
					sym_table.pstvr[offset].i_value.int_val = -1;
				}
				st_incoffset();
				/*printf("Offset Value = %d", offset);*/
				return offset;
			}
			else {
				return offset;
			}
	}
/*Searches for a lexeme(variable name) in the sym_table search is performed backwards
from last -> first if found, return offset of the entry from beginning of the array STVR.
else return -1*/
int st_lookup(STD sym_table, char *lexeme){
	int i; /*loop iterator*/
	if (sym_table.st_size == 0){
		return R_FAIL1;
	}
	/*Backwards loop from st_offset*/
	for (i = sym_table.st_offset - 1; i >= 0; i--){
		if (strcmp(sym_table.pstvr[i].plex, lexeme) == 0){
			/*return offset*/
			return i;
		}
	}
	return -1;
}
/*Changes data type indicator of the variable entry (STVR) specified by vid_offset.
Variable type is specified by argument v_type: f for float I for int. String cannot be changed.
Check update flag (LSB) of the status_field. If = 1, type has been already updated and return -1
Else function changes data type indictator of the status field, sets LSB of the status_field to 1
returns vid_offset. You MUST use bit-wise operations and masks to perform set operations on the
status field*/
int st_change_type(STD sym_table, int vid_offset, char v_type){
	if (sym_table.st_size == 0){
		return R_FAIL1;
	}
	/*If the type has been already updated return -1*/
	if ((sym_table.pstvr[vid_offset].status_field & SETCHK_LSB)){
		return R_FAIL1;
	}
	if (v_type == 'S'){
		return vid_offset;
	}
	/*Set type indicator based on v_type parameter*/
	if (v_type == 'F'){
		/*Status Field: 1111 1111 1111 1100 (int)*/
		/*Check Float:  0000 0000 0000 0110      */
		/*    XOR    :  1111 1111 1111 1010      */
		sym_table.pstvr[vid_offset].status_field ^= SWITCH;
	}
	else if (v_type == 'I'){
		/*Status Field: 1111 1111 1111 1010 (float)*/
		/*Check Float:  0000 0000 0000 0110        */
		/*    XOR    :  1111 1111 1111 1100        */
		sym_table.pstvr[vid_offset].status_field ^= SWITCH;
	}
	/*Sets the update flag*/
	sym_table.pstvr[vid_offset].status_field |= SETCHK_LSB;

	return vid_offset;
}
/*Uses parameter value to change i_value of the value specified by vid_offset.
Success = vid_offset, fail = -1 - NOT COMPLETE - NO FAIL YET*/
int st_change_value(STD sym_table, int vid_offset, Value value){
	/*If the table doesn't exist don't bother*/
	if (sym_table.st_size == 0){
		return R_FAIL1;
	}
	sym_table.pstvr[vid_offset].i_value = value;
	return vid_offset;
}
/*Returns the type of the variable specified by vid_offset. Returns F for float, I for Int,
S for String. fail = -1 MUST use bit-wise operations and masks to determine type.*/
char st_get_type(STD sym_table, int vid_offset){
	if (sym_table.st_size == 0){
		return R_FAIL1;
	}
	/*Check if String type*/
	if ((sym_table.pstvr[vid_offset].status_field & CHECK_STR) == CHECK_STR){
		return 'S';
	}
	/*Check if float type*/
	else if ((sym_table.pstvr[vid_offset].status_field & CHECK_FLOAT) == CHECK_FLOAT){
		return 'F';
	}
	/*Check if int type*/
	else if ((sym_table.pstvr[vid_offset].status_field & CHECK_INT) == CHECK_INT){
		return 'I';
	}
	else {
		return R_FAIL1;
	}
}
/*Function returns i_value of the variable specified by vid_offset. If the function is called
with invalid arguments, behavior is unpredictable.*/
Value st_get_value(STD sym_table, int vid_offset){
	return sym_table.pstvr[vid_offset].i_value;
}
/*Frees the memory occupied by the symbol table dynamic areas and sets st_size to 0*/
void st_destroy(STD sym_table){
	/*Checks to make sure what's being freed exists, then frees accordingly*/
	if (sym_table.plsBD){
		b_free(sym_table.plsBD);
	} 
	if (sym_table.pstvr){
		free(sym_table.pstvr);
	}
	st_setsize();
}
/*Prints the contents of the symbol table to the standard output(Screen) 
Returns the number of entry printed or -1 on failure*/
int st_print(STD sym_table)
{
	int i; /* loop counter */

	/* invalid symbol table */
	if (!sym_table.st_size){
		return R_FAIL1;
	}

	printf("\nSymbol Table\n____________\n");
	printf("\nLine Number Variable Identifier\n");

	for (i = 0; i < sym_table.st_offset; i++){
		printf("%2d          %s\n", sym_table.pstvr[i].o_line, sym_table.pstvr[i].plex);
	}
	/*Number of entries*/
	return i;
}

/*Internal function sets st_size to 0, You MUST use this function when you want st_size = 0*/
static void st_setsize(void){
	sym_table.st_size = 0;
}
/*Internal function increments st_offset by 1*/
static void st_incoffset(void){
	sym_table.st_offset++;
}
/*Stores the symbol tabel into a file named $stable.ste. Text file. If file exists, function overwrites it
Function uses fprintf to write. First writes st_size, then for each symbol table entry it writes the 
status_field (in hex), the length of lexeme, the lexeme, the line number, and the initial value. To store,
appropriate initial value, first use st_get_value() to get union variable, then use st_get_type() to get the variable
type and apply the appropriate formatting ont he appropriate member of the union value. The data items
in the file are separated with a space(see fileio.c example) On success print message "Symbol Table Stored", and number
of records stored; else -1 on failure.
*/
int st_store(STD sym_table){
	FILE *file = NULL;
	int i;

	/*file name*/
	char *fname = "$stable.ste";

	if ((file = fopen(fname, "wt")) == NULL) { /* 'fopen()' generates a warning: 'may be unsafe' */
		printf("Cannot create file: %s/n", fname);
		return R_FAIL1;
	}
	/*First st_size is stored in the file*/
	fprintf(file, "%d", sym_table.st_size);

	for (i = 0; i < sym_table.st_offset; ++i) {
		fprintf(file, " %hX", sym_table.pstvr[i].status_field); /* The status field in HEX */
		fprintf(file, " %lu", (unsigned long)strlen(sym_table.pstvr[i].plex)); /* The length of the lexeme */
		fprintf(file, " %s", sym_table.pstvr[i].plex); /* The lexeme itself */
		fprintf(file, " %d", sym_table.pstvr[i].o_line); /* The line number of the first occurance of the lexeme */

		/* Depending on the VID type, print the appropriate i_value. */
		printf("Type: %c\n", st_get_type(sym_table, i));
		switch (st_get_type(sym_table, i)) {
		case 'I':
			fprintf(file, " %d", sym_table.pstvr[i].i_value.int_val);
			break;
		case 'F':
			fprintf(file, " %.2f", sym_table.pstvr[i].i_value.fpl_val);
			break;
		case 'S':
			fprintf(file, " %d", sym_table.pstvr[i].i_value.str_offset);
		default:
			break;
		}
	}

	/*On success print message "Symbol Table Stored*/
	fclose(file);
	printf("\nSymbol Table stored.\n");
	/*Number of records stored*/
	return i;
}
/*Contains 1 statement, returns 0 BONUS NOT COMPLETED*/
int st_sort(STD sym_table, char s_order){
	sym_table;
	s_order;
	return 0;
}