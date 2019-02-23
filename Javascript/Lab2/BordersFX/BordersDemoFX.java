/* CST8221-JAP: LAB 02, Borders FX
   File name: BordersDemoFX.java
*/

import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
/**
 This class demonstrates how to create boarders using Java FX CSS.
 StackPane and Label is used for demonstration, but border can be applied to any node and region.
 Since Java 8 a new Border class has been introduced that can be used instead of css styles (see SplashScreenDemoFX).
 For complete Java FX CSS reference visit:
 http://docs.oracle.com/javafx/2/api/javafx/scene/doc-files/cssref.html
 @version 1.17.1
 @author Svillen Ranev
 @since JavaFX 8
*/
public class BordersDemoFX extends Application {
  /**Defines css border style string*/
  private final String cssStyle1 = "-fx-border-color: darkviolet;"
                + "-fx-border-insets: 5;"
                + "-fx-border-width: 5;"
                + "-fx-border-style: dashed;";
  /**Defines css border style string*/
  private final String cssStyle2 ="-fx-border-style: solid line-join bevel;"
                +"-fx-border-color: darkturquoise;"
                + "-fx-border-insets:10.10.10.10;"
                +"-fx-border-width: 5" ;
  /**Defines css border style string*/
  private final String cssStyle3 ="-fx-border-style: dotted;"
                +"-fx-border-color: seagreen;"
                +"-fx-border-insets:10.10.10.10;"
                +"-fx-border-width: 5" ;              
  /**Defines css border style string*/
  private final String cssStyle4 ="-fx-border-color: #ff0000;-fx-border-insets:10.10.10.10;-fx-border-width: 10;-fx-border-radius:5";
  
  @Override // Override the start method in the Application class
  public void start(Stage primaryStage) {
    // Create a border pane - layout manager 
    BorderPane pane = new BorderPane();

    // Place nodes in the pane
    pane.setTop(new CustomPane("Top",cssStyle3)); 
    pane.setRight(new CustomPane("Right",cssStyle1));
    pane.setBottom(new CustomPane("Bottom",cssStyle4));
    pane.setLeft(new CustomPane("Left",cssStyle1));
    pane.setCenter(new CustomPane("Center",cssStyle2)); 
    
    // Create a scene and place it in the stage
    Scene scene = new Scene(pane,400,400);
    primaryStage.setTitle("Border Demo FX CSS"); // Set the stage title
    primaryStage.setScene(scene); // Place the scene in the stage
    primaryStage.show(); // Display the stage
  }


/** 
 * This inner class defines a custom pane to hold a label in the center of the pane.
 */
private class CustomPane extends StackPane {
  public CustomPane(String title,String style) {
    this.setStyle(style);
    this.getChildren().add(new Label(title));
  }
}
/**
   * The main method is only needed for the IDE with limited
   * JavaFX support. Not needed for running from the command line.
     * @param args not used
   */
  public static void main(String[] args) {
   Application.launch(args);
  }
}