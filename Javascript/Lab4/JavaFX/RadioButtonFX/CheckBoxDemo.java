/*  CST8221-JAP: LAB 04
    File name: CheckBoxDemo.java
    Original source: Intro to Java Programming by Y. Liang, 10ed
    Modified by S. Ranev
*/

import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.CheckBox;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontPosture;
import javafx.scene.text.FontWeight;
import javafx.stage.Stage;
/**
 * This class demonstrates how to create and use check box UI controls.
 * @author S. Ranev
 * @version 1.17.1
 * @since JavaFX 8
 * @see BasePane
 */
public class CheckBoxDemo extends BasePane{
  @Override // Override the getPane() method in the super class
  protected BorderPane getPane(String textContent) {
    BorderPane pane = super.getPane(textContent);

    Font fontBoldItalic = Font.font("Times New Roman", 
      FontWeight.BOLD, FontPosture.ITALIC, 20);
    Font fontBold = Font.font("Times New Roman", 
      FontWeight.BOLD, FontPosture.REGULAR, 20);
    Font fontItalic = Font.font("Times New Roman", 
      FontWeight.NORMAL, FontPosture.ITALIC, 20);
    Font fontNormal = Font.font("Times New Roman", 
      FontWeight.NORMAL, FontPosture.REGULAR, 20);
    
    text.setFont(fontNormal);
    
    VBox paneForCheckBoxes = new VBox(20);
    paneForCheckBoxes.setPadding(new Insets(5, 5, 5, 5)); 
    paneForCheckBoxes.setStyle("-fx-border-color: green");
    CheckBox chkBold = new CheckBox("Bold");
    CheckBox chkItalic = new CheckBox("Italic");
    paneForCheckBoxes.getChildren().addAll(chkBold, chkItalic);
    pane.setRight(paneForCheckBoxes);

    EventHandler<ActionEvent> handler = e -> { 
      if (chkBold.isSelected() && chkItalic.isSelected()) {
        text.setFont(fontBoldItalic); // Both check boxes checked
      }
      else if (chkBold.isSelected()) {
        text.setFont(fontBold); // The Bold check box checked
      }
      else if (chkItalic.isSelected()) {
        text.setFont(fontItalic); // The Italic check box checked
      }      
      else {
        text.setFont(fontNormal); // Both check boxes unchecked
      }
    };
    
    chkBold.setOnAction(handler);
    chkItalic.setOnAction(handler);
    
    return pane; // Return a new pane
  }
  
  @Override // Override the start method in the Application class
  public void start(Stage primaryStage) {
    // Create a scene and place it in the stage
    Scene scene = new Scene(getPane("Programming with JavaFX"), 450, 200);
    primaryStage.setTitle("Check Box Demo"); // Set the stage title
    primaryStage.setScene(scene); // Place the scene in the stage
    primaryStage.show(); // Display the stage
  }
  
  /**
   * The main method is only needed for the IDE with limited
   * JavaFX support. Not needed for running from the command line.
   */
  public static void main(String[] args) {
    launch(args);
  }
}
