/*
 * Title:Lab4Server.c
 * Name: Taylor Havart-Labrecque
 * Student Number: 040764885
 * Date: Apr 6th 2018
 * Course: CST8244
 * Purpose: Create server channel for multiple client access, handles messages recieved from client, table to register clients
 */

#include <stdio.h>
#include <stdlib.h>
#include <sys/neutrino.h>
#include <string.h>
#include <errno.h>
#include <unistd.h>

#define BUFFER_SIZE 256

//table to hold clients pid and status
struct clienttable{
	int pid;
	char status;
};

int main(void) {
	int chid,rcvid,pid,counter;
	char loc;
	FILE* fd;
	FILE* fr;
	char rmsg[BUFFER_SIZE],msg[BUFFER_SIZE];
	struct clienttable clienttable[10];
	int semaphore = 3;
	int spot = 0;


	//Channel creation returns 0 on success, stores channel id in variable
	chid= ChannelCreate(0);
	//error check to see if channel is created
	if (chid < 0){
		fprintf(stderr, "Error: Creation of channel was unsuccessful");
	}

	//Creates variable file and adds process id and channel id
	fd=fopen("lab5.txt","w");
	fprintf(fd,"%d %d",getpid(),chid);
	fclose(fd);

	//Creates log file
	fd=fopen("lab5log.log","w");
	fprintf(fd,"\n\nLab 5 Log File\n");
	fflush(fd);

	fprintf(stdout,"Server is Ready. Process ID is: %d on channel: %d ", getpid(),chid);
	fprintf(fd,"\nServer is Ready. Process ID is: %d on channel: %d ", getpid(),chid);
	fflush(stdout);
	fflush(fd);

	//main loop that checks for new clients
	while(1){

		//message receive function, server waits at this point until message is received
		rcvid = MsgReceive (chid, &rmsg, sizeof(rmsg), NULL);

		//checks file for clients pid
		fr = fopen ("client.txt", "r");
		fscanf(fr,"%d",&pid);
		fclose(fr);

		//New connection process
		if (strcmp(rmsg,"NewCon") == 0){
			//posts client info message on log and standard output
			fprintf(stdout,"\nClient is connected. ID = %d",pid);
			fprintf(fd,"\nClient is connected. ID = %d",pid);
			fflush(stdout);
			fflush(fd);
			//returns empty message to continue client
			MsgReply (rcvid, 0, '\0', sizeof('\0'));
		}

		//register process
		if(strcmp(rmsg,"DoReg") == 0){
			//loop to check if pid is matched in the table
			for (int i = 0; i < 10; i++){
				//if pid matches and registered
				if(clienttable[i].pid == pid && clienttable[i].status == 'r'){
					strcpy(rmsg, "You are already registered\n");
					printf( "Client %d already registered. Registration failed.\n", pid);
					fprintf(fd,  "Client %d already registered. Registration failed.", pid);
					//reply to client with already registered
					MsgReply( rcvid, EOK, rmsg, strlen(rmsg));
					break;
				}

				else if ((clienttable[i].pid != pid) && ( i == 9)){
					//checks if there is still room in the 3 register spots
					if (semaphore < 4 && semaphore > 0){
						//sets pid in table
						clienttable[spot].pid = pid;
						//sets status to registered
						clienttable[spot].status = 'r';
						//increase amount of clients in table
						spot++;
						//decrease amount of registration spots left
						semaphore--;
						strcpy(rmsg, "You are now registered!\n");
						printf("Client %d registered\n", pid);
						fprintf(fd, "Client %d registered\n", pid);
						//reply with registered message
						MsgReply( rcvid, EOK, rmsg, strlen(rmsg));
					}

					else{
						//registered clients has reached 3
						strcpy(rmsg, "There are too many clients registered\n");
						printf( "Replying with message = {%s}\n", rmsg );
						fprintf(fd, "Replying with message to %d  = {%s}\n", pid ,rmsg );
						MsgReply( rcvid, EOK, rmsg, strlen(rmsg));
					}
				}
			}
		}

		// deregister process
		if (strcmp(rmsg,"DeReg") == 0){//loop to check if pid is matched in the table
			for (int i = 0; i < 10; i++){
				//if pid matches and registered
				if (clienttable[i].pid == pid && clienttable[i].status == 'r'){
					//sets to deregistered
					clienttable[i].status = 'd';
					strcpy(rmsg, "You are now deregistered");
					printf( "Deregistering client %d", pid);
					fprintf(fd, "Deregistering client %d", pid);
					//reply to client with deregistered message
					MsgReply( rcvid, EOK, rmsg, strlen(rmsg));
					//checks semaphore number
					if (semaphore != 3){
						//adds 1 to semaphore (MAX 3)
						semaphore++;
					}
					break;
				}

				else{
					strcpy(rmsg, "You are not registered");
					printf("Client %d was not registered. Deregistration Failed", pid);
					fprintf(fd, "Client %d was not registered. Deregistration Failed", pid);
					//reply with failed message
					MsgReply(rcvid, EOK, rmsg, strlen(rmsg));
				}
			}
		}

		//kill message received
		if (strcmp(rmsg,"sigkill9") == 0){
			//logged info about client closing
			fprintf(stdout,"\nClient %d has ended session.\nConnection Closed.", pid);
			fprintf(fd,"\nClient %d has ended session.\nConnection closed.", pid);

			//deregisters client if they failed to do so before quiting
			for (int i = 0; i < 10; i++){
				//if pid matches and registered
				if (clienttable[i].pid == pid && clienttable[i].status == 'r'){
					//sets to deregistered
					clienttable[i].status = 'd';
					strcpy(rmsg, "You are now deregistered");
					printf( "Deregistering client %d", pid);
					fprintf(fd, "Deregistering client %d", pid);
					//reply to client with deregistered message
					MsgReply( rcvid, EOK, rmsg, strlen(rmsg));
					//checks semaphore number
					if (semaphore != 3){
						//adds 1 to semaphore (MAX 3)
						semaphore++;
					}
				}

				//blank message reply to close client
				MsgReply (rcvid, 0, '\0', sizeof('\0'));
				memset(rmsg,0,strlen(rmsg));
				fflush(stdout);
				fflush(fd);
				break;
			}
		}

		else {
			for (int i = 0; i < 10; i++){
				//if pid matches and registered
				if(clienttable[i].pid == pid && clienttable[i].status == 'r'){

					//logged message received and prints to stdout
					fprintf(stdout,"\nMessage recieved. Client ID: %d  Message: %s",pid,rmsg);
					fprintf(fd,"\nMessage recieved. Client ID: %d  Message: %s",pid,rmsg);

					//location variable is the added character at the end of message
					loc = rmsg[strlen(rmsg)-1];

					//checks if added char is alpha
					if (isalpha(loc)){
						counter = -1;
						//loop to count how many times letter appears in the word
						for(int j = 0; j < strlen(rmsg); j++){
							if (rmsg[j] == loc){
								counter++;
							}
						}
						//converts num to char and stores in msg
						itoa(counter, msg, 10);
					}
					else{
						//grabs character at the value chosen by location and store into message variable
						sprintf(msg,"%c",rmsg[atoi(&loc)]);
					}
					fprintf(stdout,"\nSending reply. Message: %s",msg);
					fprintf(fd,"\nSending reply. Message: %s",msg);
					//message is sent back to client and client resumes at main menu
					MsgReply (rcvid, 0, &msg, sizeof(msg));
					fflush(fd);
				}
				else {
					strcpy(rmsg, "You are not registered, cannot process message.\n");
					MsgReply( rcvid, EOK, rmsg, strlen(rmsg));
				}
			}
		}//here
	}
	//closes log file
	fclose(fd);
}
