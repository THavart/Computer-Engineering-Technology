SELECT LastName,FirstName,Phone
FROM CUSTOMER JOIN INVOICE ON CustomerID = CustomerNumber 
JOIN INVOICE_ITEM ON Item = 'Dress Shirt' 
AND INVOICE.InvoiceNumber = INVOICE_ITEM.InvoiceNumber
ORDER BY LastName ASC, FirstName DESC;