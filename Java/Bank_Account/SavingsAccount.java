/***********************************************************************************
Class:  SavingsAccount
Purpose:  This class will contain processing for the Savings Account objects for the  
          Bank Simulator (ArrayList) - inherited from BankAccount
Author:   Taylor Havart-Labrecque
Course:   CST8130 - Data Structures
Data members:   interestRate: double - the percentage amount of interest rate
                minimumBalance: double - the monthly balance user must have to get interest
Methods: toString(): String - returns the data of the account formatted to display
         addBankAccount(): boolean - prompts user to enter data for this object from keyboard - edits 
                data, and doesn't allower user to continue with bad data                 
         monthlyUpdate() - processes the object with monthly update of adding interest (as long
                as bank balance is more than minBalance, else displays error message
         readFile(Scanner): boolean -  uses Scanner object parameter to fill object with data- returns          
                 false if bad data is encountered, else returns true        	          
*************************************************************************************/
import java.util.InputMismatchException;
import java.util.Scanner;

public class SavingsAccount extends BankAccount {

	private double interestRate;
	private double minimumBalance;

	public SavingsAccount(){

		interestRate = 0;
		minimumBalance = 0;
	}
	public SavingsAccount(double interestRate, double minimumBalance){
		this.interestRate = interestRate;
		this.minimumBalance = minimumBalance;
	}
	public boolean addBankAccount(){
		boolean isValid = true;

		if (super.addBankAccount()){
			@SuppressWarnings("resource")
			Scanner input = new Scanner(System.in);
			try{
				System.out.println("Enter Monthly Minimum Balance: ");
				minimumBalance = input.nextDouble();
				if (minimumBalance > super.balance || minimumBalance < 0){
					System.out.println("Error - Minimum Balance incorrect");
					isValid = false;
					return isValid;
				}
				System.out.println("Enter Monthly Interest Rate: ");
				interestRate = input.nextDouble();
				if (interestRate < 0){
					System.out.println("Interest Rate cannot be negative");
					isValid = false;
					return isValid;
				}
			} catch(InputMismatchException e){
				System.out.println("Invalid Input!");
				isValid = false;
			}
		}
		return isValid;
	}
	public void monthlyUpdate(){
		double balance = super.balance*interestRate;
		super.updateBalance(balance);
	}

	public boolean readFile (Scanner inputFile){
		boolean isValid = super.readFile(inputFile);

		if (isValid){
			try {
				interestRate = inputFile.nextDouble();
				minimumBalance = inputFile.nextDouble();
				if (minimumBalance > super.balance){
					System.out.println("Minimum Balance cannot be more than Balance! Account Number: " + super.accountNumber + "\n");
				}
			} catch (InputMismatchException e){
				System.out.println("@SavingsAccount - Incorrect values");
				isValid = false;
			}	
		}
		return isValid;
	}
	public String toString(){
		return super.toString() + " Monthly Minimum Balance: " + minimumBalance + " Interest Rate: " + interestRate + "\n";
	}
}