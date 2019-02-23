package midterm;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseEvent;
import java.io.File;
import java.io.FileWriter;
import java.util.Scanner;
import static javax.swing.BorderFactory.createRaisedBevelBorder;
import static javax.swing.Box.createHorizontalGlue;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JPanel;
import javax.swing.JPopupMenu;
import javax.swing.JTextArea;
import javax.swing.JToolBar;
import javax.swing.KeyStroke;

public class Midterm extends JFrame implements ActionListener
{
  private JMenuItem newItem;
  private JMenuItem openItem;
  private JMenuItem saveItem;
  private JMenuItem exitItem;
  private JPopupMenu popup;
  private JToolBar toolBar;
  private static final String newline = "\r\n";
  private JTextArea edit;
  private JFileChooser fileChooser;
  private JLabel status;
  
  public Midterm() {
    setTitle("Taylor Havart-Labrecque");
    
    JMenuBar localJMenuBar = new JMenuBar();
    
    localJMenuBar.setBorder(createRaisedBevelBorder());
    
    setJMenuBar(localJMenuBar);
    

    JMenu localJMenu1 = new JMenu("File");
    localJMenu1.setMnemonic('F');
    

    newItem = new JMenuItem("New");
    newItem.setAccelerator(
      KeyStroke.getKeyStroke(78, 2));
    
    openItem = new JMenuItem("Open");
    openItem.setAccelerator(
      KeyStroke.getKeyStroke(79, 2));
    
    saveItem = new JMenuItem("Save");
    saveItem
      .setAccelerator(KeyStroke.getKeyStroke(83, 128));
    

    exitItem = new JMenuItem("Exit");
    exitItem
      .setAccelerator(KeyStroke.getKeyStroke(115, 512));
    localJMenuBar.add(makeMenu(localJMenu1, new Object[] { newItem, null, openItem, saveItem, null, exitItem }, this));
    
    JMenu localJMenu2 = new JMenu("Edit");
    localJMenu2.setMnemonic('E');
    localJMenuBar.add(makeMenu(localJMenu2, new Object[] { "Cut", "Copy", "Paste" }, this));
   
    JMenu localJMenu3 = new JMenu("Help");
    localJMenu3.setMnemonic('H');
    localJMenuBar.add(createHorizontalGlue());
    localJMenuBar.add(makeMenu(localJMenu3, new Object[] { new JMenuItem("About", 65) }, this));
   
    popup = makePopupMenu(new Object[] { "Cut", "Copy", "Paste" }, this);
   
    JPanel localJPanel = createEditPanel();
    edit.addMouseListener(new java.awt.event.MouseAdapter()
    {

      public void mouseReleased(MouseEvent paramAnonymousMouseEvent)
      {
        if (paramAnonymousMouseEvent.isPopupTrigger()) {
          popup.show(paramAnonymousMouseEvent.getComponent(), paramAnonymousMouseEvent
            .getX(), paramAnonymousMouseEvent.getY());
        }
        
      }
    });
    edit.addMouseListener(new java.awt.event.MouseAdapter()
    {

      public void mousePressed(MouseEvent paramAnonymousMouseEvent)
      {
        if (paramAnonymousMouseEvent.isPopupTrigger()) {
          popup.show(paramAnonymousMouseEvent.getComponent(), paramAnonymousMouseEvent
            .getX(), paramAnonymousMouseEvent.getY());
        }
      }
    });
    add(localJPanel, "Center");
    toolBar = createToolBar();
    
    add(toolBar, "After");
  }
  
