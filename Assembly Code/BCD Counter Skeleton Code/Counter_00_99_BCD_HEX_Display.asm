; Counter_00_99_BCD_HEX_Display.asm

#include C:\68hcs12\registers.inc

; Author:
; Course:
; S/N:
; Date:
;
; Purpose
;
; Program Constants
STACK   	equ     $2000
LASTBCD 	equ     $99             ; Last BCD number to count to...

                                           ; Port P (PPT) Display Selection Values
DIGIT3_PP0      equ      %00001110         ; Left-most display MSB
DIGIT2_PP1      equ      %00001101         ; 2nd from left-most display LSB

; Delay Subroutine Value
DVALUE  	equ     #250            ; Delay value (base 10) 0 - 255 ms
                                	; 125 = 1/8 second
        	org     $2000           ; program code
Start   	lds     #STACK          ; stack location
; Configure the Ports
        	jsr     Config_HEX_Displays
; Continually Count $00 - $99...$00 - $99 BCD

Reset   	ldaa    #$00            ; Setting count to 0
Continue        psha                    ; Push A to the Stack
		jsr     Extract_MSB     ; Gets Most Significant Bit
                ldab    #DIGIT3_PP0
                jsr     Hex_Display
                ldaa    #DVALUE         ; Delay
                jsr     Delay_ms
                pula                    ; Pulls A off the Stack
                psha                    ; Puts it back, to original location (Stack pointer)
                jsr     Extract_LSB     ; Gets Least Significant Bit
                ldab    #DIGIT2_PP1
                jsr     Hex_Display
                ldaa    #DVALUE
                jsr     Delay_ms
                pula
                inca
                daa
                cmpa    #LASTBCD
                bls     Continue           ; Branch if less than or equal keep going
                bhi     Reset              ; If it greater reset
                
; (DO NOT CHANGE ANY OF THE FOLLOWING LINES OF CODE)

; Subroutines used by program - these files are in same folder as the source code
#include Extract_MSB.asm        ; you write this one
#include Extract_LSB.asm        ; you write this one
#include Hex_Display.asm        ; provided to you - no changes permitted

; Library Subroutines used by program
#include C:\68HCS12\Lib\Config_HEX_Displays.asm ; provided to you - no changes permitted
#include C:\68HCS12\Lib\Delay_ms.asm            ; provided to you - no changes permitted

        end