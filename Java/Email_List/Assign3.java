package assignment3_2016;

import java.util.Scanner;

public class Assign3 {
	public static void main(String[] args) {
		Directory directory = new Directory();
		Scanner input = new Scanner(System.in);
		boolean done = false, isValid = true;
		String prompt = " ";

		while (!done){	
			if (!isValid){
				System.out.println("Exiting Program...");
				return;
			}
			System.out.println("Enter:\nC to create a new list\n"
					+ "P to display all the email lists\n"
					+ "A to add an entry to a list\n"
					+ "D to delete an entry from a list\n"
					+ "L to display a list\n"
					+ "F to load lists from a file\n"
					+ "Q to quit: ");
			char value = input.next().charAt(0);
			switch(value){
			case 'c': case 'C':
				prompt = "yes";
				isValid = directory.add(input, prompt);
				break;
			case 'p': case 'P':
				System.out.println(directory.toString());
				break;
			case 'a': case 'A':
				prompt = "yes";
				isValid = directory.addAtIndex(input, prompt);
				break;
			case 'd': case 'D':
				isValid = directory.delAtIndex(input);
				if (!isValid){
					System.out.println("Error Deleting from Entry");
					return;
				}
				break;
			case 'l': case 'L':
				isValid = directory.display(input);
				if (!isValid){
					System.out.println("Directory does not exist!");
					return;
				}
				break;
			case 'f': case 'F':
				prompt = "no";
				directory.readFile(prompt);
				break;
			case 'q': case 'Q':
				System.out.println("Exiting Program...");
				return;
			default:
				System.out.println("Incorrect entry, try again");
				break;
			}
		}
	}
}
