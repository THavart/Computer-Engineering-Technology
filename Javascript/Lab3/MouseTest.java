/* CST8221-JAP: LAB 03, Exercise 1
   File name: MouseTest.java
*/
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

/**
 Demonstrates different mouse events.
 @version 1.17.1
 @author Svillen Ranev
 @since Java 1.2
*/
public class MouseTest extends JFrame 
    implements ActionListener,MouseListener,MouseMotionListener, MouseWheelListener{
    //default serial version ID - Swing components implement the Serializable interface 
    //generate serialVersionUID here after the code has been completed and working 
    private static final long serialVersionUID = 1L;
    //fields declarations
    private JButton button;
    private JPanel pane;
    private static final String FRAME_TITLE = "Mouse Test";
    private final Icon buttonImage = new ImageIcon("happy.gif");   

/**
  Default constructor. Sets the frame properties and creates GUI.
*/ 
   public MouseTest(){ 
     // Sets the GUI 
     // set frame title
    	super(FRAME_TITLE);     	   
    	// set frame width, height
      setSize(200,200); 
      createGUI();
   }
  
   /** Create and set up containers and components.*/
   private void createGUI(){
	// Create a button with an image and text
	button = new JButton("Mouse Test Button",buttonImage);
	// Create a Tool Tip. Will show up when the mouse hovers over the button
	button.setToolTipText("Please play with the mouse");
   button.setPreferredSize(new Dimension(button.getText().length()*20,60));
   // Register an ActionListener and set the class object to be the event handler for the button click
   button.addActionListener(this);
	/* Register the three Mouse Listeners and set te event handler here: */
	button.addMouseListener(this);
	button.addMouseMotionListener(this);
	button.addMouseWheelListener(this);
	
	pane = new JPanel();
	// set a border around the JPanel
	pane.setBorder(BorderFactory.createEmptyBorder(25, 25, 10, 25));

	// Add components to JPanel container.
	pane.add(button);
	
       // Install JPanel pane as the content pane of the frame
         this.setContentPane(pane);
   // The GUI is ready.   
  }

/** 
  The main method.The GUI will start with the default Look and Feel 
  Anonymous class is used to pass the run method to the event dispatching thread.
  @param args not used
*/  
   public static void main(String[] args) {
     // Make all components to configured by the event dispatch thread.
     // This is the thread that passes user provoked events such as mouse clicks to 
     // the GUI components which have registered listeners for the events.
     // The following code fragment forces the statements in the run() method to be executed in the
     // event dispatching thread. 
     EventQueue.invokeLater(new Runnable() {
         @Override
         public void run() {
             MouseTest frame = new MouseTest();
             // set up the Close button (X) of the frame
             frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
             frame.setResizable(false);
             frame.pack();
             // make the GUI visible
             frame.setVisible(true);
         }
     });
     }

 /****************************** Beginning of Event handling Section
     * @param e ***********************/
  // Handle the button clicks. 
  // Override and implement the actionPerformed() method of the Action Listener interface
  @Override
  public void actionPerformed(ActionEvent e) {
	 // process the event
	 System.out.println("Method  actionPerformed called");  

   }
  @Override
    public void mouseClicked(MouseEvent mouseEvent) {
        System.out.println("Method mouseClicked called");
        System.out.println("Click count: " + mouseEvent.getClickCount());
        int n = mouseEvent.getButton();
        switch (n) {
            case MouseEvent.BUTTON1:
                System.out.println("Left Mouse button clicked");
                break;
            case MouseEvent.BUTTON2:
                System.out.println("Middle Mouse button clicked");
                break;
            case MouseEvent.BUTTON3:
                System.out.println("Right Mouse button clicked");
                break;
            default:
                System.out.println("Other Mouse button clicked");
                break;
        }
    }
 @Override
    public void mousePressed(MouseEvent mouseEvent) {
        System.out.println("Method mousePressed called");
    }

    @Override
    public void mouseReleased(MouseEvent mouseEvent) {
        System.out.println("Method mouseReleased called");
    }

    @Override
    public void mouseEntered(MouseEvent mouseEvent) {
        System.out.println("Method mouseEntered called");
    }

    @Override
    public void mouseExited(MouseEvent mouseEvent) {
        System.out.println("Method mouseExited called");
    }

    @Override
    public void mouseDragged(MouseEvent mouseEvent) {
        System.out.println("Method mouseDragged called");
    }

    @Override
    public void mouseMoved(MouseEvent mouseEvent) {
        System.out.println("Mouse location: X = " + mouseEvent.getX() + " Y = " + mouseEvent.getY());
    }

    @Override
    public void mouseWheelMoved(MouseWheelEvent mouseWheelEvent) {
        System.out.println("Method mouseWheelMoved called");
        int n = mouseWheelEvent.getWheelRotation();
        String string = n < 0 ? "Mouse wheel moved UP " + (- n) + " notch(es)" : "Mouse wheel moved DOWN " + n + " notch(es)";
        System.out.println(string);
    }
}