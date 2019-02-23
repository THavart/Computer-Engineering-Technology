/***************************************************************************************************/
/*Include Statements*/
/***************************************************************************************************/
#include "parser.h"
/***************************************************************************************************/
/*Main Code*/
/***************************************************************************************************/
void parser(Buffer * in_buf){
	sc_buf = in_buf;
	lookahead = malar_next_token(sc_buf);
	program(); 
	match(SEOF_T, NO_ATTR);
	gen_incode("PLATY: Source file parsed");
}
void match(int pr_token_code, int pr_token_attribute){
	//printf("Token Code: %d Attribute: %d\n", pr_token_code, pr_token_attribute);
	//printf("Lookahead Code: %d\n", lookahead.code);
	/*If the match is unsuccessful, calls EH and returns*/
		if (pr_token_code != lookahead.code){
			syn_eh(pr_token_code);
			return;
		}
		if (lookahead.code == KW_T || lookahead.code == LOG_OP_T || lookahead.code == ART_OP_T || lookahead.code == REL_OP_T){
			if (lookahead.attribute.kwt_idx != pr_token_attribute){
				syn_eh(pr_token_code);
				return;
			}
		}
		if (lookahead.code == SEOF_T){
			return;
		}
		else {
			lookahead = malar_next_token(sc_buf);
			//printf("What is the code now?: %d\n", lookahead.code);
			if (lookahead.code == ERR_T){
				syn_printe();
				lookahead = malar_next_token(sc_buf);
				++synerrno;
				return;
			}
		}
	}
void syn_eh(int sync_token_code){
	/*Calls syn_printe() and increments the error counter*/
	syn_printe();
	++synerrno;
	/*Panic Mode Recovery*/
	while (lookahead.code != SEOF_T){
		/*Increments lookahead token*/
		lookahead = malar_next_token(sc_buf);
		/*If match is found*/
		if (lookahead.code == sync_token_code){
			/*and the token is not the end of the file*/
			if (lookahead.code != SEOF_T)
				/*Increment and return*/
				lookahead = malar_next_token(sc_buf);
			return;
		}
	}
	if (sync_token_code != SEOF_T){
		exit(synerrno);
	}
	return;
}
/* Parser error printing function, Assignmet 4, W17 */
void syn_printe(){

	Token t = lookahead;
	printf("PLATY: Syntax error:  Line:%3d\n", line);
	printf("*****  Token code:%3d Attribute: ", t.code);
	switch (t.code){
	case  ERR_T: /* ERR_T     0   Error token */
		printf("%s\n", t.attribute.err_lex);
		break;
	case  SEOF_T: /*SEOF_T    1   Source end-of-file token */
		printf("NA\n");
		break;
	case  AVID_T: /* AVID_T    2   Arithmetic Variable identifier token */
	case  SVID_T:/* SVID_T    3  String Variable identifier token */
		printf("%s\n", sym_table.pstvr[t.attribute.get_int].plex);
		break;
	case  FPL_T: /* FPL_T     4  Floating point literal token */
		printf("%5.1f\n", t.attribute.flt_value);
		break;
	case INL_T: /* INL_T      5   Integer literal token */
		printf("%d\n", t.attribute.get_int);
		break;
	case STR_T:/* STR_T     6   String literal token */
		printf("%s\n", b_setmark(str_LTBL, t.attribute.str_offset));
		break;
	case SCC_OP_T: /* 7   String concatenation operator token */
		printf("NA\n");
		break;
	case  ASS_OP_T:/* ASS_OP_T  8   Assignment operator token */
		printf("NA\n");
		break;
	case  ART_OP_T:/* ART_OP_T  9   Arithmetic operator token */
		printf("%d\n", t.attribute.get_int);
		break;
	case  REL_OP_T: /*REL_OP_T  10   Relational operator token */
		printf("%d\n", t.attribute.get_int);
		break;
	case  LOG_OP_T:/*LOG_OP_T 11  Logical operator token */
		printf("%d\n", t.attribute.get_int);
		break;
	case  LPR_T: /*LPR_T    12  Left parenthesis token */
		printf("NA\n");
		break;
	case  RPR_T: /*RPR_T    13  Right parenthesis token */
		printf("NA\n");
		break;
	case LBR_T: /*    14   Left brace token */
		printf("NA\n");
		break;
	case RBR_T: /*    15  Right brace token */
		printf("NA\n");
		break;
	case KW_T: /*     16   Keyword token */
		printf("%s\n", kw_table[t.attribute.get_int]);
		break;
	case COM_T: /* 17   Comma token */
		printf("NA\n");
		break;
	case EOS_T: /*    18  End of statement *(semi - colon) */
		printf("NA\n");
		break;
	default:
		printf("PLATY: Scanner error: invalid token code: %d\n", t.code);
	} /*end switch*/
}/* end syn_printe()*/

