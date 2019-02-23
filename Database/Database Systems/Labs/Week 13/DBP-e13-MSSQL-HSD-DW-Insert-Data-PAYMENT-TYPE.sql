INSERT INTO PAYMENT_TYPE VALUES(1, 'VISA');
INSERT INTO PAYMENT_TYPE VALUES(2, 'MasterCard');
INSERT INTO PAYMENT_TYPE VALUES(3, 'American Express');
INSERT INTO PAYMENT_TYPE VALUES(4, 'Check');
INSERT INTO PAYMENT_TYPE VALUES(5, 'Cash');


/********************************************************************************/
/*																				*/
/*  HSD-DW PRODUCT_SALES Data PaymentType Data									*/
/*																				*/
/*  PRIMARY KEY = (TimeID, CustomerID, ProductNumber)							*/
/*																				*/
/*																				*/
/********************************************************************************/


/*****   Invoice 35000  - '15-Oct-12' = 41197  'RA@somewhere.com' = 3 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41197
		AND		CustomerID = 3
		AND		ProductNumber = 'VK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41197
		AND		CustomerID = 3
		AND		ProductNumber = 'VB001';


/*****   Invoice 35001  - '25-Oct-12' = 41207  'SB@elsewhere.com' = 4 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41207
		AND		CustomerID = 4
		AND		ProductNumber = 'VK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41207
		AND		CustomerID = 4
		AND		ProductNumber = 'VB001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41207
		AND		CustomerID = 4
		AND		ProductNumber = 'BK001';

/*****   Invoice 35002  - '12-Dec-12' = 41263  'SG@somewhere.com' = 7 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41263
		AND		CustomerID = 7
		AND		ProductNumber = 'VK004';

/*****   Invoice 35003  - '25-Mar-13' = 41358  'SB@elsewhere.com' = 4 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41358
		AND		CustomerID = 4
		AND		ProductNumber = 'VK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41358
		AND		CustomerID = 4
		AND		ProductNumber = 'BK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41358
		AND		CustomerID = 4
		AND		ProductNumber = 'VK004';

/*****   Invoice 35004  - '27-Mar-13' = 41360  'KF@somewhere.com' = 6 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 6
		AND		ProductNumber = 'VK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 6
		AND		ProductNumber = 'BK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 6
		AND		ProductNumber = 'VK003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 6
		AND		ProductNumber = 'VB003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 6
		AND		ProductNumber = 'VK004';

/*****   Invoice 35005  - '27-Mar-13' = 41360  'SG@somewhere.com' = 7 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 7
		AND		ProductNumber = 'BK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 7
		AND		ProductNumber = 'BK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 7
		AND		ProductNumber = 'VK003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41360
		AND		CustomerID = 7
		AND		ProductNumber = 'VK004';

/*****   Invoice 35006  - '31-Mar-13' = 41364  'BP@elsewhere.com' = 9  **********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41364
		AND		CustomerID = 9
		AND		ProductNumber = 'BK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41364
		AND		CustomerID = 9
		AND		ProductNumber = 'VK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41364
		AND		CustomerID = 9
		AND		ProductNumber = 'VB001';

/*****   Invoice 35007  - '03-Apr-13' = 41367  'JT@somewhere.com' = 11 **********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41367
		AND		CustomerID = 11
		AND		ProductNumber = 'VK003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41367
		AND		CustomerID = 11
		AND		ProductNumber = 'VB003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41367
		AND		CustomerID = 11
		AND		ProductNumber = 'VK004';

/*****   Invoice 35008  - '08-Apr-13' = 41372  'SE@elsewhere.com' = 5 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41372
		AND		CustomerID = 5
		AND		ProductNumber = 'BK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41372
		AND		CustomerID = 5
		AND		ProductNumber = 'VK001';
UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41372
		AND		CustomerID = 5
		AND		ProductNumber = 'VB001';

/*****   Invoice 35009  - '08-Apr-13' = 41372  'NJ@somewhere.com' = 1 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41372
		AND		CustomerID = 1
		AND		ProductNumber = 'BK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41372
		AND		CustomerID = 1
		AND		ProductNumber = 'VK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41372
		AND		CustomerID = 1
		AND		ProductNumber = 'VB001';

/*****   Invoice 35010  - '23-Apr-13' = 41387  'RA@somewhere.com' = 3 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41387
		AND		CustomerID = 3
		AND		ProductNumber = 'BK001';

/*****   Invoice 35011  - '07-May-13' = 41401  'BP@elsewhere.com' = 9 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41401
		AND		CustomerID = 9
		AND		ProductNumber = 'VK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41401
		AND		CustomerID = 9
		AND		ProductNumber = 'VB002';

/*****   Invoice 35012  - '21-May-13' = 41415  'SH@elsewhere.com' = 8 ***********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41415
		AND		CustomerID = 8
		AND		ProductNumber = 'VK003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41415
		AND		CustomerID = 8
		AND		ProductNumber = 'VB003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41415
		AND		CustomerID = 8
		AND		ProductNumber = 'VK004';


/********************************************************************************/
/*																				*/
/*   Ralph Able made two purchase on 05-Jun-08.  Since this schema				*/
/*	 in the HSD-DW database	shows product sales summarized for each day		 	*/
/*   - NOT for each sale (Invoice) - the data from these two purchases			*/
/*	 must be combined in a total of all product items Ralph bougt on that day   */
/*																				*/
/*							UNCOMBINED DATA PER INVOICE							*/
/*																				*/
/*****   Invoice 35013  - '05-Jun-13' = 41430  'RA@somewhere.com' = 3 ***********/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35013, 'VK002', 1, 14.95, 14.95);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35013, 'VB002', 1, 7.99, 7.99);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35013, 'BK002', 1, 24.95, 24.95);	*/
/*																				*/
/*****   Invoice 35016  - '05-Jun-13' = 41430  'RA@somewhere.com' = 3 ***********/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VK001', 1, 14.95, 14.95);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VB001', 1, 7.99, 7.99);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VK002', 1, 14.95, 14.95);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VB002', 1, 7.99, 7.99);	*/
/*																				*/
/********************************************************************************/

/*****   Invoice 35013+35016  - '05-Jun-13' = 41430  'RA@somewhere.com' = 3 *****/

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41430
		AND		CustomerID = 3
		AND		ProductNumber = 'VK001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41430
		AND		CustomerID = 3
		AND		ProductNumber = 'VB001';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41430
		AND		CustomerID = 3
		AND		ProductNumber = 'VK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41430
		AND		CustomerID = 3
		AND		ProductNumber = 'VB002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 1
	WHERE		TimeID = 41430
		AND		CustomerID = 3
		AND		ProductNumber = 'BK002';

/*****   Invoice 35014  - '05-Jun-13' = 41430  'JT@somewhere.com' = 11 **********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 11
		AND		ProductNumber = 'VK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 11
		AND		ProductNumber = 'VB002';

/*****   Invoice 35015  - '05-Jun-13' = 41430  'JW@elsewhere.com' = 12 **********/

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 12
		AND		ProductNumber = 'VK002';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 12
		AND		ProductNumber = 'VB003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 12
		AND		ProductNumber = 'VK003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 12
		AND		ProductNumber = 'VK003';

UPDATE PRODUCT_SALES SET PaymentTypeID = 2
	WHERE		TimeID = 41430
		AND		CustomerID = 12
		AND		ProductNumber = 'VK004';


/********************************************************************************/
