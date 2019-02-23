/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author t-hla
 */
import java.awt.Dimension;
import java.awt.EventQueue;
import javax.swing.*;
/**
 * Basic Calculator Assignment
 * @author Taylor Havart-Labrecque
 */
public class Calculator {
    public static void main (String[] args){
    CalculatorSplashScreen splashScreen = new CalculatorSplashScreen(5000);
    splashScreen.showSplashScreen();
      EventQueue.invokeLater(new Runnable() {
         @Override
         public void run() {
             JFrame frame = new JFrame();
              CalculatorView pane = new CalculatorView();
             // set up the Close button (X) of the frame
             frame.setTitle("Calculator");
             frame.setMinimumSize(new Dimension(276, 460));
             frame.add(pane);
             frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
             // make the GUI visible
             frame.setLocationByPlatform(true);
             frame.setVisible(true);
         }
     });
   }
}