void gen_incode(char* printString){
	printf("%s\n", printString);
}

/*Given to us in the specifications*/
void program(void){
	match(KW_T, PLATYPUS);
	match(LBR_T, NO_ATTR);
	opt_statements();
	match(RBR_T, NO_ATTR); /*This statement messes up the rest of the code*/
	gen_incode("PLATY: Program parsed");
}
/******************** Productions Start ********************/
/*
* Production: Additive Arithmetic Expression
* FIRST set: { AVID_T, FPL_T, INL_T, ( }
*/
void additive_arithmetic_expression(void) {
	multiplicative_arithmetic_expression();
	additive_arithmetic_expression_p();
}

/*
* Production: Additive Arithmetic Expression (P)
* FIRST set: { +, -, e }
*/
void additive_arithmetic_expression_p(void) {
	switch (lookahead.code) {
	case ART_OP_T:
		switch (lookahead.attribute.arr_op) {
			/* The attribute must be MINUS or PLUS. */
		case MINUS:
		case PLUS:
			match(ART_OP_T, lookahead.attribute.arr_op);
			multiplicative_arithmetic_expression();
			additive_arithmetic_expression_p();
			gen_incode("PLATY: Additive arithmetic expression parsed");
			return;

		default:
			return;
		}
		return;

	default:
		return;
	}
}

/*
* Production: Arithmetic Expression
* FIRST set: { -, +, AVID_T, FPL_T, INL_T, ( }
*/
void arithmetic_expression(void) {
	switch (lookahead.code) {
	case ART_OP_T:
		/* The attribute must be MINUS or PLUS. */
		switch (lookahead.attribute.arr_op) {
		case MINUS:
		case PLUS:
			unary_arithmetic_expression();
			break;

		default:
			syn_printe();
			return;
		}
		break;

	case AVID_T:
	case FPL_T:
	case INL_T:
	case LPR_T:
		additive_arithmetic_expression();
		break;

		/* If nothing matches, print an error. */
	default:
		syn_printe();
		return;
	}

	gen_incode("PLATY: Arithmetic expression parsed");
}

/*
* Production: Assignment Expression
* FIRST set: { AVID, SVID }
*/
void assignment_expression(void) {
	switch (lookahead.code) {
	case AVID_T:
		match(AVID_T, NO_ATTR);
		match(ASS_OP_T, NO_ATTR);
		arithmetic_expression();
		gen_incode("PLATY: Assignment expression (arithmetic) parsed");
		return;

	case SVID_T:
		match(SVID_T, NO_ATTR);
		match(ASS_OP_T, NO_ATTR);
		string_expression();
		gen_incode("PLATY: Assignment expression (string) parsed");
		return;

		/* If the current token code is not AVID or SVID, print an error. */
	default:
		syn_printe();
		return;
	}

}

/*
* Production: Assignment Statement
* FIRST set: { AVID, SVID }
*/
void assignment_statement(void) {
	assignment_expression();
	match(EOS_T, NO_ATTR);
	gen_incode("PLATY: Assignment statement parsed");
}

/*
* Production: Conditional Expression
* FIRST set: { AVID_T, FPL_T, INL_T, SVID_T, STR_T }
*/
void conditional_expression(void) {
	logical_or_expression();
	gen_incode("PLATY: Conditional expression parsed");
}

/*
* Production: Input Statement
* FIRST set: { KW_T (only INPUT) }
*/
void input_statement(void) {
	match(KW_T, INPUT);
	match(LPR_T, NO_ATTR);
	variable_list();
	match(RPR_T, NO_ATTR);
	match(EOS_T, NO_ATTR);
	gen_incode("PLATY: INPUT statement parsed");
}

