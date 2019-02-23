package lab4;
public class LList {
	private LLNode head;


	public LList() {
		head = null;	
	}

	public void addAtHead (String newData) {
		LLNode newNode = new LLNode(newData);
		newNode.updateNode(head);
		head = newNode;
	} 

	public void display() {
		LLNode temp = head;
		while (temp != null) {
			System.out.println (temp);
			temp = temp.getNext();
		} 
	} 

	public LLNode deleteAtHead ( ) {
		LLNode removedOne = head;
		head = head.getNext();
		return removedOne;
	}

	public LLNode deleteValue(String value){
		LLNode removedOne = head;
		if (head == null){
			return removedOne;
		}
		LLNode current = head;
		LLNode previous = null;
		while (current != null){
			LLNode nextNode = current.getNext();
			if (value.equalsIgnoreCase(current.getData())){
				if (current.equals(removedOne)){
					removedOne = nextNode;
				}
				if (previous != null){
					previous.updateNode(nextNode);
				}
			}
			else{
				previous = current;
			}
			current = nextNode;
		}
		return removedOne;
	}
}
