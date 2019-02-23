CREATE VIEW CustomerBasicDataWAView AS 
SELECT LastName AS CustomerLastName, 
	   FirstName AS CustomerFirstName, 
	   AreaCode, PhoneNumber 
FROM CUSTOMER 
WHERE State='WA';