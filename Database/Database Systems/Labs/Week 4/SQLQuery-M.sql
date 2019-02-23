SELECT DISTINCT LastName,FirstName,Phone
FROM CUSTOMER,INVOICE
WHERE TotalAmount > 100.00 AND CustomerID IN (Select CustomerNumber FROM INVOICE WHERE TotalAmount > 100.00)
Order By LastName ASC, FirstName DESC;