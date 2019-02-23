; Extract MSB.asm
; Author(s): Taylor Havart-Labrecque
; Student Number(s): 040 764 885
; Date: 17/04/16
;
; Purpose:              Extract the most significant bit.
;
; Preconditions:        <list any hardware that must be initialized, as applicable>
;                       <list any software requirements that must be met before
;                        using this subroutine - e.g. Array to search must be sorted>
;                       <list what must be passed in specific registers in order
;                          to use this subroutine>
;
; Notes:                <list anything that is specific to this subroutine so that
;                         it may be correctly used>
;
; Postcondition:        <list what registers are destroyed>
;                       <list the registers' return values, as applicable>
;
;
; Any internal data or constants are placed BEFORE the subroutine's Access_Label
;
;<Access Label>
        ; Body of SubRoutine
EXTRACT_MSB
        lsra
        lsra
        lsra
        lsra
        rts
; ---------------------------------
;        END of <subroutine name> -
;----------------------------------