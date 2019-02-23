SELECT DISTINCT LastName, FirstName, Phone, DateIn, DateOut
FROM CUSTOMER, INVOICE
WHERE TotalAmount > 100
AND CUSTOMER.CustomerID = INVOICE.CustomerNumber;