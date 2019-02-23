DECLARE
  LASTNAME VARCHAR2(200);
  FIRSTNAME VARCHAR2(200);
  v_Return VARCHAR2(200);
BEGIN
  LASTNAME := NULL;
  FIRSTNAME := NULL;

  v_Return := LASTNAMEFIRST(
    LASTNAME => LASTNAME,
    FIRSTNAME => FIRSTNAME
  );
  /* Legacy output: 
DBMS_OUTPUT.PUT_LINE('v_Return = ' || v_Return);
*/ 
  :v_Return := v_Return;
--rollback; 
END;
