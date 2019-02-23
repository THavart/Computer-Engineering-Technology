SELECT LastName,FirstName,Phone
FROM CUSTOMER,INVOICE,INVOICE_ITEM
WHERE CustomerID = CustomerNumber AND Item = 'Dress Shirt' AND INVOICE.InvoiceNumber = INVOICE_ITEM.InvoiceNumber
ORDER BY LastName ASC, FirstName DESC;