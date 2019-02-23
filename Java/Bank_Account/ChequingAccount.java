/***********************************************************************************
Class:  ChequingAccount
Purpose:  This class will contain processing for the  Chequing Account objects for the  
          Bank Simulator (ArrayList) - inherited from BankAccount
Author:   Taylor Havart-Labrecque
Course:   CST8130 - Data Structures
Data members:   fee: double - the amount of the monthly fee
Methods: toString(): String - returns the data of the account formatted to display
         addBankAccount(): boolean - prompts user to enter data for this object from keyboard - edits 
                data, and doesn't allower user to continue with bad data                 
         monthlyUpdate() - processes the object with monthly update of withdrawing the fee (as long
                as bank balance is more than fee, else displays error message
         readFile(Scanner): boolean -  uses Scanner object parameter to fill object with data- returns          
                 false if bad data is encountered, else returns true        	          
*************************************************************************************/
import java.util.InputMismatchException;
import java.util.Scanner;

public class ChequingAccount extends BankAccount {
	private double fee;

	public ChequingAccount(){
		fee = 0;
	}
	public ChequingAccount(double fee){
		this.fee = fee;
	}
	public boolean addBankAccount(){
		super.addBankAccount();
		boolean isValid = true;

		@SuppressWarnings("resource")
		Scanner input = new Scanner(System.in);
		try{
			System.out.println("Enter Monthly Fee: ");
			fee = input.nextDouble();
			if (fee < 0){
				System.out.println("Fee cannot be less than 0");
				isValid = false;
				return isValid;
			}
		} catch(InputMismatchException e){
			System.out.println("Invalid Input!\n");
			isValid = false;
		}
		return isValid;
	}
	public void monthlyUpdate(){
		if ((super.balance - fee) <=0){
			System.out.println("Fee will bring balance to 0 - Deposit more funds!");
			super.balance = 0;
		}
		super.updateBalance(-fee);
	}
	public boolean readFile (Scanner inputFile){
		boolean isValid = super.readFile(inputFile);
		if (isValid){
			try {
				if (inputFile.hasNext()){
					fee = inputFile.nextDouble();
					if (fee < 0 ){
						System.out.println("fee is less than 0!");
						isValid = false;
						return isValid;
					}

				}else {
					System.out.println("Values do not exist!");
					isValid = false;
					return isValid;
				}

			} catch (InputMismatchException e){
				System.out.println("@ChequingAccount - Incorrect values");
				isValid = false;
			}	
		}
		return isValid;
	}
	public String toString(){
		return super.toString() + " Monthly Fee: " + fee + "\n";
	}
}
