/* CST8221-JAP: LAB 02, Borders
   File name: SwingBordersDemo.java
*/

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.GridLayout;
import javax.swing.BorderFactory;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.border.*;
/**
 Demonstrates how to create simple boarders using the BorderFactoty class.
 Also, demonstrates how to use a class from the javax.swing.border package.
 JLabel is used for the demonstration,
 but a border can be painted around every JComponent object
 @version 1.17.1
 @author Svillen Ranev
 @since Java 2
*/
public class SwingBordersDemo extends JFrame {
        /* Swing components are serializable and require serialVersionUID */
	private static final long serialVersionUID = -6784904236778611860L;

/**
  Default constructor. Sets the GUI.
*/
  public SwingBordersDemo() {
    super("Swing Borders Demo");
    createGUI();
  }
  /**Builds the GUI */
  private void createGUI(){  
    Border empty, tickEmptyBoarder;
    Border line, thickLine;
    Border raisedbevel, loweredbevel;
    Border raisedEtched, loweredEtched;
    Border defaultTitle, modifiedTitle;
    Border compoundBorder1, compoundBorder2;
    //create different borders
    empty = BorderFactory.createEmptyBorder();
    tickEmptyBoarder = BorderFactory.createEmptyBorder(10, 10, 10, 10);
    line = BorderFactory.createLineBorder(Color.red); //create Rounded Line Border
   
    //Create a Rounded Line border.
    //The BorderFactory does not provide an appropriate method.
    //In this case, the LineBorder class must be used directly.
    thickLine = new LineBorder(Color.red,3,true);
    
    raisedbevel= BorderFactory.createRaisedBevelBorder();
    loweredbevel= BorderFactory.createLoweredBevelBorder();
    raisedEtched = BorderFactory.createEtchedBorder(EtchedBorder.RAISED);
    loweredEtched= BorderFactory.createEtchedBorder(EtchedBorder.LOWERED);
    defaultTitle = BorderFactory.createTitledBorder("Title");
    modifiedTitle = BorderFactory.createTitledBorder(line, "Title", 
                               TitledBorder.CENTER,TitledBorder.DEFAULT_POSITION);
    compoundBorder1=BorderFactory.createCompoundBorder(raisedbevel,line);
    compoundBorder2=BorderFactory.createCompoundBorder(defaultTitle,line);
    
    // create array of borders
    Border [] borders = {
      empty, tickEmptyBoarder,
      line, thickLine,
      raisedbevel, loweredbevel,
      raisedEtched, loweredEtched,
      defaultTitle, modifiedTitle,
      compoundBorder1, compoundBorder2
    };
    // create array of label text using an anonimous array
    String [] labelText;
    labelText = new String[]{
      "empty boarder", "tick empty boarder",
      "line boarder", "thick rounded line boarder",
      "raised bevel boarder", "lowered bevel boarder",
      "raised etched boarder", "lowered etched boarder",
      "default titled boarder","modified titled boarder",
      "compound border(raised bevel and line)", "compound border (title and line)"
    };
    //create array of labels
    JLabel [] labels = new JLabel[borders.length];
    for(int i=0;i < borders.length;++i){
      labels[i] = createLabel(borders[i],labelText[i]);
    }
    // create pane to hold borders
    JPanel simpleBordersPane = new JPanel(new GridLayout(6,2,10,10));
    simpleBordersPane.setBorder(tickEmptyBoarder);
    simpleBordersPane.setBackground(Color.WHITE);
    //add labels to pane
    for(int i=0;i < borders.length;++i){
      simpleBordersPane.add(labels[i]);
    }
    // add pane to frame
    getContentPane().add(simpleBordersPane, BorderLayout.CENTER);
  
  }
/**
 Creates a JLabel with specific border and description
 @param border the label border
 @param description the label text
 @return a label with border and text
*/
 
  private JLabel createLabel(Border border, String text) {
    JLabel label = new JLabel(text, JLabel.CENTER);
    label.setBorder(border);
    return label;
  }

/** 
  The main method.The GUI will start with the default Look and Feel - Metal Look and Feel 
  Runs the application GUI as a thread in the event queue.
  @param args not used
*/
  public static void main(String[] args) {
     /*
       Make all components to configured by the event dispatch thread.
       This is the thread that passes user provoked events such as mouse clicks to 
       the GUI components which have registered listeners for the events.
       The following code fragment forces the statements in the run() method to be executed in the
       event dispatch thread.
       The SwingUtilities.invokeLater() actually calls EventQueue.invokeLater() method. 
     */
     javax.swing.SwingUtilities.invokeLater(new Runnable()
         {
            @Override
            public void run()
            {
              SwingBordersDemo frame = new SwingBordersDemo();
               // set up the Close button (X) of the frame
               // no need to use explicitly a WindowListener. The line below will generate one for you. 
               frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
               frame.pack();
               frame.setLocationByPlatform(true); 
               // make the GUI visible
               frame.setVisible(true);	
            }
         });
     }
}
