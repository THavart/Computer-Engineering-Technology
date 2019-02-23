; CC_Validation.asm
;
#include C:\68HCS12\registers.inc
;
;
; Author:
; Date:
;
; Purpose:      Credit Card Number Validation

; -- Complete the following equ statements using BINARY values
; Hardware Configuration
DIGIT2_PP1      equ     %1110            ; HEX Display MSB (left most digit)
DIGIT1_PP2      equ     %0111            ; Display LSB (left most digit)
;

; DO NOT CHANGE THE DELAY_VALUE; OTHERWISE THE VALUES WILL INCORRECTLY BE DISPLAYED
; IN THE SIMULATOR
DELAY_VALUE     equ     64              ; HEX Display Multiplexing Delay

; CARD numbers to validate are stored commencing at $1000

                 org $1000

Start_CC_Numbers
#include        CC_Numbers.txt          ; file for program development
                                        ; place a ; in front of first file and
                                        ; remove ; to unmask your lab section's
                                        ; file - that is the one that you
                                        ; will demo for marks.
;#include        16W_WED_12_2_CC_Numbers.txt
;#include        16W_WED_2_4_CC_Numbers.txt
END_CC_Numbers
; --  Start of Do not change the code below here --
;     Place your results here as you loop through your solution
                org  $1030
InvalidResult   ds      1                       ; Count of Invalid CARDs processed
ValidResult     ds      1                       ; Count of Valid CARDs processed
; -- End of Do not change the code below here

                org     $2000
; Using iteration, loop through ALL of the Credit Card numbers to validate them,
; updating InvalidResult and ValidResult each loop. Once all six cards have been
; validated, then you are finished the loop and you can start executing the
; code at label Finished.
;
; -- Your code goes below here

                ldaa    #$00
                staa    InvalidResult
                staa    ValidResult
                lds     #$2000
                ldy     #Start_CC_Numbers
Begin           jsr     Add_Even
                psha
                jsr     Add_Odd
                pulb
                jsr     Validate_CC
                ldab    #$04
                aby
                cpy     #END_CC_Numbers
                bne     Begin

; --  Do not change the code below here --
Finished        jsr     Config_HEX_Displays
Display         ldaa    ValidResult
                ldab    #DIGIT2_PP1             ; select MSB
                jsr     Hex_Display             ; Display the value
                ldaa    #DELAY_VALUE
                jsr     Delay_ms                ; delay for DELAY_VALUE milliseconds
                ldaa    InvalidResult
                ldab    #DIGIT1_PP2             ; select LSB
                jsr     Hex_Display             ; Display the value
                ldaa    #DELAY_VALUE
                jsr     Delay_ms                ; delay for DELAY_VALUE milliseconds
                bra     Display                 ; endless loop


; Filenames without a "C:\68HCS12\Lib\" path MUST be placed in the SOURCE FOLDER
#include SubRoutines\Add_Odd.asm                            ; you write this one
#include SubRoutines\Add_Even.asm                           ; you write this one
#include SubRoutines\Validate_CC.asm                        ; you write this one
#include C:\68HCS12\Lib\Config_HEX_Displays.asm ; provided to you - no changes permitted
#include Hex_Display.asm                         ; provided to you - no changes permitted
#include C:\68HCS12\Lib\Delay_ms.asm            ; Library File    - no changes permitted

                end

************************* No Code Past Here ****************************