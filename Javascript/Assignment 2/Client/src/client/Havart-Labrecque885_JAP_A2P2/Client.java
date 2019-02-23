package client;
/*
 * File name: Client.java
 * Author: Taylor Havart-Labrecque, 040 764 885
 * Course: CST8221 - JAP, Lab Section: 302
 * Assignment: 2 Part 2
 * Date: 18-04-2017
 * Professor: Svillen Ranev
 * Purpose: Contains one method main to run the program.
 * Class list : N/A
 */
import java.awt.Dimension;
import java.awt.EventQueue;
import javax.swing.JFrame;


public class Client {

	public static void main(String[] args) {
		EventQueue.invokeLater(() -> {
                    JFrame frame = new JFrame(); // new JFrame set
                    ClientView view = new ClientView(); // Creates object of the ClientView constructor
                    frame.setTitle("Havart-Labrecque Client"); // sets title
                    frame.setMinimumSize(new Dimension(610, 550)); // sets minimum screen size
                    frame.add(view); // adds the GUI on the frame
                    frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); // exits when user closes the program
                    frame.setLocationByPlatform(true); // sets screen position
                    frame.setVisible(true); // user can now see the GUI
                });
	}
}