  public void actionPerformed(ActionEvent paramActionEvent)
  {
    String str = paramActionEvent.getActionCommand();
    


    int i = 0;
    
    File localFile;
    if (str.equals("Open")) {
      i = fileChooser.showOpenDialog(null);
      
      if (i == 0) {
        localFile = fileChooser.getSelectedFile();
        
        loadFile(localFile);
        status.setText("Status: File " + ((localFile != null) && 
          (localFile.exists()) ? localFile.getName() + " is open." : new StringBuilder().append(localFile.getName()).append(" does not exist.").toString()));
      }
      else {
        status.setText("Status: Open operation is cancelled.");
      }
      edit.setCaretPosition(0);

    }
    else if (str.equals("Save"))
    {
      i = fileChooser.showSaveDialog(this);
      if (i == 0) {
        localFile = fileChooser.getSelectedFile();
        
        saveFile(localFile);
        status.setText("Status: File " + localFile.getName() + " is saved");
      }
      else {
        status.setText("Status: Save operation is cancelled.");
      }
    }
    if (str.equals("About")) {
      javax.swing.JOptionPane.showMessageDialog(this, "Svillen Ranev's Program Editor\nVersion 1.17.1.303_W17", "About Midterm Test", 1);
    }
    

    if (str.equals("Exit")) {
      dispose();
      System.exit(0);
    }
    if ((str.equals("Copy")) || (str.equals("Cut")) || (str.equals("Paste"))) {
      status.setText("Status: " + str + " menu item has been selected.");
    }
    if (str.equals("New")) {
      edit.setText("");
      edit.setCaretPosition(0);
      status.setText("Status: " + str + " empty file.");
    }
  }
  


  public void loadFile(File paramFile)
  {
    edit.setText("");
    try {
      Scanner localScanner = new Scanner(new java.io.FileReader(paramFile));
      while (localScanner.hasNextLine())
        edit.append(localScanner.nextLine() + "\r\n");
      localScanner.close();
    }
    catch (java.io.IOException localIOException) {
      status.setText("Status: Open operation unsuccessful.");
    }
  }
  



  public void saveFile(File paramFile)
  {
    String str = edit.getText();
    
    try
    {
      FileWriter localFileWriter = new FileWriter(paramFile);
      localFileWriter.write(str.toCharArray(), 0, str.length());
      localFileWriter.close();
    }
    catch (java.io.IOException localIOException)
    {
      status.setText("Status: Save operation unsuccessful.");
    }
  }
  

  public JMenu makeMenu(Object paramObject1, Object[] paramArrayOfObject, Object paramObject2)
  {
    JMenu localJMenu = null;
    if ((paramObject1 instanceof JMenu)) {
      localJMenu = (JMenu)paramObject1;
    } else if ((paramObject1 instanceof String)) {
      localJMenu = new JMenu((String)paramObject1);
    } else {
      return null;
    }
    for (int i = 0; i < paramArrayOfObject.length; i++) {
      if (paramArrayOfObject[i] == null) {
        localJMenu.addSeparator();
      } else {
        localJMenu.add(makeMenuItem(paramArrayOfObject[i], paramObject2));
      }
    }
    return localJMenu;
  }
  
  public JMenuItem makeMenuItem(Object paramObject1, Object paramObject2)
  {
    JMenuItem localJMenuItem = null;
    if ((paramObject1 instanceof String)) {
      localJMenuItem = new JMenuItem((String)paramObject1);
    } else if ((paramObject1 instanceof JMenuItem))
      localJMenuItem = (JMenuItem)paramObject1; else {
      return null;
    }
    if ((paramObject2 instanceof java.awt.event.ActionListener))
      localJMenuItem.addActionListener((java.awt.event.ActionListener)paramObject2);
    return localJMenuItem;
  }
  
  public JPopupMenu makePopupMenu(Object[] paramArrayOfObject, Object paramObject)
  {
    JPopupMenu localJPopupMenu = new JPopupMenu();
    for (int i = 0; i < paramArrayOfObject.length; i++) {
      if (paramArrayOfObject[i] == null) {
        localJPopupMenu.addSeparator();
      } else {
        localJPopupMenu.add(makeMenuItem(paramArrayOfObject[i], paramObject));
      }
    }
    return localJPopupMenu;
  }
  
