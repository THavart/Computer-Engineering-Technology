/*
 * File name: ClientView.java
 * Author: Taylor Havart-Labrecque, 040 764 885
 * Course: CST8221 - JAP, Lab Section: 302
 * Assignment: 2 Part 2
 * Date: 18-04-2017
 * Professor: Svillen Ranev
 * Purpose: Creates GUI for Client
 * Class list : N/A
 */

package client;

import java.awt.event.*;
import java.awt.*;
import java.io.*;
import java.net.*;
import javax.swing.*;
import javax.swing.border.TitledBorder;

public class ClientView extends JPanel{

	private static final long serialVersionUID = 1L; // serial number for program
        
	private final JTextField connectionField; //connection
	private final JTextField requestField;
	private final JButton connectButton; //Connect Button
	private final JButton sendButton; //Send Button
	private final JLabel host; //Host Label
	private final JLabel port; //Port Label
	private final JTextArea terminal; //Large non-editable text area 
        private final Controller controller = new Controller(); //Manages actionListener events
        private final JComboBox<String> comboPort; 
        
	public ClientView(){
		setLayout(new BorderLayout());// sets layout to Border layout
                setBorder(BorderFactory.createEtchedBorder()); //Creates a small border around the Frame
                
		JPanel portContent = new JPanel(new BorderLayout());
		portContent.setBorder(BorderFactory.createEmptyBorder(4, 2, 2, 2)); // 4px space on the top

		JPanel textcontent = new JPanel(new BorderLayout());
		textcontent.setBorder(BorderFactory.createEmptyBorder(2, 2, 4, 2));// 4px space on the bottom


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Top Content - This Panel holds the Host label and connection text field.		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		JPanel topContent = new JPanel(new FlowLayout(FlowLayout.LEFT));// aligns all components left
		topContent.setBorder(BorderFactory.createEmptyBorder(0, 0, 0, 0)); 
		// will hold host interface
		host = new JLabel("Host:");
		host.setPreferredSize(new Dimension(40, 20));//sets size
		host.setOpaque(true);
		host.setDisplayedMnemonic('H'); // sets mnemonic to H
		host.setToolTipText("Host (Alt-H)"); // mouse hover will show hint
		host.setLabelFor(topContent);
                
		connectionField = new JTextField("localhost");// creates 45 columns
		connectionField.setMargin(new Insets(0,5,0,0));
                connectionField.setCaretPosition(0);//starts cursor before the 'l' of localhost at start of program
		connectionField.setPreferredSize(new Dimension(490, 20)); // sets height to 30px
		connectionField.setMaximumSize(host.getMaximumSize());
		connectionField.setEditable(true); //set as editable
		connectionField.setHorizontalAlignment(SwingConstants.LEFT);
		connectionField.setBackground(Color.WHITE);
                connectionField.setOpaque(true);
		topContent.add(host);
		topContent.add(connectionField);
                
                JPanel setConnection = new JPanel(new BorderLayout());
		setConnection.setBorder(BorderFactory.createTitledBorder(
				BorderFactory.createLineBorder(Color.RED, 10), "CONNECTION"));// creates red border 10px thick and sets title
		setConnection.add(topContent, BorderLayout.NORTH);// adds host interface to north
		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Bottom Content - This Panel holds the Port label and port drop-down menu/text field, as well as the connect button.		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		JPanel bottomContent = new JPanel(new FlowLayout(FlowLayout.LEFT));
		bottomContent.setBorder(BorderFactory.createEmptyBorder(0, 0, 0, 0)); // 2px gaps all around
		//will hold the port interface
		port = new JLabel("Port:");
		port.setPreferredSize(new Dimension(40, 40));
		port.setOpaque(true);
		port.setDisplayedMnemonic('P');
		port.setToolTipText("Port (Alt-P)");
		port.setLabelFor(bottomContent);
		comboPort = new JComboBox<>();//creates a combo box
		comboPort.setPreferredSize(new Dimension(100, 20));//sets size, same as connectButton button
		comboPort.setBackground(Color.WHITE); 
		comboPort.setEditable(true);// can write your own
		comboPort.addItem("");
		comboPort.addItem("8089");
		comboPort.addItem("65001");
		comboPort.addItem("65535");
                comboPort.addActionListener((ActionListener) controller);
		connectButton = new JButton("Connect");
		connectButton.setPreferredSize(new Dimension(100, 20));// sets button size, same as combo box
		connectButton.setBackground(Color.RED); //makes button red
		connectButton.setOpaque(true);
		connectButton.setMnemonic('C'); 
                connectButton.addActionListener(controller);
		//adds port, combobox and connectButton to bottomContent
		bottomContent.add(port);
		bottomContent.add(comboPort);
		bottomContent.add(connectButton);

                setConnection.add(bottomContent, BorderLayout.SOUTH);//adds port interface to south

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Client Panel - Holds request field and send button		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		JPanel client = new JPanel(new FlowLayout(FlowLayout.LEFT));
		//will hold request interface
		requestField = new JTextField("Type a request command"); //sets text on startup
		requestField.setPreferredSize(new Dimension(445, 20)); // sets length and height to be flush with host text field
		requestField.setEditable(true); // set as editable
		requestField.setHorizontalAlignment(SwingConstants.LEFT);
		requestField.setBackground(Color.WHITE); 
		sendButton = new JButton("Send");
		sendButton.setPreferredSize(new Dimension(80, 20));
		sendButton.setEnabled(true);
		sendButton.setOpaque(true);
		sendButton.setMnemonic('S'); 
                sendButton.addActionListener(controller);

		//adds requestField and sendButton to Client
		client.add(requestField); 
		client.add(sendButton);

                JPanel clientRequest = new JPanel (new BorderLayout());
		clientRequest.setBorder(BorderFactory.createTitledBorder(
				BorderFactory.createLineBorder(Color.BLUE, 10), "CLIENT REQUEST"));// creates black border 10px thick and sets title
		clientRequest.add(client);//adds the client panel to the clientRequest panel
                
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Creates a section to hold connection and request interfaces
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		JPanel north = new JPanel(new BorderLayout());
		north.add(setConnection, BorderLayout.NORTH);// sets red border to north
		north.add(clientRequest, BorderLayout.SOUTH);// sets black border to south
		portContent.add(north);// adds north to the higher up portContent layer

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Creates last border, and the large Terminal Text Area
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
                JPanel centerContent = new JPanel(new BorderLayout());
		centerContent.setBorder(BorderFactory.createEmptyBorder(4, 4, 4, 4)); 
		centerContent.setBorder(BorderFactory.createTitledBorder(
                    BorderFactory.createLineBorder(Color.BLACK, 10), "TERMINAL", TitledBorder.CENTER, 0));// centers the title with a 10 px blue border

		terminal = new JTextArea(30, 10);
		terminal.setBorder(BorderFactory.createEmptyBorder(10,10,0,0));
		terminal.setEditable(false); //sets non editable
		JScrollPane scroll; //creates scroll area
                scroll = new JScrollPane(this.terminal);
		centerContent.add(scroll);// adds text area to scroll area
		textcontent.add(centerContent);//adds centerContent to the higher textContent layer
		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Add connection/request panels, and add terminal area to JFrame
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		add(portContent, BorderLayout.NORTH); 
		add(textcontent, BorderLayout.CENTER);
	}
    private class Controller implements ActionListener{

