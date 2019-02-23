package assignment3_2016;
import java.util.Scanner;
/***********************************************************************************
Class:  EmailAddress
Purpose:  This class will model the data and actions needed for an eMail address datatype
Author:   Linda Crane
Course:   CST8130 - Data Structures
Data members:   address: String - hold the value of a valid email address
Methods: EmailAddress() - default constructor - set empty string field
		 EmailAddress(String) -  sets object to String parameter if valid (else set empty string field)
         toString(): String - returns the data of the address field
         addAddress(Scanner)- reads in valid address from Scanner       	          
 *************************************************************************************/

public class EmailAddress {
	private String address = new String();

	//*****************  default constructor  ******************************************
	public EmailAddress() {
	}

	//*****************  initial constructor  ******************************************
	public EmailAddress (String address) {
		if (address.contains ("@") && address.contains(".") && address.length() >= 7)
			this.address = new String (address);
	}

	//*****************   toString    **************************************************
	public String toString() {
		return address;
	}

	//*****************  addAddress    **************************************************
	public void addAddress(Scanner in, String prompt) {
		if (prompt.charAt(0) == 'y'){
			System.out.print ("Enter valid email address");
		}
		address = in.next();

		while (!address.contains ("@") || !address.contains(".") || address.length() < 7) {
			System.out.print ("Enter valid email address...must contain @ and .:");
			address = in.next();
		}
	}
}