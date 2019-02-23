CREATE VIEW CustomerPhoneView AS
SELECT
LastName AS CustomerLastName,
FirstName AS CustomerFirstName,
CONCAT('(',AreaCode,') ',PhoneNumber) As CustomerPhone
FROM
CUSTOMER;