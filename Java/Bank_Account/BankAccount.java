/***********************************************************************************
Class:  BankAccount
Purpose:  This class will contain the base objects for the Bank Simulator (ArrayList)
Author:   Taylor Havart-Labrecque
Course:   CST8130 - Data Structures
Data members:   accountNumber: int - holds number associated with the account
				firstName: String - for first name of customer
				lastName: String - for last name of customer
				balance: double - holds the amount of money in the account
Methods: toString(): String - returns the data of the account formatted to display
         addBankAccount(): boolean - prompts user to enter data for this object from keyboard - edits 
                data, and doesn't allower user to continue with bad data
         isEqual (int): boolean - compares int parameter to account number in object and returns
                true/false appropriately
         isGreater (BankAccount): boolean - compares the BankAccount parameter to the accountNumber in object and 
                returns true/false appropriately       
         updateBalance (double) - updates the balance in the object by the parameter amount            
         monthlyUpdate() - processes the object with monthly update (empty for base class)
         readFile(Scanner): boolean -  uses Scanner object parameter to fill object with data- returns          
                 false if bad data is encountered, else returns true        	          
*************************************************************************************/
import java.util.InputMismatchException;
import java.util.Scanner;

public class BankAccount {

	protected int accountNumber;
	protected String firstName;
	protected String lastName;
	protected double balance;

	public BankAccount (){

		accountNumber = 0;
		firstName = " ";
		lastName = " ";
		balance = 0.0;
	}

	public BankAccount(int accountNumber, String firstName, String lastName, double balance){

		accountNumber = this.accountNumber;
		firstName = this.firstName;
		lastName = this.lastName;
		balance = this.balance;
	}
	public boolean addBankAccount(){
		boolean isValid = true;
		@SuppressWarnings("resource")
		Scanner reader = new Scanner(System.in);
		try{	
			System.out.println("Enter Account Number: ");	
			accountNumber = reader.nextInt();
			if (accountNumber < 0 || accountNumber > 99999999){
				System.out.println("Invalid Input");
				isValid = false;
				return isValid;
			} else{
				System.out.println("Enter Customer First Name: ");
				firstName = reader.next();
				System.out.println("Enter Customer Last Name: ");
				lastName = reader.next();
				System.out.println("Enter Balance: ");
				balance = reader.nextDouble();
				if (balance <= 0){
					System.out.println("Balance cannot be less than 0 try again!");
					isValid = false;
					return isValid;
				}
			}
		}catch(InputMismatchException e){
			System.out.println("Invalid Input");
			isValid = false;
			return isValid;
		}	
		return isValid;
	}
	public boolean updateBalance (double increment){
		boolean isValid = true;;
		if ((balance+increment) >= 0){	
			balance += increment;
		}else{
			System.out.println("Balance will be negative! Cannot withdraw more");
			isValid = false;
		}
		return isValid;
	}
	public void monthlyUpdate(){
		//empty
	}
	public boolean readFile (Scanner inputFile){
		boolean isValid = true;

		try {
			if (inputFile.hasNext()){
				accountNumber = inputFile.nextInt();
				if (accountNumber < 0 || accountNumber > 99999999){
					isValid = false;
					return isValid;
				}
				firstName = inputFile.next();
				lastName = inputFile.next();
				balance = inputFile.nextDouble();
				if (balance < 0){
					isValid = false;
					return isValid;
				}
			}else{
				System.out.println("Values do not exist!");
				isValid = false;
				return isValid;
			}

		} catch (InputMismatchException e){
			System.out.println("@BankAccount - Incorrect values");
			isValid = false;
		}	
		return isValid;
	}
	public boolean isGreater(BankAccount accNumber){

		if (accNumber.accountNumber > accountNumber){
			return true;
		}
		return false;
	}
	public int isEqual(int index){

		if (index == accountNumber){
			return 0;
		}
		if (index < accountNumber){
			return -1;
		}
		return 1;
	}
	public String toString (){
		return "Account Number: " + accountNumber + " First Name: " + firstName + " Last Name: " + lastName + " Balance: " + balance;
	}
}
