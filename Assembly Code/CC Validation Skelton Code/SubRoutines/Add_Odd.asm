; Add_Odd.asm

Add_odd
        ldaa    0,y    ;loads the value of y, at index 0  into accumulator a
        ldab    #$02   ;loads 2 into accumulator b
        mul
        tba
        cmpa    #$09
        bls     lessT9
        bra     moreT9
        
moreT9  adda    #$06
        lsla
        lsla
        lsla
        lsla
        lsra
        lsra
        lsra
        lsra
        inca
        bra     NextNum
        
lessT9  psha

NextNum ldaa    2,y
        ldab    #$02
        mul
        tba
        cmpa    #$09
        bls     less2T9
        bra     more2T9

more2T9 adda    #$06
        lsla
        lsla
        lsla
        lsla
        lsra
        lsra
        lsra
        lsra
        inca
        bra     AddVal

less2T9 psha

AddVal  pula
        pulb
        aba
        daa
        psha
        rts