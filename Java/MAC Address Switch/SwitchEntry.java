package assignment5;
/************************************************************************
 * 
 *Class:  SwitchEntry
 *Author :Linda Crane  CST8130 - 2016
 *purpose:  This class handles the array objects of a layer 2 switch table
 *data members:  seAddress: MACAddress - holds address of entry
 *           port: String - holds port information
 *methods:  addEntry (MACAddress, String) - initializes object with parameters
 *   isEqual(MACAddress):boolean - compares seAddress in object to parameter
 *   getAddress(): MACAddress
 *   getPort():String
 *
 */
public class SwitchEntry {
	private MACAddress seAddress;
	private String port;
	
	public SwitchEntry () {
		seAddress = new MACAddress();
		port = new String();
	}
	
	public SwitchEntry (MACAddress address, String port) {
		seAddress = new MACAddress(address);
		this.port = new String(port);
	}
	
	// note to students...this is not actually used in the assignment - I wrote it to demo that it could be written
	public boolean isEqual (MACAddress rhs) {
		return seAddress.isEqual(rhs);
	}
	
	public MACAddress getAddress() {
		return seAddress;
	}
	
	public String getPort() {
		return port;
	}
	
	public String toString() {
		return "address: " + seAddress + " port " + port;
	}

}
