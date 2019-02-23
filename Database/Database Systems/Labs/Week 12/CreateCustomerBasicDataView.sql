CREATE VIEW CustomerBasicDataView AS
SELECT LastName AS CustomerLastName,
	   FirstName AS CustomerFirstName,
	   AreaCode, PhoneNumber
FROM   CUSTOMER;