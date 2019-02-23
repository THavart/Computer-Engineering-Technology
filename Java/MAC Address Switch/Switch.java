package assignment5;
import java.util.*;
/****************************************************************
 * 
 * Class: Switch
 * Author:  Linda Crane   CST8130 - 2016
 * purpose:  This class models the activity of a layer 2 switch in a network
 * data members:  camTable: SwitchEntry[] - holds the camTable of switch
 *          numEntries: int - number of entries currently in camTable
 *          maxEntries: int - size of camTable
 * methods:  processFrame(Frame): boolean - uses info in Frame parameter to update camTable
 *                             based on source address, then send frame on its way based on destination
 *        find (MACAddress):int - searches for parameter in camTable - returns index in camTable or -1 if not found
 *        displayTable() - displays current elements in table
 *        addInOrder(Frame) - add Frame parameter source address to table
 */
public class Switch {
	private ArrayList<LinkedList<SwitchEntry>> camTable;
	private int numEntries;
	private int maxEntries;

	public Switch() {
		camTable = new ArrayList<LinkedList<SwitchEntry>>(100);  // default value
		numEntries = 0;
		maxEntries = 100;

		for (int i = 0; i < maxEntries; i++){
			camTable.add(i, new LinkedList<SwitchEntry>());
		}
	}

	public Switch(int maxEntries) {
		camTable = new ArrayList<LinkedList<SwitchEntry>>(maxEntries);
		numEntries = 0;
		this.maxEntries = maxEntries;

		for (int i = 0; i < maxEntries; i++){
			camTable.add(i, new LinkedList<SwitchEntry>());
		}
	}

	public void processFrame(Frame inFrame) {
		// first, add source MAC to camTable (in order) if not already there
		if (!search(inFrame.getSource())) {
			if (numEntries >= maxEntries) {
				System.out.println ("Error...camTable is full - cannot add " + inFrame.getSource());	
			} else { 
				System.out.println ("Adding " + inFrame.getSource() + " to camTable");
				camTable.get(hash(inFrame.getSource())).add(new SwitchEntry(inFrame.getSource(), inFrame.getPort()));
			}
		}

		//process frame
		if (!search(inFrame.getDestination())){
			System.out.println("Sending frame with data " + inFrame.getData() + " from " + inFrame.getSource() + " to " + inFrame.getDestination());
		} else {
			System.out.println ("Flooding frame with data " + inFrame.getData() + " from " + inFrame.getSource() + " to " + inFrame.getDestination() + " out all ports");
		}
	}

	public int hash(MACAddress temp) {
		int total = 0;
		String address = temp.toString();
		for (int i = 0; i < temp.toString().length(); i++){
			address.replaceAll(":", "");
			total += address.charAt(i);
		}
		return total%maxEntries;
	}
	
	public boolean search (MACAddress temp) {
		int hashed = hash(temp);
		int size = camTable.get(hashed).size();
		if (size > 0){ 
			for (int i = 0; i < size; i++){
				if (camTable.get(hashed).indexOf(temp)!= -1){
					return true;
				}
			}
			return false;
		} else { return false; }
	}

	// return of -1 indicates not found, otherwise returns index of where found
	// uses binary search for efficiency
	public void displayTable() {
		/*System.out.println ("\nCam Table is : ");
		for (int i = 0; i < numEntries; i++){
			if (camTable.get(i).size() > 0){
				for (int j = 0; j < camTable.get(i).size(); j++) {
					System.out.println ("["+j+"]" + camTable.get(j));
				}
			}	
		}*/
System.out.println("\nCam Table is: ");
		for (int i = 0; i < camTable.size(); i++)
			if (camTable.get(i).toString() != "[]")
				System.out.println("["+i+"] " + camTable.get(i).toString());
	}
}

