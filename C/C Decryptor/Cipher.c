
#include <ctype.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
extern char *optarg;
extern int optind, opterr, optopt;
#include <getopt.h>


static const char *optString = "d:e:";
void decrypt(int key, FILE *fp, FILE *fw);
void decrypt2(int key, FILE *fp, FILE *fw);
void encrypt(int key, FILE *fp, FILE *fw);
void encrypt2(int key, FILE *fp, FILE *fw);

int main(int argc, char **argv)
{
    int key;
	FILE *fp;
	FILE *fw;
	int c;

	while((c = getopt (argc, argv, optString)) != -1)
		{
			if (argc >= 3)
			{
				switch (c) {

					case 'd' :
								fp = fopen (argv[3],"r");
								fw = fopen(argv[4], "w+");
								key = atoi(optarg);
								decrypt2(key, fp, fw);
								break;
					case 'e' :
								fp = fopen (argv[3],"r");
								fw = fopen(argv[4], "w+");
								key = atoi(optarg);
								encrypt2(key, fp, fw);
								break;
				
					case 'h' :
								printf("Help");							
								break;
					default: 	abort();
						    }

			}
			
		}
	return 0;
}

void encrypt2(int key, FILE *fp, FILE *fw) {
/*cyhpertext value or charactermystery01 - key = plaintextbyte value or plaintextbyte character*/

		int i = 0;
		int counterchar = 0;
		int j = 0;
		int counter = 0;

		  for(counter = 0; ((i = fgetc(fp)) !=EOF); counter++)
		 {			
		 			if(counter == key)
					{
						break;
					}
		 			fseek(fp,counter,SEEK_SET);
		 			i = fgetc(fp);
					/*Take the first character put in cipher file*/
					fputc(i,fw);

					for(j = 0; j < key; j++)
					{
						counterchar = fgetc(fp);
						if(j == key - 1 && counterchar!=EOF)
						{
							fputc(counterchar,fw);
							j = -1;
						    
						}
						if(counterchar == EOF)
						{
							
							rewind(fp);
							break;
						}

					}

			}
	       fclose(fp);
	       fclose(fw);       
}

void decrypt2(int key, FILE *fp, FILE *fw) {
/*cyhpertext value or charactermystery01 - key = plaintextbyte value or plaintextbyte character*/
	
	
		int i = 0;
		int counterchar = 0;
		int j = 0;
		int counter = 0;
		int counter2 = 0;
		int size;

		fseek(fp,0,SEEK_END);
		 
		size = ftell(fp);
		rewind(fp);

		  for(counter = 0; counter < size; counter++)
		 {			
		 			
		     		if(counter == ((key * key) -1))
					{
						break;
					}
		 			fseek(fp,counter,SEEK_SET);
		 			i = fgetc(fp);
					/*Take the first character put in cipher file*/
					fputc(i,fw);
					
					for(j = 0; j < ((key * key) -1); j++)
					{
						counter2++;
						counterchar = fgetc(fp);

						if(j == (((key * key) -1) -1) && counterchar!=EOF)
						{
							fputc(counterchar,fw);
							j = -1;
						    
						}
						if(counter2 == size)
						{
							
							rewind(fp);
							break;
						}

					}

			}
	       fclose(fp);
	       fclose(fw);       
}

