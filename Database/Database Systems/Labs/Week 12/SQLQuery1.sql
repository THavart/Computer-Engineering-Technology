select * from customer;

UPDATE TRANS

	SET DateSold = '11/18/2015',
		SalesPrice = 475.00,
		CustomerID = 1057
	Where TransactionID = 229;