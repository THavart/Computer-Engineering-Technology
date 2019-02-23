// Fig. 12.18: CheckBoxTest.java
// Testing CheckBoxFrame.
// Modified by S. Ranev
// version: 1.16.1
import javax.swing.JFrame;
import java.awt.EventQueue;

public class CheckBoxDemo
{
   public static void main( String[] args ) { 
      EventQueue.invokeLater(new Runnable() {
            public void run() {           
             CheckBoxFrame checkBoxFrame = new CheckBoxFrame(); 
             checkBoxFrame.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
             checkBoxFrame.setSize( 400, 100 ); // set frame size
             checkBoxFrame.setLocationByPlatform(true);
             checkBoxFrame.setVisible( true ); // display frame	
            }
       });   
      
   } // end main
} // end class CheckBoxDemo


