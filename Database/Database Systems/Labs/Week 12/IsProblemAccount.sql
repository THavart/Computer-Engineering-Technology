-- Add column isProblemAccount to CUSTOMER
/* *** SQL-ALTER-TABLE-CH10A-01 *** */
ALTER TABLE dbo.CUSTOMER
ADD isProblemAccount	Bit	NULL DEFAULT '0';
-- Set initial column values for CUSTOMER.isProblemAccount
/* *** SQL-UPDATE-CH10A-01 *** */
UPDATE	dbo.CUSTOMER
SET		isProblemAccount = 0;
-- Set column value for Melinda Gliddens
/* *** SQL-UPDATE-CH10A-02 *** */
UPDATE	dbo.CUSTOMER
SET		isProblemAccount = 1
WHERE	LastName= 'Gliddens'
	AND	FirstName= 'Melinda';
-- Check CUSTOMER.isProblemAccount column values
/* *** SQL-Query-CH10A-06 *** */
SELECT	CustomerID, LastName, FirstName, isProblemAccount
FROM	dbo.CUSTOMER;