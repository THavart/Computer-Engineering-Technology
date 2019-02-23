// Fig. 12.17: CheckBoxFrame.java
// Creating JCheckBox buttons.
// Modified by S.Ranev
// version: 1.17.1
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.event.ItemListener;
import java.awt.event.ItemEvent;
//import java.awt.event.ActionListener;
//import java.awt.event.ActionEvent;
import javax.swing.JFrame;
import javax.swing.JTextField;
import javax.swing.JCheckBox;

public class CheckBoxFrame extends JFrame 
{
   
   private static final long serialVersionUID = 5398520551659754791L;
   private final JTextField textField; // displays text in changing fonts
   private final JCheckBox boldJCheckBox; // to select/deselect bold
   private final JCheckBox italicJCheckBox; // to select/deselect italic

   // CheckBoxFrame constructor adds JCheckBoxes to JFrame
   public CheckBoxFrame()
   {
      super( "Swing CheckBox Demo" );
      setLayout( new FlowLayout() ); // set frame layout

      // set up JTextField and set its font
      textField = new JTextField( "Watch the font style change", 20 );
      textField.setFont( new Font( Font.SERIF, Font.PLAIN, 14 ) );
      add( textField ); // add textField to JFrame

      boldJCheckBox = new JCheckBox( "Bold" ); // create bold checkbox
      italicJCheckBox = new JCheckBox( "Italic" ); // create italic
      add( boldJCheckBox ); // add bold checkbox to JFrame
      add( italicJCheckBox ); // add italic checkbox to JFrame

      // register listeners for JCheckBoxes
      CheckBoxHandler handler = new CheckBoxHandler();
      //JCheckBox generates also an ActionEvent which means
      // that you can register an ActionListener instead of ItemListener
      boldJCheckBox.addItemListener( handler );
      italicJCheckBox.addItemListener( handler );
   } // end CheckBoxFrame constructor

   /** Private inner class for ItemListener event handling
       JCheckBox generates also an ActionEvent which means
       that you can implement an ActionListener instead of ItemListener
   */
   private class CheckBoxHandler implements ItemListener 
   {
      // respond to checkbox events
      @Override
      public void itemStateChanged( ItemEvent event )
      {
         Font font = null; // stores the new Font

         // determine which CheckBoxes are checked and create Font
         if ( boldJCheckBox.isSelected() && italicJCheckBox.isSelected() )
            font = new Font( Font.SERIF, Font.BOLD + Font.ITALIC, 14 );
         else if ( boldJCheckBox.isSelected() )
            font = new Font( Font.SERIF, Font.BOLD, 14 );
         else if ( italicJCheckBox.isSelected() )
            font = new Font( Font.SERIF, Font.ITALIC, 14 );
         else
            font = new Font( Font.SERIF, Font.PLAIN, 14 );

         textField.setFont( font ); // set textField's font
      } // end method itemStateChanged
   } // end private inner class CheckBoxHandler
} // end class CheckBoxFrame

/**************************************************************************
 * (C) Copyright 1992-2010 by Deitel & Associates, Inc. and               *
 * Pearson Education, Inc. All Rights Reserved.                           *
 *                                                                        *
 * DISCLAIMER: The authors and publisher of this book have used their     *
 * best efforts in preparing the book. These efforts include the          *
 * development, research, and testing of the theories and programs        *
 * to determine their effectiveness. The authors and publisher make       *
 * no warranty of any kind, expressed or implied, with regard to these    *
 * programs or to the documentation contained in these books. The authors *
 * and publisher shall not be liable in any event for incidental or       *
 * consequential damages in connection with, or arising out of, the       *
 * furnishing, performance, or use of these programs.                     *
 *************************************************************************/
