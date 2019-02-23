package lab4;

public class LLNode {
	private String data;
	private LLNode next;

	public LLNode() {
		this.data = null;
		this.next = null;
	}
	
	public LLNode (String newData) {
		this.data = (newData);
		this.next = null;
	}
	
	public LLNode getNext() {
		return this.next;
	}
	
	public void updateNode (LLNode nextOne) {
		this.next = nextOne;
	}
	
	public String getData(){
		return this.data;
	}
	
	public String toString () {
		return  this.data;
	}
}
