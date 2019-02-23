/*  CST8221-JAP: LAB 04
    File name: BasePane.java 
    Original source: Intro to Java Programming by Y. Liang, 10ed
    Modified by S. Ranev
*/
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.stage.Stage;
import javafx.geometry.Pos;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.text.Text;

 
/**
 * This class represents a custom pane with border layout. It is used as a superclass in all Lab 4 examples.
 * @version 1.17.1
 * @author S. Ranev
 * @since JavaFX 2.0
 */
public class BasePane extends Application {
  /** Displayed text */
  protected Text text;
  /**
   * Creates a custom pane.
   * @param textContent displayed text
   * @return custom pane
   */
  protected BorderPane getPane(String textContent) {
    text = new Text(50, 50,textContent );
    HBox paneForButtons = new HBox(20);
    Button leftButton = new Button("Move Left"); 
    Button rightButton = new Button("Move Right");
    Button centerButton = new Button("Center");  
    paneForButtons.getChildren().addAll(leftButton,centerButton, rightButton);
    paneForButtons.setAlignment(Pos.CENTER);
    paneForButtons.setStyle("-fx-border-color: blue;-fx-color: blue");

    BorderPane pane = new BorderPane();
    pane.setBottom(paneForButtons);
    Pane paneForText = new Pane();
    paneForText.setStyle("-fx-background-color: white");
    paneForText.getChildren().add(text);
    pane.setCenter(paneForText);
   //register an event handler using anonymous local inner class 
    leftButton.setOnAction(new EventHandler<ActionEvent>() {
            @Override public void handle(ActionEvent e) {
               text.setX(text.getX() - 10);  
            }
        });
   // the code above converted to lambda expression
   // leftButton.setOnAction(e -> text.setX(text.getX() - 10));
    centerButton.setOnAction(e -> text.setX((paneForText.getWidth()-textContent.length()*9)/2));
    rightButton.setOnAction(e -> text.setX(text.getX() + 10));
    
    return pane;
  }
  
 @Override // Override the start method in the Application class
  public void start(Stage primaryStage) {};
 /* For test purpouses only
  @Override // Override the start method in the Application class
  public void start(Stage primaryStage) {
    // Create a scene and place it in the stage
    Scene scene = new Scene(getPane("Programming with JavaFX"), 450, 200);
    primaryStage.setTitle("BaseDemo"); // Set the stage title
    primaryStage.setScene(scene); // Place the scene in the stage
    primaryStage.show(); // Display the stage
  }
*/
  /**
   * The main method is only needed for the IDE with limited
   * JavaFX support. Not needed for running from the command line.
   */
 /*
  public static void main(String[] args) {
    launch(args);
  }
 */
}
