package assignment4;

import java.io.File;
import java.io.IOException;
import java.util.Scanner;

public class Main {

	/* Tasks:
	 * Reset tree to empty
	 * Read a string of text from the keyboard and add to the dictionary (optional)
	 * Read text from a file add to the dictionary
	 * Search for a word and show how many times it occured in the text
	 * Display the number of nodes in the dictionary
	 * Exit
	 */

	public static void main(String[] args) {
		boolean option = true;
		@SuppressWarnings("resource")
		Scanner input = new Scanner(System.in);	
		Dictionary dictionary = new Dictionary();
		while(option){
			System.out.println("Enter 1 to clear the dictionary\n"
					+ "2 to add text from keyboard\n"
					+ "3 to add text from a file\n"
					+ "4 to search for a word count\n"
					+ "5 to display the number of nodes\n"
					+ "6 to quit");
			int value = input.nextInt();
				if (value > 6 || value <= 0){
					System.out.println("Enter a value between 1-6!!: ");
				}
			switch(value){
			case 1:
				dictionary.clearDictionary();
				break;
			case 2:
				System.out.println("Enter a String to be added:\n");
				String word = input.next();
				dictionary.addKeyboard(word);
				break;
			case 3:	
				boolean dataOK = true;
				Scanner file = openFile();
				if (file != null){
					while (file.hasNext()){
						dataOK = dictionary.addFile(file); //adds the file contents into the treeMap
						if (!dataOK){
							System.out.println("Invalid data read... ending program");
							break;
						}//end if
					}//end while
				} else {
					System.out.println("No file read.. program ending");
					option = false;
				}
				break;
			case 4:	
				System.out.println("Enter a word to search for: ");
				String search = input.next();
				dictionary.wordCount(search);
				break;
			case 5:
				System.out.println("There are " + dictionary.nodeCount() + " nodes");
				break;
			case 6:
				System.out.println("Program ending...");
				option = false;
				break;
			}
		}	
	}	//end main

	private static Scanner openFile() {
		@SuppressWarnings("resource")
		Scanner input = new Scanner(System.in);
		String fileName = new String();
		Scanner inFile = null;

		System.out.println("Enter name of file to process:\n");
		fileName = input.next();

		File file = new File(fileName);
		try {
			if(file.exists()){
				inFile = new Scanner(file);
			}
			return inFile;
		}catch (IOException e){
			System.out.println("Could not open file..." + fileName + "\n exiting..");
			return null;
		}
	}
}
