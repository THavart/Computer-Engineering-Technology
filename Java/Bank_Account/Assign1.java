/***********************************************************************************
Class:  Assign1
Purpose:  The class is the driver class for Assignment 1 - Bank Simulator - Fall 2016
Author:   Taylor Havart-Labrecque
Course:   CST8130 - Data Structures
*************************************************************************************/
import java.util.InputMismatchException;
import java.util.Scanner;

public class Assign1 {

	public static void main(String[] args) {

		boolean quit = false;
		char value = 0;
		Bank bank = new Bank();

		while (!quit){	
			@SuppressWarnings("resource")
			Scanner input = new Scanner(System.in);
			System.out.println("Enter your choice: \n"
					+ "A - Add new account\n"
					+ "D - Display an account\n"
					+ "L - Display all accounts\n"
					+ "U - Update balance on account\n"
					+ "M - Run month end update\n"
					+ "F - Enter info from file\n"
					+ "Q - Quit: ");
			try{	
				value = input.next(".").charAt(0);
			}catch(InputMismatchException e){}
			
			switch (value){
			case 'A': case 'a':
				bank.addAccount();
				break;
			case 'D': case 'd':
				System.out.println(bank);
				break;
			case 'L': case 'l':
				System.out.println(bank.displayAccounts());
				break;
			case 'U': case 'u':
				System.out.println(bank.update());
				break;
			case 'M': case 'm':
				bank.monthlyUpdate();
				break;
			case 'F': case 'f':
				bank.readFile();
				break;
			case 'q': case 'Q':
				quit = true;
				System.out.println("Exiting Program...");
				break;
			default: 
				System.out.println("Invalid input, please enter again!");
				break;
			}
		}
	}
}
