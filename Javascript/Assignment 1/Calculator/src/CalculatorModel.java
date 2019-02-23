
public class CalculatorModel {
    private String operand1;
    private String operand2;
    private char operation;
    private int precision;
    private float result;
    private boolean errorState;
    
    public CalculatorModel(){
        operand1 = "1";
        operand2 = "1";
        operation = ' ';
        precision = 3;
        result = 0;
        errorState = false;
    }
    void setOperand(String operand1){
        this.operand1 = operand1;
    }
    void setOperand2(String operand2){
        this.operand2 = operand2;
    }
    void setOperationMode(char operation){
        this.operation = operation;
    }
    /*if have one and +-/* store*/
    void setPrecision(int precision){
        this.precision = precision;
    }
    boolean getErrorState(){
        return errorState;
    }
    void setErrorState(boolean errorState){
        this.errorState = errorState; 
    }
    String getResult(){
        String returnValue = " ";
       if (precision == 1){
            returnValue = String.format("%d", (long)calculate());
            return returnValue;
        }
        if (precision == 2){
            returnValue = String.format("%.1f", calculate());
            return returnValue;
        }
           if (precision == 3){
            returnValue = String.format("%.2f", calculate());
            return returnValue;
        }
           if (precision == 4){
               returnValue = String.format("%.6E", calculate());
               return returnValue;
           }
        return returnValue;
    }
    /*first operand signal is operation, second is equal*/
/*call getResult for calculate();*/
    float calculate(){
        float oper1 = Float.parseFloat(operand1), oper2 = Float.parseFloat(operand2);
       if (operation == '\u002B'){
            result = oper1 + oper2;
            return result;
       }
       if (operation == '\u002D'){
           result = oper1 - oper2;
           return result;
       }
       if (operation == '\u002A'){
           result = oper1*oper2;
           return result;
       }
       if (operation == '\u002F'){
           if (oper2 == 0){
               errorState = true;
               return result;
           }
           result = oper1/oper2;
           return result;
       }
        return result;
    }
}