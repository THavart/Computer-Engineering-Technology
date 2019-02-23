Select LastName,FirstName,Phone,DateIn,DateOut From CUSTOMER,INVOICE
where TotalAmount > 100.00 AND CustomerNumber = CustomerID;    /*D*/