		private Socket clientSocket;
		private ObjectInputStream input;
		private ObjectOutputStream output;


		@Override
		public void actionPerformed(ActionEvent ae){
			if(ae.getActionCommand().equals("Connect")){
				if(comboPort.getSelectedItem() == null || comboPort.getSelectedItem().equals("")){
					return;	// no command no event
				}
				try {
					int port;
                                    port = Integer.parseInt(comboPort.getSelectedItem().toString());
					clientSocket = new Socket(); //creates new socket for user
					clientSocket.connect(new InetSocketAddress(connectionField.getText(), port), 10000);
					clientSocket.setSoTimeout(10000); //sets timeout time to 10 seconds, if no connection has been established the server will stop
					terminal.setText("Connected to " + clientSocket.toString() + "\n");
					input = new ObjectInputStream(clientSocket.getInputStream());
					output = new ObjectOutputStream(clientSocket.getOutputStream());
					connectButton.setEnabled(false); // cannot click button at start of program
					connectButton.setBackground(Color.BLUE);					
					sendButton.setEnabled(true);	
					
				} catch (UnknownHostException e) {
					terminal.setText("CLIENT>ERROR: Unknown host.");
				} catch (IOException e) {
					terminal.setText("CLIENT>ERROR: Connection refused: server is not avaliable. Check port or restart server");
				} catch (NumberFormatException e) {
					terminal.setText("java.lang.NumberFormatException: For input string: "+comboPort.getSelectedItem().toString());
				}// error handling 
			}
				
			if (ae.getActionCommand().equals("Send")) {
				try {
					output.writeObject(requestField.getText());
					String text = input.readObject().toString();
				if (requestField.getText().startsWith("-cls", 0)) {
					terminal.setText("");
				} // block for the sendButton button handling

				else if (requestField.getText().startsWith("-quit", 0)) {
					terminal.setText(terminal.getText() + text + "CLIENT>Connection closed.\n");
					clientSocket.close();
					output.close();
					input.close();
					sendButton.setEnabled(false);
					connectButton.setEnabled(true);
					connectButton.setBackground(Color.RED);
				} // if the command is quit the connection will close

				else {
					terminal.setText(terminal.getText() + text);
				} 
				} catch (IOException | ClassNotFoundException | NullPointerException e) {
					e.printStackTrace(System.out);
				}
			}
		}
	}
}