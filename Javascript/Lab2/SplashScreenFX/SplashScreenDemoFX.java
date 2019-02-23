/* CST8221-JAP: LAB 02, Application Splash Screen (JavaFX)
   File name: SplashScreenDemoFX.java
*/

import javafx.application.Application;
import javafx.application.Platform;
import javafx.geometry.Pos;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.text.Text;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.Border;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.BorderStroke;
import javafx.scene.layout.BorderStrokeStyle;
import javafx.scene.layout.BorderWidths;
import javafx.scene.layout.CornerRadii;
import javafx.scene.layout.StackPane;
import javafx.scene.paint.Color;
import javafx.scene.text.Font;
import javafx.scene.text.FontPosture;
import javafx.scene.text.FontWeight;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javax.swing.Timer;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
/**
 A simple class demonstrating how to create a simple splash screen in JavaFX.
 For more sophisticated splash screens you should use the Preloader class provided in JavaFX.
 To find how to use the Preloader class visit the link below:
 http://docs.oracle.com/javafx/2/deployment/preloaders.htm
 @version 1.17.1
 @author Svillen Ranev
 @since JavaFX 8.45
*/

public class SplashScreenDemoFX extends Application {
  /**splash screen time interval - application delay */ 
  private final int delay = 5000;
  
  @Override // Override the start method in the Application class
  public void start(Stage primaryStage) {
    
    //Create a layout container
    BorderPane borderPane = new BorderPane();
    //Create the splash screen components
    //Create a splash screen image
    Image splashImage = new Image("DukeAppSplash.gif");
    //Place the image in center of the container
    borderPane.setCenter(new ImageView(splashImage));
    //Create and set the properties of of a label
    Label label = new Label("  Ranev's App Splash Screen Demo FX  ");
    label.setAlignment(Pos.CENTER);
    label.setFont(Font.font("Arial", FontWeight.BOLD, FontPosture.ITALIC, 14));
    //Set a border using the API Border class (new class introduced in Java 8)
    label.setBorder(new Border(new BorderStroke(Color.RED,BorderStrokeStyle.SOLID,new CornerRadii(10),new BorderWidths(2.0) )));
    //Place the label into a container so that it appears in the center
    StackPane stackPane = new StackPane();
    stackPane.getChildren().add(label);
    //Place the container into another container
    borderPane.setBottom(stackPane);
    //Set the container border
    borderPane.setBorder(new Border(new BorderStroke(Color.GREEN,BorderStrokeStyle.SOLID,new CornerRadii(10),new BorderWidths(6.0))));
   
    //Place the container on the scene
    Scene scene = new Scene(borderPane, 545, 295);
    //Create a stage for the splash screen scene
    Stage splashStage = new Stage(); // Create a new stage
    splashStage.setTitle("SplashScreenDemoFX"); // Set the stage title
    splashStage.setScene(scene); // Place the scene in the stage
    splashStage.initStyle(StageStyle.UNDECORATED );
    //Set the application stage
    primaryStage.setTitle("Application Stage"); // Set the stage title
    //Create a parent group for the text
    Group root = new Group();
    //Create a text shape at a specific location (90,100)
    Text appText = new Text(90,100,"Application Stage - JavaFX 8");
    //Set the text color mixing an rgb color (red,green,blue, opacity)
    appText.setFill(Color.rgb(100,100, 255, .50));
    //Set font - let the implementation chose the family type of the font
    appText.setFont(Font.font(null, FontWeight.BOLD,16));
    //Add the text to the group
    root.getChildren().add(appText);
    // Set a scene with a text in the stage
    primaryStage.setScene(new Scene(root, 400, 200));        
    // Display the splash stage
    splashStage.show(); 
    /*The following code makes sure that the stages are displayed in proper order.
      The splash stage is closed after some initial delay and the primary stage is displayed.
      A Timer object is used to provide the delay.
      The delay is 5000 msec (5 sec).
      The Timer object calls the actionPerformed() method of the ActionListener after an initial delay.
      Since the actionPerformed() method executes on the event-dispatch thread
      the code must use Platform.runLater() to execute the JavaFX code on the application thread.
    */
    // create an ActionListener object using an anonymous inner class implementing ActionListener 
    ActionListener listener = new ActionListener (){
      @Override
      public void actionPerformed(ActionEvent e){
       	 //Run the code closing the splash stage and showing the primary stage on the application thread
         //Anonymous inner class implementing Runnable() is used to provide a parameter for runLater()
       	 Platform.runLater(new Runnable(){
           @Override
           public void run() {
            splashStage.close();
            primaryStage.show(); // Display the stage
          }
        }
       );
    }	
   };
   //Create a Timer object
   Timer t = new Timer (delay, listener);
   //make the timer to generate one time event only
   t.setRepeats(false);
   //Start the timer
   t.start();   
  }//end start   
  /**
    The main() method is not required for JavaFX applications 
    when the JAR file for the application is created with the JavaFX Packager tool
    which embeds the JavaFX Launcher in the JAR file.
    The main method is not needed if you launch the application from the command line.
    When you run a JavaFX application without a main() method, the Java Virtual Machine (JVM)
    will use automatically the static launch() method to run the application.
    However, it is useful to include the main() method 
    so you can run the applications that were created without the JavaFX Launcher,
    such as when using an IDE in which the JavaFX tools are not fully integrated. 
    Also, Swing applications that embed JavaFX code require the main() method.
    @param args command line arguments
    */

  public static void main(String[] args) {
   Application.launch(args);
  }
}// end class
