CREATE VIEW CustomerPhoneView AS
SELECT	LastName AS CustomerLastName,
		FirstName AS CustomerFirstName,
		('(' + AreaCode + ') ' + PhoneNumber) AS CustomerPhone
FROM CUSTOMER;