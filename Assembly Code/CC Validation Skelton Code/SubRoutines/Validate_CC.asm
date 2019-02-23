; Validate_CC.asm
Validate_CC

        aba
        daa
        ldab    #$00
        ldx     #$1000
        idiv
        cmpa    #$00
        beq     Valid
        bra     Invalid
        
Valid   ldaa	ValidResult
        inca
        staa	ValidResult
        rts


Invalid ldaa	InvalidResult
        inca
        staa	InvalidResult
	rts