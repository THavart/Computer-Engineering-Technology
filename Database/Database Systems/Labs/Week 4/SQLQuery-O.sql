SELECT LastName,FirstName,Phone
FROM CUSTOMER
JOIN INVOICE
ON TotalAmount > 100.00 AND CustomerID = CustomerNumber
Order By LastName ASC, FirstName DESC;