package assignment5;
import java.util.Scanner;
/**************************************************************
 * 
 * class: Frame
 * author: Linda Crane
 * CST8130 - 2016
 * purpose:  this class models a layer 2 frame in a network
 * data members:  port: String - holds port input
 *      destinationMAC : MACAddress - hold the destination address
 *      sourceMAC: MACAddress - holds the source address
 *      data:String - holds data in the frame
 * methods: readFrame(Scanner):boolean - reads frame data from Scanner object, returns success or not
 *      getPort(): String 
 *      getDestination(): MACAddress
 *      getSource():MACAddress
 *      getData(): String
 *
 */
public class Frame {
	private String port;
	private MACAddress destinationMAC;
	private MACAddress sourceMAC;
	private String data;
	
	public Frame () {
		port = new String();
		destinationMAC = new MACAddress();
		sourceMAC = new MACAddress();
		data = new String();
		
	}
	public boolean readFrame(Scanner inFile) {
			boolean dataOK = true;
			if (inFile.hasNext()) {
				port = inFile.next();
				dataOK = destinationMAC.readAddress(inFile);
				if (dataOK) {
					dataOK = sourceMAC.readAddress(inFile);
				}
				if (dataOK && inFile.hasNext()) {
					data = inFile.next();
					return true;
				} 
			}
	
			return false;
	}
	
	public MACAddress getSource() {
		return sourceMAC;
	}
	
	public MACAddress getDestination() {
		return destinationMAC;
	}
	
	public String getPort () {
		return port;
	}
	
	public String getData() {
		return data;
	}
	

}
