/*
 * Title:Lab4Client.c
 * Name: Taylor Havart-Labrecque
 * Student Number: 040764885
 * Date: Apr 6th 2018
 * Course: CST8244
 * Purpose: creates client, allows user to send messages to server and get responses
 */

#include <sys/neutrino.h>
#include <sys/netmgr.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <errno.h>

#define BUFFER_SIZE 256


void sendmsg(int coid, int type);

int main(void) {
	pid_t pid;
	int coid,chid;
	char c[BUFFER_SIZE];
	char rmsg[BUFFER_SIZE];
	FILE* fd;

	//opens file to retrieve process id and channel id for connection
	fd = fopen ("lab5.txt", "r");
	//stores file content into variables
	fscanf(fd,"%d %d",&pid,&chid);
	fclose(fd);

	//error checking, if either are invalid throws error
	if (pid < 0 || chid < 0){
		fprintf(stderr, "Error reading variables from file. Error Code: %d", errno);
		exit(errno);
	}

	//connection function that stores connection id into variable
	coid = ConnectAttach(ND_LOCAL_NODE, pid, chid, _NTO_SIDE_CHANNEL,0);
	//error checking to see if successful
	if (coid < 0 ){
		fprintf(stderr, "Failed to connect to Channel %d  Error code: %d", chid, errno);
		exit(errno);
	}

	//successful connection messege
	fprintf(stdout, "Connected.\nProcess ID: %d\nChannel: %d\n", pid, chid);

	//file created to store clients process id, which will be used to identify clients on server side
	fd=fopen("client.txt","w");
	fprintf(fd,"%d",getpid());
	fclose(fd);
	//New Connection message
	MsgSend(coid, 'NewCon', sizeof('NewCon'), &rmsg, sizeof(rmsg));

	//main menu, while n isn't type user will be asked to send message
	while (1){
		printf("Enter:\n"
						"1. Register with Server\n"
						"2. Unregister from Server\n"
						"3. Find char in string at position\n"
						"4. Count char in string\n"
						"5. Exit and disconnect from Server\n"
						"> ");
		fgets(c, BUFFER_SIZE, stdin);

		switch (tolower(c[0])) {

		//register on server
		case '1':
			fd=fopen("client.txt","w");
			fprintf(fd,"%d\n",getpid());
			fclose(fd);
			MsgSend(coid, "DoReg", sizeof("DoReg"), &rmsg, sizeof(rmsg));
			//prints server reply
			printf("Server reply: %s\n",rmsg);
			fflush(stdout);
			break;

		//deregister on server
		case '2':
			fd=fopen("client.txt","w");
			fprintf(fd,"%d",getpid());
			fclose(fd);
			MsgSend(coid, "DeReg", sizeof("DeReg"), &rmsg, sizeof(rmsg));
			//prints server reply
			printf("Server reply: %s\n",rmsg);
			fflush(stdout);
			break;

		//find char
		case '3':
			fd=fopen("client.txt","w");
			fprintf(fd,"%d\n",getpid());
			fclose(fd);
			//runs send message function with connection id
			sendmsg(coid,1);
			break;

		//count letter
		case '4':
			fd=fopen("client.txt","w");
			fprintf(fd,"%d\n",getpid());
			fclose(fd);
			//runs send message function with connection id
			sendmsg(coid,2);
			break;

		//exit
		case '5':
			fd=fopen("client.txt","w");
			fprintf(fd,"%d\n",getpid());
			fclose(fd);
			return 0;

		}
	}

	//when 5 is typed, a kill message is sent to the server
	MsgSend(coid, "sigkill9", BUFFER_SIZE,"\0",BUFFER_SIZE);
	//connection detach function to end connection with server
	ConnectDetach(coid);
	return(0);
}


void sendmsg(int coid, int type){
	char smsg[BUFFER_SIZE],rmsg[BUFFER_SIZE],c[BUFFER_SIZE]={'\0'};

	//prompt for message to be entered by user
	printf("Enter a message: ");
	fgets(smsg,BUFFER_SIZE,stdin);

	if (type == 1){
		//prompt for number to be entered by user
		printf("Enter a number: ");
	}
	if (type == 2){
		//prompt for character to be entered by user
		printf("Enter a character: ");
	}
	fgets(c,BUFFER_SIZE,stdin);
	smsg[strlen(smsg)-1]='\0';
	//character is added to message string
	strncat(smsg,c,1);
	//message send function, recieves reply from server
	MsgSend(coid, smsg, sizeof(smsg), &rmsg, sizeof(rmsg));
	//prints server reply
	printf("Server reply: %s",rmsg);
	fflush(stdout);
	return;
}
