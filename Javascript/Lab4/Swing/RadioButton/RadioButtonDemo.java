// Fig. 12.20: RadioButtonTest.java
// Testing RadioButtonFrame
// Modified by S.Ranev
// version: 1.17.1
import java.awt.EventQueue;
import javax.swing.JFrame;
import java.awt.Dimension;

public class RadioButtonDemo  
{
   public static void main( String[] args )   {
	   
	 EventQueue.invokeLater(new Runnable()  {
          public void run() {       
           RadioButtonFrame radioButtonFrame = new RadioButtonFrame();
           radioButtonFrame.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
           radioButtonFrame.setMinimumSize(new Dimension(320, 110));//set the frame initial and minimum size
           radioButtonFrame.setLocationByPlatform(true);
           radioButtonFrame.setVisible( true ); // display frame
          }
     });   
  
   } // end main
} // end class RadioButtonDemo 


