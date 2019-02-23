SELECT LastName, FirstName, Phone
FROM CUSTOMER
WHERE CustomerID IN
(SELECT CustomerNumber
FROM INVOICE
WHERE InvoiceNumber IN
(SELECT InvoiceNumber
FROM INVOICE_ITEM
WHERE Item = 'Dress Shirt'))
ORDER BY LastName, FirstName DESC;