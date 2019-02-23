CREATE TRIGGER TRANS_CheckIsproblemAccount 
ON dbo.TRANS 
FOR UPDATE 
AS 
BEGIN 
DECLARE 
@TransactionID AS Int, 
@CustomerID AS Int, 
@isProblemAccount AS Bit 
SELECT 
@TransactionID = TransactionID, 
@CustomerID = CustomerID 
FROM inserted; 
/* This trigger will fire for every update of TRANS. 
* This includes updates without a Customer participating, 
* such as an update of AskingPrice using the 
* TRANS_AfterInsertSetAskingPrice tigger. 
* Therefore, make sure there is a Customer particpating 
* in the Update of TRANS/ */ 
-- Check if Customer ID is NULL and if so RETURN. 
--Do not ROLLBACK the transaction, just don't complete this trigger. 
IF (@CustomerID IS NULL) RETURN 
-- Valid CustomerID. 
--Obtain value of @isProblemAcocunt. 
SELECT @isProblemAccount = isProblemAccount 
FROM dbo.CUSTOMER AS C 
WHERE C.CustomerID = @CustomerID; 
IF (@isProblemAccount = 1) 
--This is a problem account, 
-- Rollback the transaction and send message. 
BEGIN 
ROLLBACK TRANSACTION 
PRINT '*************************'
PRINT '' 
PRINT 'Transaction canceled.'
PRINT '' 
PRINT 'CustomerID = '+CONVERT(Char(6), @CustomerID) 
PRINT '' 
PRINT 'Refer customer to the manager immediately.'
PRINT '' 
PRINT '*******************************************************'
RETURN 
END 
ELSE 
--This is a good account 
--Let the transaction stand. 
BEGIN 
PRINT '************************************'
PRINT '' 
PRINT 'Transaction complete.'
PRINT 'TransactionID = '+CONVERT(Char(6), @TransactionID) 
PRINT 'CustomerID = '+CONVERT(Char(6), @CustomerID) 
PRINT '' 
PRINT 'Thank the customer for their business.'
PRINT '' 
END 
END 

