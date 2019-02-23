/*
 * Name - Taylor Havart
 * Course - Real Time Programming
 * File Name - Server.c
 * Purpose - To build a client side program of the socket application in QNX.
 */
/*
 * Pid Cid from server to client using tcp connection
 */

/*Include all the header files required for socket programming*/

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/types.h>
#include <unistd.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <sys/neutrino.h>

/*Prints a descriptive error message.*/
void error(char *msg) {
	perror(msg);
	exit(1);
}

/*Main method of the client application.*/
int main(int argc, char *argv[]) {
	int bool = 1;
	FILE *fptr;
	FILE *fp;
	char replyMsg[256];
	fptr = fopen("INFO2.txt", "w");

	if (fptr == NULL)
		perror("File error:");
	int channel_id = ChannelCreate(0);
	if (channel_id < 0)
		perror("Channel id not created:");
	int server_pid = getpid();
	if (server_pid < 0)
		perror("Server id not created:");

	//printf("h %d %d", channel_id, server_pid);
	fprintf(fptr, "%d %d", channel_id, server_pid);
	fclose(fptr);

	char recv_msg[255];
	char clientId[255];

	fp = fopen("Messages.txt", "w");
	if (fp == NULL)
		perror("File error:");

	while(1) {
		if (bool == 1) {
			fp = fopen("Messages.txt", "a");
			if (fp == NULL)
				perror("File error:");
			bool = 0;

			//fprintf(stdout, "Channel ID: %d and Process ID: %d\n", channel_id, server_pid);
			fprintf(fp, "Channel ID: %d and Process ID: %d\n", channel_id,
					server_pid);
			//char clientId [255];
			memset(&clientId, '\0', 256);
			int recv_id2 = MsgReceive(channel_id, clientId, 255, NULL);
			// fprintf(stdout, "Client starting ID: %d\n", clientId);
			fprintf(fp, "Client starting ID: %s\n", clientId);

			memset(&replyMsg, '\0', 255);
			MsgReply(recv_id2, 0, replyMsg, sizeof(replyMsg));

		}

		memset(&recv_msg, '\0', 256);
		int recv_id = MsgReceive(channel_id, recv_msg, 255, NULL);

		if (strcmp(recv_msg, "exit") != 0) {

			char *message = strrchr(recv_msg, '~');

			int index = atoi(message + 1);
			*message = '\0';
			memset(&replyMsg, '\0', 255);
			sprintf(replyMsg, "Char is :%c Index is :%d", recv_msg[index],
					index);
			fprintf(fp, "Reply Message: %s\n", replyMsg);

			if (recv_id < 0)
				perror("Receive id not created:");
			int msgReply = MsgReply(recv_id, 0, replyMsg, sizeof(replyMsg));
			if (msgReply < 0)
				perror("Message Reply Error:");

		} else {

			fprintf(fp, "Client ending ID: %s\n", clientId);
			fprintf(fp, "****************Messages.txt End**************\n",
					clientId);
			fclose(fp);
			FILE *file;
			int c;
			file = fopen("Messages.txt", "r");
			if (file) {
				while ((c = getc(file)) != EOF)
					putchar(c);
				fclose(file);
			}
			bool = 1;
		memset(&replyMsg, '\0', 256);
		int msgReply = MsgReply(recv_id, 0, replyMsg, sizeof(replyMsg));
					if (msgReply < 0)
						perror("Message Reply Error:");
				}
			} //end while

			return 0;
		}
