package assignment5;
import java.io.File;
import java.io.IOException;
import java.util.Scanner;
/*****************************************************************************************
 * // class Assignment2 
 * // Purpose: This class simulates the processing of a switch in a network
 * Linda Crane,   CST8130
 *  method main - This program asks user for name of file and connects to that file,
 *  then reads each line of the file as a packet and processes it(either data packet or routing protocol 
 *  packet based on first char input on the line)  
 ***************************************************************************************/
public class Assign2 {

	public static void main(String[] args) {
		Scanner inFile = null;
		Frame inFrame = new Frame();
		Switch swtch = new Switch();
		boolean dataOK = true;

		inFile = openFile();
		if (inFile != null) {
				
				while (inFile.hasNext()) {
					dataOK = inFrame.readFrame(inFile);
					if (dataOK)
						swtch.processFrame(inFrame);
					else  {
						System.out.println ("Invalid data read....ending program");
						break;
					}
				}// end while
				
			
		} else
			System.out.println("No file read....program ending");
		
		// display table before exiting
		swtch.displayTable();

	}// end of main

	public static Scanner openFile() {

		@SuppressWarnings("resource")
		Scanner keyboard = new Scanner(System.in);
		String fileName = new String();
		Scanner inFile = null;

		System.out.print("\n\nEnter name of file to process: ");
		fileName = keyboard.next();

		File file = new File(fileName);
		try {
			if (file.exists()) {
				inFile = new Scanner(file);
			}
			return inFile;
		} catch (IOException e) {
			System.out
					.println("Could not open file...." + fileName + "exiting");
			return null;
		}
	}// end openFile method

}// end class


