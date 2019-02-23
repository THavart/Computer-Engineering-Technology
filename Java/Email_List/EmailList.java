package assignment3_2016;

import java.util.InputMismatchException;
import java.util.LinkedList;
import java.util.Scanner;

public class EmailList {
	private LinkedList<EmailAddress> emailList;
	private String name;
	public EmailList(){
		name = new String("default");
	}
	public EmailList(String name){
		emailList = new LinkedList<EmailAddress>();
		this.name = new String(name);
	}
	public boolean addEmail(Scanner input, String prompt){
		char another = 'y';
		boolean isValid = false;
		int emailNum = 0;
		if (prompt.charAt(0) == 'y'){
			while (another == 'y' || another == 'Y'){
				isValid = false;
				EmailAddress emailAddress = new EmailAddress();
				emailAddress.addAddress(input, prompt);
				emailList.add(emailAddress);
				System.out.println("Address Added...");
				System.out.println("Would you like to add another? y/n?");
				another = input.next().charAt(0);
				while(another != 'y' && another != 'Y' && another != 'n' && another != 'N'){
					System.out.println("Invalid option try again!");
					another = input.next(".").charAt(0);
				}
				isValid = true;
			}
		}else{
			emailNum = input.nextInt();
			for (int j = 0; j < emailNum; j++){	
				EmailAddress emailAddress = new EmailAddress();
				emailAddress.addAddress(input, prompt);
				isValid = emailList.add(emailAddress);
			}
		}
		return isValid;
	}
	public boolean del(Scanner input){
		int index = 0;
		boolean isValid = false;
		System.out.println(name);
		for (int i = 0; i < emailList.size(); i++){
			System.out.println(i + " " + emailList.get(i));
		}	
		try {
			System.out.println("Enter an entry number to delete: ");
			index = input.nextInt();
			while (index >= emailList.size() || index < 0){
				System.out.println("Invalid Entry - Choose a value between 0 and " + emailList.size());
				index = input.nextInt();
				isValid = true;
			}
		}catch(InputMismatchException e){
			System.out.println("Delete Error - Non-Numerical Value Entered!");
			isValid = false;
		}
		emailList.remove(index);
		return isValid;
	}
	public String toString(){
		StringBuilder sb = new StringBuilder();
		sb.append(name + ":\n");
		sb.append(emailList.toString());
		return sb.toString() + ("\n");
	}
	public boolean equals(String listEntry) {
		if (name.equals(listEntry)){
			return true;
		} 
		return false;
	}
	public boolean isGreater(String key) {
		if (name.compareToIgnoreCase(key) > 0){
			return true;
		}else{
			return false;
		}
	}
}