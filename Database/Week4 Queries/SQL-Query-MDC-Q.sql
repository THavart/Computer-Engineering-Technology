SELECT LastName, FirstName, Phone
FROM CUSTOMER, INVOICE, INVOICE_ITEM
WHERE CUSTOMER.CustomerID = INVOICE.CustomerNumber
AND INVOICE.InvoiceNumber = INVOICE_ITEM.InvoiceNumber
AND INVOICE_ITEM.Item = 'Dress Shirt'
ORDER BY LastName, FirstName DESC;