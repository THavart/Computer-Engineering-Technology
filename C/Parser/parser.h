#ifndef PARSER_H_
#define PARSER_H_
/***************************************************************************************************/
/*Include Statements*/
/***************************************************************************************************/
#include <stdio.h>
#include <stdlib.h>
#include "buffer.h"
#include "token.h"
#include "stable.h"
/***************************************************************************************************/
/*Defines*/
/***************************************************************************************************/
#define NO_ATTR 0
#define _CRT_SECURE_NO_WARNINGS
/***************************************************************************************************/
/*Global Variables*/
/***************************************************************************************************/
Token lookahead;
Buffer* sc_buf;
int synerrno;
/***************************************************************************************************/
/*Implementation of kw_table*/
/***************************************************************************************************/
extern char * kw_table[];
enum
{
	ELSE,
	IF,
	INPUT,
	OUTPUT,
	PLATYPUS,
	REPEAT,
	THEN,
	USING
};
extern int line;          /* source code line number - defined in scanner.c */
extern STD sym_table;     /* Symbol Table Descriptor */
extern Buffer * str_LTBL; /* this buffer implements String Literal Table */

extern Token malar_next_token(Buffer *);

void parser(Buffer*);
void match(int, int);
void syn_eh(int);
void syn_printe(void);
void gen_incode(char*);

void additive_arithmetic_expression(void);
void additive_arithmetic_expression_p(void);
void arithmetic_expression(void);
void assignment_expression(void);
void assignment_statement(void);
void conditional_expression(void);
void input_statement(void);
void iteration_statement(void);
void logical_and_expression(void);
void logical_and_expression_p(void);
void logical_or_expression(void);
void logical_or_expression_p(void);
void multiplicative_arithmetic_expression(void);
void multiplicative_arithmetic_expression_p(void);
void opt_statements(void);
void opt_variable_list(void);
void output_statement(void);
void primary_a_relational_expression(void);
void primary_arithmetic_expression(void);
void primary_s_relational_expression(void);
void primary_string_expression(void);
void program(void);
void relational_expression(void);
void relational_expression_a_p(void);
void relational_expression_s_p(void);
void selection_statement(void);
void statement(void);
void statements(void);
void statements_p(void);
void string_expression(void);
void string_expression_p(void);
void unary_arithmetic_expression(void);
void variable_identifier(void);
void variable_list(void);
void variable_list_p(void);


#endif
