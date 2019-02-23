CREATE TRIGGER CIV_ChangeCustomerName 
     ON dbo.CustomerInterestsView 
	 INSTEAD OF UPDATE 

AS 
BEGIN 
	SET NOCOUNT ON; 
	DECLARE @NewCustomerLastName AS Char(25), @OldCustomerLastName AS Char(25)
	--Get values of new and old names. 
	SELECT @NewCustomerLastName = CustomerLastName 
	FROM inserted;

	SELECT @OldCustomerLastName = CustomerLastName
	FROM deleted; 

	-- Count number of synonyms is CUSTOMER. 
	SELECT * 
	FROM dbo.CUSTOMER AS C1 
	WHERE C1.LastName = @OldCustomerLastName 
		AND EXISTS 
			(SELECT * 
			FROM dbo.CUSTOMER AS C2 
			WHERE C1.LastName = C2.LastName 
			AND C1.CustomerID <> C2.CustomerID); 

	IF(@@rowCount = 0) 
	-- The Customer name is unique. 
	-- Update the Cusotmer record. 
	BEGIN 
		UPDATE dbo.CUSTOMER 
		SET LastName = @NewCustomerLastName  
		WHERE LastName = @OldCustomerLastName 
		-- Print update message. 
		PRINT '**********************************'
		PRINT '' 
		PRINT 'The Customer name has been changed.' 
		PRINT '' 
		PRINT 'Former Customer Last Name = ' +@OldCustomerLastName 
		PRINT '' 
		PRINT 'Upddated. Customer Last Name = ' +@NewCustomerLastName 
		PRINT '**********************************************************'
		 END 
	ELSE 
	-- The Customer name is not unique. 
	-- Rollback the transaction and send message. 
	BEGIN 
		PRINT '***************************'
		PRINT '' 
		PRINT 'Transaction canceled.'
		PRINT '' 
		PRINT 'Customer Last Name = '+@NewCustomerLastName 
		PRINT '' 
		PRINT 'The customer name is not unique.'
		PRINT '' 
		PRINT '*************************************************'
	END 
END  

