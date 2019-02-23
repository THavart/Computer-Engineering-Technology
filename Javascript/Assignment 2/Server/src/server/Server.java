/*
 * File name: Server.java
 * Author: Taylor Havart-Labrecque, 040 764 885
 * Course: CST8221 - JAP, Lab Section: 302
 * Assignment: 2 Part 2
 * Date: 18-04-2017
 * Professor: Svillen Ranev
 * Purpose: Contains one method main to run the program.
 * Class list : N/A
 */
package server;


import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;

public class Server {
	public static void main(String[] args){
            int portNumber;
            ServerSocket serverSocket;
		if (args.length != 0){
                    try {
                    portNumber = Integer.valueOf(args[0]);
                    System.out.println("Using port number: " + portNumber);
                    }catch(NumberFormatException ex){
                        System.out.println(args[0] + "is an invalid port");
                        return;
                    }
		}else{
                    portNumber = 65535;
                    System.out.println("Using default port: " + portNumber);	
                }
		try {
			serverSocket = new ServerSocket(portNumber); 	
			while (true) { //infinite loop to try and connect to a socket
				Socket Socket = serverSocket.accept();	
				System.out.println("Connecting to a client Socket " + Socket.toString());	
				ServerSocketRunnable socketRun = new ServerSocketRunnable(Socket);
				Thread thread = new Thread(socketRun);
				thread.start(); 
				//starts the thread running of the socket that has been established 
			} 
		} catch (IOException e) {
                    e.printStackTrace(System.out);
		}
	}
}