/*
* Production: Iteration Statement
* FIRST set: { KW_T (only USING) }
*/
void iteration_statement(void) {
	match(KW_T, USING);
	match(LPR_T, NO_ATTR);
	assignment_expression();
	match(COM_T, NO_ATTR);
	conditional_expression();
	match(COM_T, NO_ATTR);
	assignment_expression();
	match(RPR_T, NO_ATTR);
	match(KW_T, REPEAT);
	match(LBR_T, NO_ATTR);
	opt_statements();
	match(RBR_T, NO_ATTR);
	match(EOS_T, NO_ATTR);
	gen_incode("PLATY: USING statement parsed");
}

/*
* Production: Logical AND Expression
* FIRST set: { AVID_T, FPL_T, INL_T, SVID_T, STR_T }
*/
void logical_and_expression(void) {
	relational_expression();
	logical_and_expression_p();
}

/*
* Production: Logical AND Expression (P)
* FIRST set: { ., e }
*/
void logical_and_expression_p(void) {
	switch (lookahead.code) {
	case LOG_OP_T:
		/* The token attribute must be AND. */
		if (lookahead.attribute.log_op == AND) {
			match(LOG_OP_T, AND);
			relational_expression();
			logical_and_expression_p();
			gen_incode("PLATY: Logical AND expression parsed");
			return;
		}
		return;
	default:
		return;
	}
}

/*
* Production: Logical OR Expression
* FIRST set: { AVID_T, FPL_T, INL_T, SVID_T, STR_T }
*/
void logical_or_expression(void) {
	logical_and_expression();
	logical_or_expression_p();
}

/*
* Production: Logical OR Expression (P)
* FIRST set: { ., e }
*/
void logical_or_expression_p(void) {
	switch (lookahead.code) {
	case LOG_OP_T:
		/* The token attribute must be OR. */
		if (lookahead.attribute.log_op == OR) {
			match(LOG_OP_T, OR);
			logical_and_expression();
			logical_or_expression_p();
			gen_incode("PLATY: Logical OR expression parsed");
			return;
		}
		return;

	default:
		return;
	}
}

/*
* Production: Multiplicative Arithmetic Expression
* FIRST set: { AVID_T, FPL_T, INL_T, ( }
*/
void multiplicative_arithmetic_expression(void) {
	primary_arithmetic_expression();
	multiplicative_arithmetic_expression_p();
}

/*
* Production: Multiplicative Arithmetic Expression (P)
* FIRST set: { *, /, e }
*/
void multiplicative_arithmetic_expression_p(void) {
	switch (lookahead.code) {
	case ART_OP_T:
		/* The token attribute mut be DIV or MULT. */
		switch (lookahead.attribute.arr_op) {
		case DIV:
		case MULT:
			match(ART_OP_T, lookahead.attribute.arr_op);
			primary_arithmetic_expression();
			multiplicative_arithmetic_expression_p();
			gen_incode("PLATY: Multiplicative arithmetic expression parsed");
			return;

		default:
			return;
		}
		return;

	default:
		return;
	}
}

/*
* Production: Optional Statements
* FIRST set: { AVID_T, SVID_T, KW_T(IF, USING, INPUT, OUTPUT), e }
*/
void opt_statements(void) {
	switch (lookahead.code){
	case KW_T:
		switch (lookahead.attribute.kwt_idx)
		{
		case PLATYPUS:
		case ELSE:
		case THEN:
		case REPEAT:
			gen_incode("PLATY: Opt_statements parsed");
			return;
		default: /* IF, USING INPUT, OUTPUT */
			break;
		}
	case AVID_T:
	case SVID_T:
		statements();
		break;
	default: /* empty string */
		gen_incode("PLATY: Opt_statements parsed");
	}
}

/*
* Production: Optional Variable List
* FIRST set: { AVID_T, SVID_T, STR_T, e }
*/
void opt_variable_list(void) {
	switch (lookahead.code) {
	case AVID_T:
	case SVID_T:
		variable_list();
		return;
	case STR_T:
		match(STR_T, NO_ATTR);
		gen_incode("PLATY: Output list (string literal) parsed");
		return;
	default:
		gen_incode("PLATY: Output list (empty) parsed");
	}
}

