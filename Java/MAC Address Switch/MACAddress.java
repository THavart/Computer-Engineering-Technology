package assignment5;
import java.util.Scanner;
/*    Class MACAddress                             
 *    Purpose:  this class models a networking hardware address - also known as MAC Address
 *    Author:  Linda Crane
 *    Data:   address:  String (to hold the 12 char address)
 *    Methods:  default constructor - initializes to blank string
 *              initial constructor (String) - intiializes to String parameter as long as it is 12 chars long
 *              initial constructor (MACAddress) - intializes to String in parameter MACAddress object
 *              readAddress (Scanner): boolean - reads a MACAddress from the Scanner object buffer and returns
 *                              boolean if successful
 *              isEqual(MACAddress):boolean - compares the current object string to string in parameter object 
 *                              and return boolean true if equal, else returns boolean false
 *              isGreaterThan(MACAddress): boolean - compares for greater than.
 *              toString():String - returns String address
 */

public class MACAddress {
	private String address;
	
	public MACAddress() {
		address = new String();
	}
	
	public MACAddress(String address) {
		if (address.length() == 12)
			this.address = new String(address);
		else this.address = new String();   // if error, set to empty address
	}
	public MACAddress(MACAddress mac) {
		this.address = new String(mac.address);
	}
	
	public boolean readAddress(Scanner inFile) {
		address = inFile.next();
		if (address.length() == 12)
			return true;
		else {
			address = new String();  // if error, set to empty address
			return false;
		}
	}
	
	public boolean isEqual (MACAddress rhs) {
		return rhs.address.equalsIgnoreCase(this.address);
	}
	
	public boolean isGreaterThan (MACAddress rhs) {
		return (this.address.compareToIgnoreCase(rhs.address) > 0);
	}
	
	public String toString() {
		String out = address.substring(0,2);
		for (int i=2; i<12; i+=2)
			out +=  ":" + address.substring(i, i+2);
		return out;
	}
	
	
}
