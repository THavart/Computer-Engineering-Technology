/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


import javax.swing.*;

/**
 *
 * @author t-hla
 */
public class CalculatorApplet extends JApplet {
    
    @Override
    public void init(){
        super.init();
        CalculatorView beepCalcView = new CalculatorView();
        add(beepCalcView);
    }
}
