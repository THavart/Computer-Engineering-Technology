CREATE PROCEDURE InsertCustomerWithTransaction 
@NewCustomerLastName Char(25), 
@NewCustomerFirstName Char(25), 
@NewCustomerAreaCode Char(3), 
@NewCustomerPhoneNumber Char(8), 
@NewCustomerEmail Varchar(100), 
@ArtistLastName Char(25), 
@WorkTitle Char(35), 
@WorkCopy Char(12), 
@TransSalesPrice Numeric(8, 2) 
AS 
DECLARE 
@RowCount AS Int, 
@ArtistID AS Int, 
@CustomerID AS Int, 
@WorkID AS Int, @TransactionID AS Int 
-- Check to see if Customer already exist in database 
SELECT @RowCount = COUNT(*) 
FROM dbo.CUSTOMER 
WHERE LastName = @NewCustomerLastName 
AND FirstName = @NewCustomerFirstName 
AND AreaCode = @NewCustomerAreaCode 
AND PhoneNumber = @NewCustomerPhoneNumber 
AND Email = @NewCustomerEmail 
-- IF @RowCount > 0 THEN Customer already exists, 
IF (@RowCount > 0) 
BEGIN 
PRINT '*****************************************************' 
PRINT '' 
PRINT ' The Customer is already in the database. ' 
PRINT '' 
PRINT ' Customer Last Name = '+@NewCustomerLastName 
PRINT ' Customer First Name = '+@NewCustomerFirstName 
PRINT '' 
PRINT '*****************************************************' 
RETURN 
END 
-- IF @RowCount = 0 THEN Customer does not exist in database. 
ELSE -- Start transaction – Rollback everything if unab_e to complete it. 
BEGIN TRANSACTION 
-- Insert new Customer data. 
INSERT INTO dbo.CUSTOMER 
(LastName, FirstName, AreaCode, PhoneNumber, Email) 
VALUES( @NewCustomerLastName, @NewCustomerFirstName, 
@NewCustomerAreaCode, @NewCustomerPhoneNumber, @NewCustomerEmail) 
-- Get new CustomerID surrogate key value. 
SELECT @CustomerID = CustomerID 
FROM dbo.CUSTOMER 
WHERE LastName = @NewCustomerLastName 
AND FirstName = @NewCustomerFirstName 
AND AreaCode = @NewCustomerAreaCode 
AND PhoneNumber = @NewCustomerPhoneNumber 
AND Email = @NewCustomerEmail 
-- Get ArtistID surrogate key value, check for validity. 
SELECT @ArtistID = ArtistID 
FROM dbo.ARTIST 
WHERE LastName = @ArtistLastName 
IF @ArtistID IS NULL 
BEGIN 
PRINT '*****************************************************' 
PRINT '' 
PRINT ' Invalid ArtistID ' 
PRINT '' 
PRINT '*****************************************************' 
ROLLBACK TRANSACTION 
RETURN 
END 
-- Get WorkID surrogate key value, check for validity. 
SELECT @WorkID = WorkID 
FROM dbo.WORK 
WHERE ArtistID = @ArtistID 
AND Title = @WorkTitle 
AND Copy = @WorkCopy 
IF @WorkID IS NULL 
BEGIN 
PRINT '*****************************************************' 
PRINT '' 
PRINT ' Invalid WorkID' 
PRINT '' 
PRINT '*****************************************************' 
ROLLBACK TRANSACTION 
RETURN 
END 
-- Get TransID surrogate key value, check for validity. 
SELECT @TransactionID = TransactionID 
FROM dbo.TRANS 
WHERE WorkID = @WorkID 
AND SalesPrice = NULL 
IF @TransactionID IS NULL 
BEGIN 
PRINT '*****************************************************' 
PRINT '' 
PRINT ' Invalid TransactionID ' 
PRINT '' 
PRINT '*****************************************************' 
ROLLBACK TRANSACTION 
RETURN 
END 
-- All surrogate key values of OK, complete the transaction 
BEGIN -- Update TRANS row 
UPDATE dbo.TRANS 
SET DateSold = GETDATE(), 
SalesPrice = @TransSalesPrice, 
CustomerID = @CustomerID 
WHERE TransactionID = @TransactionID 
-- Create CUSTOMER_ARTIST_INT row 
INSERT INTO dbo.CUSTOMER_ARTIST_INT 
(CustomerID, ArtistID) 
VALUES(@CustomerID, @ArtistID) 
END 
-- Commit the Transaction 
COMMIT TRANSACTION 
-- The transaction is completed. Print output 
BEGIN 
-- Print Customer results. 
PRINT '*****************************************************' 
PRINT '' 
PRINT ' The new Customer is now in the database. ' 
PRINT '' 
PRINT ' Customer Last Name = '+@NewCustomerLastName 
PRINT ' Customer First Name = '+@NewCustomerFirstName 
PRINT '' 
PRINT '*****************************************************' 
-- Print Transaction result 
PRINT '' 
PRINT ' Transaction complete. ' 
PRINT '' 
PRINT ' TransactionID = '+CONVERT(Char(6), @TransactionID) 
PRINT ' ArtistID = '+CONVERT(Char(6), @ArtistID) 
PRINT ' WorkID = '+CONVERT(Char(6), @WorkID) 
PRINT ' Sales Price = '+CONVERT(Char(12), @TransSalesPrice) 
PRINT '' PRINT '*****************************************************' 
-- Print CUSTOMER_ARTIST_INT update 
PRINT '' 
PRINT ' New CUSTOMER_ARTIST_INT row added. ' 
PRINT '' 
PRINT ' ArtistID = '+CONVERT(Char(6), @ArtistID) 
PRINT ' CustomerID = '+CONVERT(Char(6), @CustomerID) 
PRINT '' 
PRINT '*****************************************************' 
END 
-- ***** End of stored procedure InsertCustomerWithTransaction ***** 

