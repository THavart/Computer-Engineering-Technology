/*
 * File name: ServerSocketRunnable.java
 * Author: Taylor Havart-Labrecque, 040 764 885
 * Course: CST8221 - JAP, Lab Section: 302
 * Assignment: 2 Part 2
 * Date: 18-04-2017
 * Professor: Svillen Ranev
 * Purpose: Provide functionality for the main server.
 * Class list : run() - necessary function for runnable implementation
 */
package server;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class ServerSocketRunnable implements Runnable {
    private final Socket socket;
    private ObjectInputStream input;
    private ObjectOutputStream output;
	public ServerSocketRunnable(Socket serverSocket){
            this.socket = serverSocket;
	}
@Override
    public void run() {
        try {
            output = new ObjectOutputStream(socket.getOutputStream());
            input = new ObjectInputStream(socket.getInputStream());
        String first, second;
            second = "";
      boolean quit = false;
      String cmdString;
      while (!quit){
          cmdString = (String)input.readObject(); //Takes the command String
          int index = cmdString.indexOf("-", cmdString.indexOf("-") + 1);
          
          if (index == -1){
              first = cmdString;
          } else {
              first = cmdString.substring(0, index);
              second = cmdString.substring(index + 1);
          }
          
          switch (first){
              case "-echo":
                  if (second == null){
                  output.writeObject("SERVER>ECHO:\n");
                  } else {
                      output.writeObject("SERVER>ECHO:" + second + "\n");
                  }
                  break;
              case "-time":
                  Calendar calendar = Calendar.getInstance();
                  DateFormat timeFormat = new SimpleDateFormat("hh:mm:ss a");
                  output.writeObject("SERVER>TIME: " + timeFormat.format(calendar.getTime()) + "\n");
                  break;
              case "-date":
                  Date date = new Date();
                  SimpleDateFormat df = new SimpleDateFormat("d MMMM YYYY");
                  output.writeObject("SERVER>DATE: " + df.format(date) +  "\n");
                  break;
              case "-help":
                  output.writeObject("SERVER>Available Services:"
                          + "\nquit"
                          + "\necho"
                          + "\ntime"
                          + "\ndate"
                          + "\nhelp"
                          + "\nclrs\n");
                  break;
              case "-clrs":
                  output.writeObject(null);
                  break;
              case "-quit":
                  output.writeObject("SERVER>Connection Closed.\n");
                  socket.close();
                  input.close();
                  output.close();
                  System.out.println("Server socket: Closing client connection...");
                  quit = true;
                  break;
              default:
                  output.writeObject("SERVER>ERROR: Unrecognized Command.");
                  break;
          }
      }
      } catch (IOException ex) {
            System.err.println("Error producing streams!");
        } catch (ClassNotFoundException ex) {
            System.err.println("ClassNotFoundException!");
        }
    }
    
}
