

/*
 * File name: CalculatorView.java
 * Author: Taylor Havart-Labrecque
 * Course: CST8221 - JAP, Lab Section: 302
 * Assignment: A1 part1
 * Date: 06/03/17
 * Professor: Svillen Ranev
 * Purpose: contains one constructor to create the GUI,
 * 			and one method for creating and populating the buttons. 
 * Class list : N/A
 */

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;
import javax.swing.border.Border;
import javax.swing.border.LineBorder;

/** CLASS COMMENT
 * The CalculatorView class will create the simple calculator GUI in it's
 * constructor. In the createButton method, the buttons will be created using a
 * for loop.
 * 
 * @author Taylor Havart-Labrecque
 * @version 1.0
 * @see N/A
 * @since 1.8.0_101, Netbeans IDE 8.2
 **/

public class CalculatorView extends JPanel {

	/**
	 * {@value} serialVersionUID: sets the serialized version of the class/program 
	 * {@value} first: represents the first radio button 
	 * {@value} second: represents the second radio button 
	 * {@value} third: represents the third radio button 
	 * {@value} radioButtons: represents the grouping of radio buttons 
	 * {@value} check: represents the checkbox
	 * {@value} equals: represents the "=" button
	 * {@value} clear: represents the "C" button
	 * {@value} back: represents the unicode for the back arrow symbol
	 * 
	 * private JTextField display: variable to display text is the display box
	 * private JLabel error: variable for errors 
	 * private JButton dotBotton: variable used to represent the "." button
	 **/

	private static final long serialVersionUID = 1L; // serial number for program

	private JTextField display; // variable for the display field
	private JLabel error; // variable for the error message
	private JButton dotButton; // variable for the "." button

	private static final String[] BARRAY =
    {"7", "8", "9", "\u002F", 
     "4", "5", "6", "\u002A", 
     "1", "2", "3", "\u002D", 
     "\u2213", "0", "\u2219", "\u002B"};
        
        private JButton[] button = new JButton[BARRAY.length];
	private final JRadioButton first; // sets the first JRadioButton
	private final JRadioButton second; // sets the second JRadioButton
	private final JRadioButton third; // sets the third JRadioButton
	private final ButtonGroup radioButtons; // creates a button group called radioButtons

	private final JCheckBox check; // used for the checkbox

