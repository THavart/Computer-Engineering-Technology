/*  CST8221-JAP: LAB 04
    File name: RadioButtonDemoFX.java
    Original source: Intro to Java Programming by Y. Liang, 10ed
    Modified by S. Ranev
*/

import static javafx.application.Application.launch;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.RadioButton;
import javafx.scene.control.ToggleGroup;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.VBox;
import javafx.scene.paint.Color;
import javafx.stage.Stage;
/**
 * This class demonstrates how to create and use radio button UI controls.
 * @author S. Ranev
 * @version 1.17.1
 * @since JavaFX 8
 * @see BasePane, CheckBoxDemo
 */
public class RadioButtonDemoFX extends CheckBoxDemo {
  @Override // Override the getPane() method in the super class
  protected BorderPane getPane(String textContent) {
    BorderPane pane = super.getPane(textContent);
    
    VBox paneForRadioButtons = new VBox(20);
    paneForRadioButtons.setPadding(new Insets(5, 5, 5, 5)); 
    paneForRadioButtons.setStyle("-fx-border-color: green");
    paneForRadioButtons.setStyle
      ("-fx-border-width: 2px; -fx-border-color: green");
    RadioButton rbRed = new RadioButton("Red");
    RadioButton rbGreen = new RadioButton("Green");
    RadioButton rbBlue = new RadioButton("Blue");
    paneForRadioButtons.getChildren().addAll(rbRed, rbGreen, rbBlue);
    pane.setLeft(paneForRadioButtons);

    ToggleGroup group = new ToggleGroup();
    rbRed.setToggleGroup(group);
    rbGreen.setToggleGroup(group);
    rbBlue.setToggleGroup(group);
    
    rbRed.setOnAction(e -> {
      if (rbRed.isSelected()) {
        text.setFill(Color.RED);
      }
    });
    
    rbGreen.setOnAction(e -> {
      if (rbGreen.isSelected()) {
        text.setFill(Color.GREEN);
      }
    });

    rbBlue.setOnAction(e -> {
      if (rbBlue.isSelected()) {
        text.setFill(Color.BLUE);
      }
    });
    
    return pane;
  }
 @Override // Override the start method in the Application class
  public void start(Stage primaryStage) {
    // Create a scene and place it in the stage
    Scene scene = new Scene(getPane("Programming with JavaFX"), 450, 200);
    primaryStage.setTitle("Radio Button Demo"); // Set the stage title
    primaryStage.setScene(scene); // Place the scene in the stage
    primaryStage.show(); // Display the stage
  }
  /**
   * The main method is only needed for the IDE with limited
   * JavaFX support. Not needed for running from the command line.
   * @param args Not used
   */
  public static void main(String[] args) {
    launch(args);
  }
}