/*
* Production: Output Statement
* FIRST set: { KW_T (only OUTPUT) }
*/
void output_statement(void) {
	match(KW_T, OUTPUT);
	match(LPR_T, NO_ATTR);
	opt_variable_list();
	match(RPR_T, NO_ATTR);
	match(EOS_T, NO_ATTR);
	gen_incode("PLATY: OUTPUT statement parsed");
}

/*
* Production: Primary Arithmetic Relational Expression
* FIRST set: { AVID_T, FPL_T, INL_T }
*/
void primary_a_relational_expression(void) {
	switch (lookahead.code) {
	case AVID_T:
	case FPL_T:
	case INL_T:
		match(lookahead.code, lookahead.attribute.rel_op);
		break;

		/* If the current token code is not AVID_T, FPL_T or INL_T, print an error. */
	default:
		syn_printe();
		break;
	}

	gen_incode("PLATY: Primary a_relational expression parsed");
}

/*
* Production: Primary Arithmetic Expression
* FIRST set: { AVID_T, FPL_T, INL_T, ( }
*/
void primary_arithmetic_expression(void) {
	switch (lookahead.code) {
	case AVID_T:
	case FPL_T:
	case INL_T:
		match(lookahead.code, lookahead.attribute.rel_op);
		break;

	case LPR_T:
		match(LPR_T, lookahead.attribute.arr_op);
		arithmetic_expression();
		match(RPR_T, NO_ATTR);
		break;

		/* If nothing matches, print an error. */
	default:
		syn_printe();
		break;
	}

	gen_incode("PLATY: Primary arithmetic expression parsed");
}

/*
* Production: Primary String Relational Expression
* FIRST set: { SVID_T, STR_T }
*/
void primary_s_relational_expression(void) {
	switch (lookahead.code) {
	case STR_T:
	case SVID_T:
		primary_string_expression();
		break;

		/* If the current token code is not STR_T or SVID_T, print an error. */
	default:
		syn_printe();
		break;
	}

	gen_incode("PLATY: Primary s_relational expression parsed");
}

/*
* Production: Primary String Expression
* FIRST set: { SVID_T, STR_T }
*/
void primary_string_expression(void) {
	switch (lookahead.code) {
	case STR_T:
	case SVID_T:
		match(lookahead.code, NO_ATTR);
		break;

		/* If the current token code is not STR_T or SVID_T, print an error. */
	default:
		syn_printe();
		break;
	}

	gen_incode("PLATY: Primary string expression parsed");
}
/*
* Production: Relational Expression
* FIRST set: { AVID_T, FPL_T, INL_T, SVID_T, STR_T }
*/
void relational_expression(void) {
	switch (lookahead.code) {
	case AVID_T:
	case FPL_T:
	case INL_T:
		primary_a_relational_expression();
		/* If the current code is not REL_OP_T (relational operator), print an error and return. */
		if (lookahead.code != REL_OP_T) {
			syn_printe();
			return;
		}

		match(lookahead.code, lookahead.attribute.arr_op);
		primary_a_relational_expression();
		break;
	case STR_T:
	case SVID_T:
		primary_s_relational_expression();
		/* If the current code is not REL_OP_T (relational operator), print an error and return. */
		if (lookahead.code != REL_OP_T) {
			syn_printe();
			return;
		}

		match(lookahead.code, lookahead.attribute.arr_op);
		primary_s_relational_expression();
		break;
		/* If nothing matches, print an error. */
	default:
		syn_printe();
		break;
	}
	gen_incode("PLATY: Relational expression parsed");
}

/*
* Production: Selection Statement
* FIRST set: { KW_T (only IF) }
*/
void selection_statement(void) {
	match(KW_T, IF);
	match(LPR_T, NO_ATTR);
	conditional_expression();
	match(RPR_T, NO_ATTR);
	match(KW_T, THEN);
	opt_statements();
	match(KW_T, ELSE);
	match(LBR_T, NO_ATTR);
	opt_statements();
	match(RBR_T, NO_ATTR);
	match(EOS_T, NO_ATTR);
	gen_incode("PLATY: IF statement parsed");
}

