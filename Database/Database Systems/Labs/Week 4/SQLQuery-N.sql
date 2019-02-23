SELECT LastName,FirstName,Phone
FROM CUSTOMER,INVOICE
WHERE TotalAmount > 100.00 AND CustomerID = CustomerNumber
Order By LastName ASC, FirstName DESC;