
import java.awt.*;
import javax.swing.*;

/**
 *
 * @author t-hla
 */

public class CalculatorSplashScreen extends JWindow{
    
    private final int duration;
    
    public CalculatorSplashScreen(int duration){
        this.duration = duration;
    }
    
    public void showSplashScreen(){
    //create content pane
     JPanel content = new JPanel(new BorderLayout());
   // or use the window content pane
   //  JPanel content = (JPanel)getContentPane();
     content.setBackground(Color.GRAY);
    
    // Set the window's bounds, position the window in the center of the screen
    int width =  1280+10;
    int height = 720+10;
    Dimension screen = Toolkit.getDefaultToolkit().getScreenSize();
    int x = (screen.width-width)/2;
    int y = (screen.height-height)/2;
    //set the location and the size of the window
    setBounds(x,y,width,height);

    // create the splash screen
    JLabel label = new JLabel(new ImageIcon("screen.jpg"));
    JLabel demo = new JLabel("Assignment 1 - Calculator", JLabel.CENTER);
    demo.setFont(new Font(Font.SANS_SERIF, Font.BOLD, 16));
    content.add(label, BorderLayout.CENTER);
    content.add(demo, BorderLayout.SOUTH);
    // create custom RGB color
    Color customColor = new Color(188, 190, 168);
    content.setBorder(BorderFactory.createLineBorder(customColor, 10));
    
//   Container contentPane = getContentPane();
//   contentPane.add(content);
//      add(content);
     //replace the window content pane with the content JPanel
      setContentPane(content);

    // Display it
//    pack();
    //make the splash window visible
    setVisible(true);

    // Wait a little while doing nothing, while the application is loading
    try {
    	 Thread.sleep(duration); }
    catch (InterruptedException e) {/*log an error here?*//*e.printStackTrace();*/}
    //destroy the window and release all resources
    dispose(); 
    //You can hide the splash window. The resources will not be released.
    //setVisible(false);
    }
}
