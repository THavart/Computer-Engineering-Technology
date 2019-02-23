/* CST8221-JAP: LAB 01, Example 6SFXCSS
   File name: FXMLDocumentController.java
*/
 
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;

/**
 * This class implements the controller responsible
 * for handling the GUI events.
 *
 * @author Svillen Ranev
 * @version 1.17.1
 * @since JavaFX 8.0
 */  
public class FXMLDocumentController implements Initializable {
 
    @FXML private Label label;
          private boolean again;
    @FXML
    private void handleButtonAction(ActionEvent event) {
      if(!again){
       label.setText("Why did you do that?");
       again = true;
      }else{
       label.setText("Not Again!!!");
       again=false;
      }
    }
 
    @FXML
    private void exitApp(){
       System.exit(1);
    }
 
    @Override
    public void initialize(URL url, ResourceBundle rb) {
 
    }    
 
}
