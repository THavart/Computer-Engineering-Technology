package assignment3_2016;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class Directory {

	private ArrayList<EmailList> list;

	public Directory(){
		list = new ArrayList<EmailList>(100);
	}
	public boolean add(Scanner input, String prompt){
		boolean isValid = true;
		System.out.println("Enter the name of the list: ");
		String name = input.next();
		EmailList emailList = new EmailList(name);
		isValid = emailList.addEmail(input, prompt);
		if (list.isEmpty()){
			list.add(emailList);
		}
		for (int i = 0; i < list.size(); i++){
			if(list.get(i).isGreater(name)){
				list.add(i, emailList);
				break;
			}
		}
		return isValid;
	}
	public boolean binarySearch(String key) {
		int low = 0;
		int high = list.size() - 1;

		while(high >= low) {
			int middle = (low + high) / 2;
			if(list.get(middle).equals(key)) {
				return true;
			}
			if(list.get(middle).isGreater(key)) {
				low = middle + 1;
			}
			if(!list.get(middle).isGreater(key)) {
				high = middle - 1;
			}
		}
		return false;
	}
	public boolean addAtIndex(Scanner input, String prompt){
		String listEntry = "";
		System.out.println("What list do you wish to add to?: ");
		listEntry = input.next();

		for (int i = 0; i < list.size(); i++){
			if (binarySearch(listEntry)){
				list.get(i).addEmail(input, prompt);
			} else {
				System.out.println("EmailList does not exist!");
			}
		}
		return true;
	}
	public boolean delAtIndex(Scanner input){
		boolean isValid = false;
		String listEntry = "";
		System.out.println("What list do you wish to delete from?: ");
		listEntry = input.next();

		for (int i = 0; i < list.size(); i++){
			if (list.get(i).equals(listEntry)){
				isValid = list.get(i).del(input);
			}
		}
		return isValid;
	}
	public boolean display(Scanner input){
		String listEntry = "";
		System.out.println("Enter name of list to display: ");
		listEntry = input.next();
		for (int i = 0; i < list.size(); i++){
			if (list.get(i).equals(listEntry)){
				System.out.println(list.get(i).toString());
				return true;
			}
		}	
		return false;
	}
	public boolean readFile(String prompt){
		Scanner inFile = openFile(); //goes to openFile method, will take the returned Scanner Object.
		boolean isValid = true;
		int listNum = 0;
		String name = "";

		if (inFile != null){ //make sure inFile has values/exists.
			while (inFile.hasNext()){ //while there is a next value.
				listNum = inFile.nextInt();
				for (int i = 0; i < listNum; i++){
					name = inFile.next();
					EmailList emailList = new EmailList(name);
					isValid = emailList.addEmail(inFile, prompt);
					if (!isValid){
						System.out.println("Directory - Error");
						return isValid;
					}if (list.isEmpty()){
						list.add(emailList);
					} else {
						for (int j = 0; j < list.size(); j++){
							if(!list.get(j).isGreater(name)){
								list.add(j, emailList);
								break;
							}
						}
					}
				}
			}
			Collections.reverse(list);
			return isValid;
		}
		return isValid;
	}
	public Scanner openFile(){
		@SuppressWarnings("resource")
		Scanner reader = new Scanner(System.in);
		String fileName = new String();
		Scanner inFile = null;

		System.out.println("Enter name of file to process: "); //Takes file input
		fileName = reader.next();

		File file = new File(fileName);
		try {
			if (file.exists()){ //make sure the file exists
				inFile = new Scanner(file);
			}
			else{
				System.out.println("File does not exist!");
			}
			return inFile;
		} catch (IOException e) { //catches error if the file cannot be opened.
			System.out.println("Could not open file..." + fileName + "exiting");
			return null;
		}
	}
	public String toString(){
		StringBuilder sb = new StringBuilder();
		sb.append(list.toString());
		return sb.toString();
	}
}