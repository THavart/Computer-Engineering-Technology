
#include <ctype.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
extern char *optarg;
extern int optind, opterr, optopt;
#include <getopt.h>


int charactercount(FILE *fp);
int wordcount(FILE *fp);
int newlinecount(FILE *fp);
void countall(FILE *fp);
static const char *optString = "cwhl''";
	int ccCounter = 0;
	int wcCounter = 0;
	int nlCounter = 0;

int main(int argc, char **argv)
{
	FILE *fp;
	int c;
	int i = 0;
	int index = 0;
	int cc =0;
	int wc =0;
	int nl =0;

	while((c = getopt (argc, argv, optString)) != -1)

	{
		if (argc >= 2)
		{
			switch (c) {

				case 'c' :

							fp = fopen (argv[0],"r");
							cc = charactercount(fp);
							printf("%d  ",cc);
						
			
		
							
							break;
				case 'w' :
							fp = fopen (argv[i],"r");
							wc = wordcount(fp);
							printf("%d  ",wc);
							
							
		
							
							break;
				case 'l' :
							fp = fopen (argv[i],"r");
							nl = newlinecount(fp);
							printf("%d  ",nl);
							
							break;
				case 'h' :
							printf("Help");							
							break;

				case '?' :
							if(optopt != 'c' && optopt != 'w' && optopt != 'l' && optopt != 'h')
							{

							 printf("Error option not compatible!");
							 return -1;
							}

							break;
				default: 	abort();
					    }


		}

		
	}
/* If no options were added */
	if(optind != (argc -1))
	{
		/*Print out all the info for each file*/
	  for (index = optind; index < argc;)
		{
			fp = fopen (argv[index],"r");
			countall(fp);
			printf("%s\n",argv[index]);

	        index++;
		}
		/*Print the added sum of counts*/
		printf("%d\t%d\t%d total\n ",ccCounter, wcCounter, nlCounter);
	}
/*If arguments were found just print the file name at the end*/
	else
	{
		printf("\t%s\n",argv[argc - 1]);
	}
	   /*fclose(fp);*/
	   return 0;
}

int charactercount(FILE *fp)
{
	 int charcount = 0;
	 char c;
       while(!feof(fp))
       {
       	c = fgetc(fp);

       		if(c == ' ')
       		{
       			charcount++;
       		}
       }    
       return charcount;
      
}
int wordcount(FILE *fp)
{
	 int wordcount = 0;
	 char c;

       while(!feof(fp))
       {
       	c = fgetc(fp);

       		if(c == ' ' || c == EOF || c== '\n')
       		{
       			wordcount++;
       		}

       }
       return wordcount;
       
}
int newlinecount(FILE *fp)
{
	 int newlines = 0;
	 char c;

       while(!feof(fp))
       {
       	c = fgetc(fp);

       		if(c == '\n')
       		{
       			newlines++;
       		}
       }
       return newlines;
	   
}
void countall(FILE *fp)
{
	int cc = 0;
	int wc = 1;
	int nl = 0;
	char c;
	 while(!feof(fp))
       {
       	c = fgetc(fp);
       	
       				
       	if(c ==' ')
       		{
       			wc++;
       			cc++;
       		}
        if(c == '\n')
       		{
       			nl++;
       		}
       		
		}
		/*Sum up all the count results*/
		ccCounter+= cc;
		wcCounter+= wc;
		nlCounter+= nl;
		 printf("%d\t%d\t%d ",nl, wc, cc);

}
	






	