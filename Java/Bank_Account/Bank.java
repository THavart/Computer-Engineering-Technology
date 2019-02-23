/***********************************************************************************
Class:  Bank
Purpose:  This class will contain the data structure for the Bank Simulator (ArrayList)
Author:   Taylor Havart-Labrecque
Course:   CST8130 - Data Structures
Data members:   accounts - ArrayList of BankAccount objects (instantiated
                           with either a SavingsAccount or ChequingAccount object)
                numAccounts - int - contains the current number of accounts in the array
                size - int - contains the maximum size of accounts allocated to array
Methods: default constructor () - allocates default size of 1000 to array
         initial constructor (int) -  parameter is size of array to be allocated
         addAccount:  boolean - successful add or not;  prompts user to enter data for an 
                 account which is added to array - either chequing or savings accoutn is added if
                 there is room
         toString(): String - prompts user to enter an account number to display, then returns
                 the data for that number if found else returns error message
         update(): String - prompts user to enter which account number to update, and by how much
                 and then updates the balance appropriately; returns success message or 
                 error message if not successful
         toFind(): int - prompts user to enter which account number they wish to find, and returns
                 array index where it is found, else returns -1
         monthlyUpdate() - processes through each current account in the array and updates
                 the account - withdraws fee for chequing, and adds interest for savings
         readFile(): boolean - prompts user for name of file to process, opens that file, then 
                 reads through the file and adds accounts to the array if there is room - returns          
                 false if bad data is encountered, else returns true
         openFile(): Scanner - returns the Scanner object if a file (name input by user) is opened, 
                 else returns null    
         displayAccounts(): String - returns toString of the arrayList.     	          
*************************************************************************************/
import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.Scanner;

public class Bank {

	private int size;
	private int numAccounts;
	private ArrayList<BankAccount> accounts;

	public Bank(){
		numAccounts = 0;
		size = 1000;
		accounts = new ArrayList<BankAccount>(size); //Default Value
	}
	public Bank(int size){
		accounts = new ArrayList<BankAccount>(size);
		numAccounts = 0;
		this.size = size;
	}
	public boolean addAccount(){

		boolean isValid = true, invalidData = true;
		char value = 0;
		BankAccount account = new BankAccount();

		while (invalidData){	
			@SuppressWarnings("resource")
			Scanner reader = new Scanner(System.in);
			System.out.println("Enter 's' for Savings Account or 'c' for Chequing Account: ");
			value = reader.next().trim().charAt(0);

			if (value == 's' || value == 'S'){
				account = new SavingsAccount();
			} else if (value == 'c' || value == 'C'){
				account = new ChequingAccount();
			} else {
				System.out.println("Invalid Entry try again");
				invalidData = true;
			}
			account.addBankAccount();
			if (accounts.isEmpty()){
				accounts.add(account);
				invalidData = false;
				break;
			} else {
				for (int i = 0; i < accounts.size(); i++){
					if (account.isGreater(accounts.get(i))){ 
						accounts.add(i, account);
						numAccounts++;
						invalidData = false;
						break;
					}
				}
			}
		}
		return isValid;
	}
	public String update(){
		@SuppressWarnings("resource")
		Scanner reader = new Scanner(System.in);
		double increment;
		int index = toFind();
		if (index != -1){
			System.out.println("How much would you like to deposit/withdraw?(Positive for Deposit/Negative for Withdrawl): ");
			try {
				increment = reader.nextDouble();
				if (accounts.get(index).updateBalance(increment)){
					return "Update Successful";
				}
			}catch(InputMismatchException e){
				System.out.println("Invalid Input");
				return "Update Failed";
			}	
		}
		return "Update Failed";
	}
	public int toFind(){
		@SuppressWarnings("resource")
		Scanner reader = new Scanner(System.in);
		int index = 0, start = 0, end = accounts.size()-1;

		System.out.println("Which account number would you like to find?");
		try {	
			index = reader.nextInt(); //reads in the accountNumber
		}catch(InputMismatchException e){
			System.out.println("Invalid Input");
			return -1;
		}
	//Binary Search
		while (start <= end){
			int mid = (start + end)/2;
			if (accounts.get(mid).isEqual(index) == 0){
				return mid;
			}
			if (accounts.get(mid).isEqual(index) == -1){
				end = mid - 1;
			}else {
				start =  mid + 1;
			}
		}
		return -1;
	}
	public void monthlyUpdate(){
		for (int i = 0; i < numAccounts; i++){ //updates all accounts based on the provided interest rates and fees
			if (accounts.get(i) != null){ //don't update the empty array entries.
				accounts.get(i).monthlyUpdate(); 
			}
		}
	}
	public boolean readFile(){
		char accountType = 0;
		Scanner inFile = openFile(); //goes to openFile method, will take the returned Scanner Object.
		BankAccount bankAccount = new BankAccount(); 
		boolean isValid = true;

		if (inFile != null){ //make sure inFile has values/exists.
			while (inFile.hasNext()){ //while there is a next value.
				accountType = inFile.next().charAt(0); //reads in account Type
				if (isValid){
					if (accountType == 'c' || accountType == 'C'){ //if type Chequing
						bankAccount = new ChequingAccount(); //make Chequing Account
					}
					else if (accountType == 's' || accountType == 'S'){ //if type Savings
						bankAccount = new SavingsAccount(); //make Savings Account
					} else {
						isValid = false; 
					}

					isValid = bankAccount.readFile(inFile); //go to SavingsAccount class and read from file.
					if (accounts.isEmpty()){
						accounts.add(bankAccount);
						numAccounts++;
					}

					for (int i = 0; i < accounts.size(); i++){
						if (bankAccount.isGreater(accounts.get(i))){
							accounts.add(i, bankAccount);
							numAccounts++;
							break;
						}
					}
				}
				else {
					System.out.println("@Bank.java - Invalid Data Read... Ending Program");
					return isValid;
				}
			}
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
	public String displayAccounts(){
		return accounts.toString();
	}
	public String toString(){
		int index = toFind(); //Calls find method to locate values
		if (index !=  -1){ //If the account Number exists print it.
			return accounts.get(index).toString();
		}
		return "Account Number not found";
	}
}