  public JPanel createEditPanel()
  {
    JPanel localJPanel = new JPanel(new java.awt.BorderLayout());
    
    edit = new JTextArea(80, 80);
    edit.setMargin(new java.awt.Insets(9, 9, 12, 12));
    edit.setFont(new java.awt.Font("Monospaced", 0, 15));
    
    javax.swing.JScrollPane localJScrollPane = new javax.swing.JScrollPane(edit);
    

    fileChooser = new JFileChooser();
    
    fileChooser.setCurrentDirectory(new File("."));
    
    javax.swing.filechooser.FileNameExtensionFilter localFileNameExtensionFilter = new javax.swing.filechooser.FileNameExtensionFilter("Text files (.txt)", new String[] { "txt" });
    fileChooser.addChoosableFileFilter(localFileNameExtensionFilter);
    localFileNameExtensionFilter = new javax.swing.filechooser.FileNameExtensionFilter("Java files (.class)", new String[] { "class" });
    fileChooser.addChoosableFileFilter(localFileNameExtensionFilter);
    localFileNameExtensionFilter = new javax.swing.filechooser.FileNameExtensionFilter("Java files (.java)", new String[] { "java" });
    fileChooser.addChoosableFileFilter(localFileNameExtensionFilter);
    
    fileChooser.setFileFilter(localFileNameExtensionFilter);
    
    fileChooser.setAcceptAllFileFilterUsed(false);
  
    status = new JLabel();
    
    localJPanel.add(localJScrollPane, "Center");
    localJPanel.add(status, "South");
    return localJPanel;
  }
  
  public JToolBar createToolBar() {
    Midterm.ColorAction localColorAction1 = new Midterm.ColorAction("S", Color.WHITE, new Integer(83), "Standard View");
    
    Midterm.ColorAction localColorAction2 = new Midterm.ColorAction("B", Color.BLUE, new Integer(66), "Background Blue");
    
    Midterm.ColorAction localColorAction3 = new Midterm.ColorAction("O", Color.ORANGE, new Integer(79), "Background Orange");
    
    JToolBar localJToolBar = new JToolBar("Background", 1);
    localJToolBar.setBorderPainted(true);
    


    localJToolBar.addSeparator();
    
    localJToolBar.add(new javax.swing.JToolBar.Separator(new Dimension(10, 10)));
    localJToolBar.add(localColorAction1);
    localJToolBar.add(new javax.swing.JToolBar.Separator(new Dimension(10, 10)));
    localJToolBar.add(localColorAction2);
    localJToolBar.add(new javax.swing.JToolBar.Separator(new Dimension(10, 10)));
    
    localJToolBar.add(localColorAction3);
    

    return localJToolBar;
  }
  
  private class ColorAction extends javax.swing.AbstractAction {
    public ColorAction(String paramString1, Color paramColor, Integer paramInteger, String paramString2) {
      putValue("Name", paramString1);
      putValue("ActionCommandKey", paramString1);
      
      putValue("ShortDescription", paramString2);
      putValue("MnemonicKey", paramInteger);
      putValue("Color", paramColor);
    }
    
    public void actionPerformed(ActionEvent paramActionEvent)
    {
      String str = paramActionEvent.getActionCommand();
      

      Color localColor = (Color)getValue("Color");
      edit.setBackground(localColor);
      
      if ((localColor.equals(Color.WHITE)) || (localColor == Color.BLUE)) {
        edit.setForeground(Color.BLACK);
      } else
        edit.setForeground(Color.WHITE);
      edit.requestFocusInWindow();
    }
  }
  

  public static void main(String[] paramArrayOfString)
  {
    javax.swing.SwingUtilities.invokeLater(new Runnable() {
      public void run() {
        Midterm localMidtermTest = new Midterm();
        localMidtermTest.setDefaultCloseOperation(3);
        localMidtermTest.setMinimumSize(new Dimension(1000, 700));
        localMidtermTest.setVisible(true);
      }
    });
  }
}