/*
* Production: Statement
* FIRST set: { AVID_T, SVID_T, KW_T (IF, USING, INPUT, OUTPUT) }
*/
void statement(void) {
	switch (lookahead.code) {
	case AVID_T:
	case SVID_T:
		assignment_statement();
		return;

	case KW_T:
		/* The token attribute must be IF, Input, OUTPUT or USING */
		switch (lookahead.attribute.kwt_idx) {
		case IF:
			selection_statement();
			return;

		case INPUT:
			input_statement();
			return;

		case OUTPUT:
			output_statement();
			return;

		case USING:
			iteration_statement();
			return;

			/* If the keyword token does not match the above, print an error and return. */
		default:
			syn_printe();
			return;
		}

		/* If nothing matches, print an error. */
	default:
		syn_printe();
		return;
	}
}

/*
* Production: Statements
* FIRST set: { AVID_T, SVID_T, KW_T (only IF, USING, INPUT, OUTPUT) }
*/
void statements(void) {
	statement();
	statements_p();
}

/*
* Production: Statements (P)
* { AVID_T, SVID_T, KW_T (IF, USING, INPUT, OUTPUT), e }
*/
void statements_p(void) {
	switch (lookahead.code) {
	case KW_T:
		/*
		* The token attribute must be ELSE, PLATYPUS, REPEAT or THEN. If the
		* keyword token attribute doesn't match any of the previous, return.
		*/
		switch (lookahead.attribute.kwt_idx) {
		case ELSE:
		case PLATYPUS:
		case REPEAT:
		case THEN:
			return;
		default:
			break;
		}

	case AVID_T:
	case SVID_T:
		statement();
		statements_p();
		return;
	}
}

/*
* Production: String Expression
* FIRST set: { SVID_T, STR_T }
*/
void string_expression(void) {
	primary_string_expression();
	string_expression_p();
	gen_incode("PLATY: String expression parsed");
}

/*
* Production: String Expression (P)
* FIRST set: { <<, e }
*/
void string_expression_p(void) {
	/* If the current token code is not SCC_OP_T (string concatination operator), return. */
	if (lookahead.code != SCC_OP_T)
		return;

	match(SCC_OP_T, NO_ATTR);
	primary_string_expression();
	string_expression_p();
}

/*
* Production: Unary Arithmetic Expression
* FIRST set: { -, + }
*/
void unary_arithmetic_expression(void) {
	switch (lookahead.code) {
	case ART_OP_T: /* Arithmetic operator token */
		/* The current token attribute must be MINUS or PLUS. */
		switch (lookahead.attribute.arr_op) {
		case MINUS:
		case PLUS:
			match(lookahead.code, lookahead.attribute.arr_op);
			primary_arithmetic_expression();
			gen_incode("PLATY: Unary arithmetic expression parsed");
			return;

			/* If the token attribute is not MINUS or PLUS, print an error. */
		default:
			syn_printe();
			return;
		}

		/* If the token code is not ART_OP_T, print an error. */
	default:
		syn_printe();
		return;
	}
}

/*
* Production: Variable Identifier
* FIRST set: { AVID_T, SVID_T }
*/
void variable_identifier(void) {
	switch (lookahead.code) {
	case AVID_T: /* Arithmetic variable identifier token */
	case SVID_T: /* String variable identifier token */
		match(lookahead.code, NO_ATTR);
		return;

		/* If the token code is not AVID_T or SVID_T, print an error. */
	default:
		syn_printe();
		return;
	}
}

/*
* Production: Variable List
* FIRST set: { AVID_T, SVID_T }
*/
void variable_list(void) {
	variable_identifier();
	variable_list_p();
	gen_incode("PLATY: Variable list parsed");
}

/*
* Production: Variable List (P)
* FIRST set: { ,, e }
*/
void variable_list_p(void) {

	/* If the token code is not COM_T (comma token), return.b  */
	if (lookahead.code != COM_T)
		return;

	match(COM_T, NO_ATTR);
	variable_identifier();
	variable_list_p();
}

/******************** Productions End ********************/