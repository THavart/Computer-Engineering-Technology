package editor;
/* CST8221 – JAP, Midterm Test, Part 2
* Student Name and Student Number: Taylor Havart-Labrecque 040 764 885
* Date: 15/03/17 - 4:54
* Development platform: Windows 10
* Development tool: Netbeans IDE 8.2
* Java SDK version: 1.8.0_112
*/
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;
import javax.swing.*;
import static javax.swing.Box.createHorizontalGlue;
import static javax.swing.JFrame.EXIT_ON_CLOSE;
import javax.swing.text.DefaultEditorKit;


public class Editor extends JFrame implements ActionListener
{
 private static final long serialVersionUID = 3810761338269038999L;
    private JMenuItem newItem;
    private JMenuItem openItem;
    private JMenuItem saveItem;
    private JMenuItem exitItem;
      private JTextArea edit;   
      private JLabel status;
    private JFileChooser fileChooser;
    private JToolBar toolbar;
      
      public Editor(){
         setTitle("Taylor Havart-Labrecque");
         setLayout(new BorderLayout());
          
      edit = new JTextArea(80,80);
      edit.setMargin(new Insets(9,9,12,12));
      edit.setFont(new Font("Monospaced", 0, 15));
      
      JScrollPane scroller = new JScrollPane(edit);
      setContentPane(scroller);
      
      setDefaultCloseOperation(EXIT_ON_CLOSE);
      JMenuBar bar = new JMenuBar();
      setJMenuBar(bar);
      bar.setBorder(BorderFactory.createRaisedBevelBorder());
      setSize(1000,700);
      
      /*Menu Object Creation*/
      JMenu fileMenu = new JMenu("File");
      fileMenu.setMnemonic('F');
      
       /*File Menu Creation*/
        newItem = new JMenuItem("New");
        newItem.setAccelerator(
      KeyStroke.getKeyStroke(78, 2));
        newItem.addActionListener(this);
     fileMenu.add(newItem);
        openItem = new JMenuItem("Open");
        openItem.setAccelerator(
      KeyStroke.getKeyStroke(79, 2));
        openItem.addActionListener(this);
     fileMenu.add(openItem);
        saveItem = new JMenuItem("Save");
        saveItem
      .setAccelerator(KeyStroke.getKeyStroke(83, 128));
        saveItem.addActionListener(this);
     fileMenu.add(saveItem);
        exitItem = new JMenuItem("Exit");
        exitItem
      .setAccelerator(KeyStroke.getKeyStroke(115, 512));
        exitItem.addActionListener(this);
    fileMenu.add(exitItem);
    bar.add(fileMenu);
    
    /*Edit Menu creation*/
      JMenu editMenu = new JMenu("Edit");
      editMenu.setMnemonic('E');
      
      Action cutAction = new DefaultEditorKit.CutAction();
      cutAction.putValue(Action.NAME, "Cut");
      editMenu.add(cutAction);

      Action copyAction = new DefaultEditorKit.CopyAction();
      copyAction.putValue(Action.NAME, "Copy");
      editMenu.add(copyAction);

      Action pasteAction = new DefaultEditorKit.PasteAction();
      pasteAction.putValue(Action.NAME, "Paste");
      editMenu.add(pasteAction);
      bar.add(editMenu);
      
      /*Help Menu Creation*/
      JMenu helpMenu = new JMenu("Help");
      helpMenu.setMnemonic('H');
      JMenuItem about = new JMenuItem("About");
      about.addActionListener(this);
      about.setMnemonic('A');
      helpMenu.add(about);
      bar.add(createHorizontalGlue());
      bar.add(helpMenu);
   }

    @Override
    public void actionPerformed(ActionEvent ev)
  {
      String str = ev.getActionCommand();
    if (str.equals("About")) {
      JOptionPane.showMessageDialog(this, "Taylor Havart-Labrecque's Program Editor\nVersion 1.0_W17", "About Midterm Test", 1);
    }
    if (str.equals("Exit")) {
      dispose();
      System.exit(0);
        }
    }
     
    public void loadFile(File file)
  {
    edit.setText("");
    try {
      Scanner localScanner = new Scanner(new FileReader(file));
      while (localScanner.hasNextLine())
        edit.append(localScanner.nextLine() + "\r\n");
      localScanner.close();
    }
    catch (IOException localIOException) {
      status.setText("Status: Open operation unsuccessful.");
    }
  }
     public void saveFile(File file)
  {
    String str = edit.getText();
    
    try
    {
      FileWriter localFileWriter = new FileWriter(file);
      localFileWriter.write(str.toCharArray(), 0, str.length());
      localFileWriter.close();
    }
    catch (java.io.IOException localIOException)
    {
      status.setText("Status: Save operation unsuccessful.");
    }
  }
      public static void main(String[] args)
  {
    SwingUtilities.invokeLater(new Runnable() {
      public void run() {
        Editor editor = new Editor();
        editor.setDefaultCloseOperation(3);
        editor.setMinimumSize(new Dimension(1000, 700));
        editor.setVisible(true);
      }
    });
  }
}