SELECT LastName, FirstName, Phone
FROM CUSTOMER JOIN INVOICE
ON CUSTOMER.CustomerID = INVOICE.CustomerNumber
WHERE INVOICE.InvoiceNumber IN
(SELECT InvoiceNumber
FROM INVOICE_ITEM
WHERE Item = 'Dress Shirt')
ORDER BY LastName, FirstName DESC;