	/**
	 * The CalculatorView constructor will create the calculator GUI
	 **/
	public CalculatorView() {
            
            Controller controller = new Controller();
            /*Modifies the base layout of the Frame*/
		setLayout(new BorderLayout());
		setBorder(BorderFactory.createMatteBorder(5, 5, 5, 5, Color.BLACK)); // creates a matte black border with 5px spaces
			
                // creates a content panel in a border layout 
		JPanel content = new JPanel(new BorderLayout());
		content.setBorder(BorderFactory.createEmptyBorder(0, 0, 0, 0)); 
		content.setBackground(Color.WHITE);
		
                // creates flow layout for radio buttons, background is black
                JPanel topContent = new JPanel();
		topContent.setBorder(BorderFactory.createEmptyBorder(0, 0, 0, 0)); //no gap
		topContent.setBackground(Color.BLACK);
		 
		JPanel top = new JPanel();
		top.setBackground(Color.WHITE);
		// create flow layout for text field, background is white

                JPanel botContent = new JPanel(new BorderLayout());
		botContent.setBorder(BorderFactory.createEmptyBorder(2, 2, 2, 2)); // 2px gaps all around
		botContent.setBackground(Color.BLACK);
		// creates a border layout for a new JPanel object, background is black 
                
		error = new JLabel("F", SwingConstants.CENTER); // sets label to F and centers it
		error.setPreferredSize(new Dimension(25, 25)); // creates a 25x25 px box
		error.setBackground(Color.YELLOW);// background color is set to yellow
		error.setOpaque(true); //sets background to opaque yellow
		top.add(error); // adds competent 

		JPanel text = new JPanel();
		display = new JTextField("0.0", 16); // adds 0.0 to text field and creates 16 columns
		display.setPreferredSize(new Dimension(0, 30)); // sets height to 30px
		display.setEditable(false); // set as non editable
		display.setHorizontalAlignment(SwingConstants.RIGHT);
		display.setBackground(Color.WHITE); 
		text.add(display);
		top.add(display);
		//adds to JPanel

		Border border = new LineBorder(Color.RED, 1); //creates a red border, 1px in thickness
		JButton back = new JButton("\u21D0"); // unicode for back arrow
		back.setForeground(Color.RED); // sets the arrow red
		back.setBorder(border); // sets newly created red border around button
		back.setPreferredSize(new Dimension(25, 25)); // sets button size to 25x25 
		back.setContentAreaFilled(false); // creates clear button
		back.setMnemonic('B'); // pressing alt-B shortcuts to the back arrow
		back.setToolTipText("Backspace (Alt-B)"); // message for user on hover
		back.addActionListener(controller); // displays the action in the text field
		top.add(back); // adds component
		content.add(top, BorderLayout.NORTH); //adds the back button to the North section of GUI 
		
		first = new JRadioButton(".0", false); // first radio button is .0 and is not selected
		first.addActionListener(controller); // displays .0 in text field
		second = new JRadioButton(".00", true); // second radio button is .00 and is selected
		second.addActionListener(controller); // displays .00 in text field by default
		third = new JRadioButton("Sci", false); // third radio button is Sci and is not selected
		third.addActionListener(controller);// displays sci intext field
		first.setBackground(Color.YELLOW);
		second.setBackground(Color.YELLOW);
		third.setBackground(Color.YELLOW);
		add(first); // adds the first button choice
		add(second); // adds the second button choice
		add(third); // adds the third button choice
		radioButtons = new ButtonGroup();
		radioButtons.add(first); // populates the ButtonGroup with the first button
		radioButtons.add(second); // populates the ButtonGroup with the second button
		radioButtons.add(third); // populates the ButtonGroup with the third button.
		
		check = new JCheckBox("Int", false); // creates an Int checkbox
		check.addActionListener(controller); // displays int in text field
		check.setBackground(Color.GREEN); //  button color is green
		check.setAlignmentX(LEFT_ALIGNMENT); 
		radioButtons.add(check); // adds the checkbox to JPanel

                Box boxTop = Box.createHorizontalBox(); // creates a horizontal box to hold components
                
                boxTop.add(check); // adds the check box to top box
		boxTop.add(Box.createHorizontalStrut(20)); // creates 20px space between components
		boxTop.add(first); // adds first radio button to flow layout
		boxTop.add(second); // adds second radio button to flow layout
		boxTop.add(third); // adds third radio button to flow layout

		topContent.add(boxTop); // adds button to the top box

		content.add(topContent, BorderLayout.SOUTH); // sets buttons underneath the text field

		add(content, BorderLayout.NORTH); // adds text field and buttons in the north section of GUI
                
                JButton equals; // used for the equals button
	        JButton clear; // used for the C button
                 
		equals = new JButton("="); // sets final equals to =
		equals.setBackground(Color.YELLOW); // button color is yellow
		equals.addActionListener(controller); // displays = in text field

		clear = new JButton("C"); // sets final clear to C
		clear.setBackground(Color.RED); // button color is red
		clear.addActionListener(controller); // displays C in text field
                
                JPanel clearEqual = new JPanel();
                clearEqual.setLayout(new GridLayout(1,2,2,2));
                equals.setFont(new Font("Default", Font.PLAIN, 25));
                clear.setFont(new Font("Default", Font.PLAIN, 25));
		clearEqual.add(equals); // adds = to right side of GUI
		clearEqual.add(clear); // adds C to left side of GUI
                
                botContent.add(clearEqual, BorderLayout.NORTH);
                
                JPanel gridButtons = new JPanel();
                gridButtons.setLayout(new GridLayout(4,4,2,2));
                for (int i = 0; i < BARRAY.length; i++){
                    if (((i+1) % 4 == 0)&&(i != 0)){
                        button[i] = createButton(BARRAY[i], BARRAY[i], Color.YELLOW, Color.BLUE, controller);
                    gridButtons.add(button[i]);
                    }else{
                        button[i] = createButton(BARRAY[i], BARRAY[i], Color.BLACK, Color.BLUE, controller);
                    gridButtons.add(button[i]);
                    }
                }
                botContent.add(gridButtons, BorderLayout.CENTER);
                
                JButton equals2; // used for the equals button
	        JButton clear2; // used for the C button
                
                equals2 = new JButton("="); // sets final equals to =
		equals2.setBackground(Color.YELLOW); // button color is yellow
		equals2.addActionListener(controller); // displays = in text field
                equals2.setFont(new Font("Default", Font.PLAIN, 25));
                
		clear2 = new JButton("C"); // sets final clear to C
		clear2.setBackground(Color.RED); // button color is red
                clear2.setFont(new Font("Default", Font.PLAIN, 25));
		clear2.addActionListener(controller); // displays C in text field
                
                JPanel equalClear = new JPanel();
                equalClear.setLayout(new GridLayout(1,2,2,2));
                equalClear.add(clear2); // adds C to right side of GUI
		equalClear.add(equals2); // adds = to left side of GUI
                botContent.add(equalClear, BorderLayout.SOUTH);
                add(botContent);	
	}
	private JButton createButton(String text, String ac, Color fg, Color bg, ActionListener handler) {
         
         dotButton = new JButton(text); 
         dotButton.setMargin(new Insets(5,5,5,5));
         
         dotButton.setForeground(fg);
         dotButton.setBackground(bg);
         if (ac != null){
         dotButton.setActionCommand(ac);
         }
         dotButton.setFont(new Font("Default", Font.PLAIN, 25));
         dotButton.setPreferredSize(new Dimension(25,25));
         dotButton.addActionListener(handler);
         
        return dotButton;
        }
	private class Controller implements ActionListener {
            CalculatorModel calculatorModel = new CalculatorModel();
            boolean calculating = false, operational = false, resetFlag = true, operandFlag = true;
            char mode = 3, operation = 0;
		@Override
		public void actionPerformed(ActionEvent ae) {
			String str = ae.getActionCommand(); // gets string for the button clicked
                        String operand1 = " ", operand2 = " ";
                        
                        float result = 0;
                        /*Greys out "." button when Int is selected*/
                        
                        if (calculatorModel.getErrorState() == true){
                            display.setText("--");
				error.setText("E");
				error.setBackground(Color.RED);
                        }
                        
                        
                        if (str.equals("C")){
                            calculatorModel.setOperand("1");
                            calculatorModel.setOperand2("1");
                            calculatorModel.setOperationMode(' ');
                            if (mode == 1){
                            display.setText("0");
                            }else{
                                display.setText("0.0");
                            }
                            resetFlag = true;
                            calculatorModel.setErrorState(false);
                        }
                        if (str.equals("\u21D0")){
                            if (!calculatorModel.getErrorState()){
                            System.out.println("Backspace - length" + display.getText().length());
                            if (display.getText().length() < 1){
                                    if (mode == 1){
                                        display.setText("0");
                                    }
                                    if (mode == 2 || mode == 4){
                                        display.setText("0.0");
                                    }
                                    if (mode == 3){
                                        display.setText("0.00");
                                    }
                            }else{
                            display.setText(display.getText().substring(0, display.getText().length()-1));
                            }
                            }
                        }
                        if (str.equals("Int")){
				button[14].setEnabled(false);
				button[14].setBackground(Color.WHITE);
				calculatorModel.setPrecision(1);
				error.setText("I");
				error.setBackground(Color.GREEN);
                                mode = 1;
                                float temp = Float.parseFloat(display.getText());
                                display.setText(Integer.toString((int)temp));
			}
                        if (str.equals(".0")){
				calculatorModel.setPrecision(2);
				button[14].setEnabled(true);
				button[14].setBackground(Color.BLUE);
				error.setText("F");
				error.setBackground(Color.YELLOW);
                                mode = 2;
			}
                        if (str.equals(".00")){
				calculatorModel.setPrecision(3);
				button[14].setEnabled(true);
				button[14].setBackground(Color.BLUE);
				error.setText("F");
				error.setBackground(Color.YELLOW);
                                mode = 3;
			}
                        if (str.equals("Sci")){
                            calculatorModel.setPrecision(4);
                            button[14].setEnabled(true);
			    button[14].setBackground(Color.BLUE);
			    error.setText("F");
			    error.setBackground(Color.YELLOW);
                            mode = 4;
                        }
                        if (str.equals("\u2213")){
                            if (!calculatorModel.getErrorState()){
                            float temp = Float.parseFloat(display.getText());
                            temp *= -1;
                            if (mode == 1){
                                display.setText(Integer.toString((int)temp));
                                }else{
                                display.setText(Float.toString(temp));
                                }
                            resetFlag = true;
                            }
                        }
                        if (str.equals("\u2219"))
                        {
                            display.setText(display.getText() + ".");
                        }
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////                      
                        /*if the number is between 0 and 9 display it*/
    if (str.equals("0")||str.equals("1")||str.equals ("2")||str.equals("3")||str.equals("4")||str.equals("5")||str.equals("6")||str.equals("7")||str.equals("8")||str.equals("9")){
        if (!calculatorModel.getErrorState()){
            if (resetFlag == true){
                display.setText(str);
                resetFlag = false;
            }else if (resetFlag == false){
                display.setText(display.getText() + str);
            }
        }
    }
        /*If an operation is pressed*/
        if ((str.equals("\u002B")||str.equals("\u002D")||str.equals("\u002F")||str.equals("\u002A"))){
            /*and the current text is a number*/
            if ('0' <= display.getText().charAt(0) && display.getText().charAt(0) <= '9'){
                /*Set operand1*/
                calculatorModel.setOperand(display.getText());
                operandFlag = true;
                /*Set Operation and Mode*/
                calculatorModel.setOperationMode(str.charAt(0));
                resetFlag = true;
            }
        }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////        
                /*If the equal button is pressed*/
                if (str.equals("=")){
                    if (!calculatorModel.getErrorState()){
                        /*Set the second operand*/
                        calculatorModel.setOperand2(display.getText());
                        display.setText(calculatorModel.getResult());
                        resetFlag = true;
                    }
                }
            }
	}
    }
