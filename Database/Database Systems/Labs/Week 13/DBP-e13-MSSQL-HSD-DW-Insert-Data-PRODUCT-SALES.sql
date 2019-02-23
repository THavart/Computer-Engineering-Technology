/********************************************************************************/
/*																				*/
/*	Kroenke and Auer - Database Processing (13th Edition) Chapter 12			*/
/*																				*/
/*	Heather Sweeny Designs Data Warehouse Database Insert Data					*/
/*																				*/
/*  HSD-DW PRODUCT_SALES Data													*/
/*																				*/
/*  PRIMARY KEY = (TimeID, CustomerID, ProductNumber)							*/
/*																				*/
/*	These are the Microsoft SQL Server 2008R2/2012 SQL code solutions			*/
/*																				*/
/*  Date Range for DBP-e12: 2010-2011											*/
/*  Date Range for DBP-e13: 2012-2013											*/
/*																				*/
/********************************************************************************/


/*****   Invoice 35000  - '15-Oct-12' = 41197  'Ralph.Able@somewhere.com' = 3 ***/
INSERT INTO PRODUCT_SALES VALUES(41197, 3, 'VK001', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41197, 3, 'VB001', 1, 7.99, 7.99);

/*****   Invoice 35001  - '25-Oct-12' = 41207  'Susan.Baker@elsewhere.com' = 4 **/
INSERT INTO PRODUCT_SALES VALUES(41207, 4, 'VK001', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41207, 4, 'VB001', 1, 7.99, 7.99);
INSERT INTO PRODUCT_SALES VALUES(41207, 4, 'BK001', 1, 24.95, 24.95);

/*****   Invoice 35002  - '20-Dec-12' = 41263  'Sally.George@somewhere.com' = 7 */
INSERT INTO PRODUCT_SALES VALUES(41263, 7, 'VK004', 1, 24.95, 24.95);

/*****   Invoice 35003  - '25-Mar-13' = 41358  'Susan.Baker@elsewhere.com' = 4 **/
INSERT INTO PRODUCT_SALES VALUES(41358, 4, 'VK002', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41358, 4, 'BK002', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41358, 4, 'VK004', 1, 24.95, 24.95);

/*****   Invoice 35004  - '27-Mar-13' = 41360  'Kathy.Foxtrot@somewhere.com' = 6 */
INSERT INTO PRODUCT_SALES VALUES(41360, 6, 'VK002', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41360, 6, 'BK002', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41360, 6, 'VK003', 1, 19.95, 19.95);
INSERT INTO PRODUCT_SALES VALUES(41360, 6, 'VB003', 1, 9.99, 9.99);
INSERT INTO PRODUCT_SALES VALUES(41360, 6, 'VK004', 1, 24.95, 24.95);

/*****   Invoice 35005  - '27-Mar-13' = 41360  'Sally.George@somewhere.com' = 7 */
INSERT INTO PRODUCT_SALES VALUES(41360, 7, 'BK001', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41360, 7, 'BK002', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41360, 7, 'VK003', 1, 19.95, 19.95);
INSERT INTO PRODUCT_SALES VALUES(41360, 7, 'VK004', 1, 24.95, 24.95);

/*****   Invoice 35006  - '31-Mar-13' = 41364  'Bobbi.Pearson@elsewhere.com' = 9 */
INSERT INTO PRODUCT_SALES VALUES(41364, 9, 'BK001', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41364, 9, 'VK001', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41364, 9, 'VB001', 1, 7.99, 7.99);

/*****   Invoice 35007  - '03-Apr-13' = 41367  'Jenny.Tyler@somewhere.com' = 11 */
INSERT INTO PRODUCT_SALES VALUES(41367, 11, 'VK003', 2, 19.95, 39.90);
INSERT INTO PRODUCT_SALES VALUES(41367, 11, 'VB003', 2, 9.99, 19.98);
INSERT INTO PRODUCT_SALES VALUES(41367, 11, 'VK004', 2, 24.95, 49.90);

/*****   Invoice 35008  - '08-Apr-13' = 41372  'Sam.Eagleton@elsewhere.com' = 5 */
INSERT INTO PRODUCT_SALES VALUES(41372, 5, 'BK001', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41372, 5, 'VK001', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41372, 5, 'VB001', 1, 7.99, 7.99);

/*****   Invoice 35009  - '08-Apr-13' = 41372  'Nancy.Jacobs@somewhere.com' = 1 */
INSERT INTO PRODUCT_SALES VALUES(41372, 1, 'BK001', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41372, 1, 'VK001', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41372, 1, 'VB001', 1, 7.99, 7.99);

/*****   Invoice 35010  - '23-Apr-13' = 41387  'Ralph.Able@somewhere.com' = 3 ***/
INSERT INTO PRODUCT_SALES VALUES(41387, 3, 'BK001', 1, 24.95, 24.95);

/*****   Invoice 35011  - '07-May-13' = 41401  'Bobbi.Pearson@elsewhere.com' = 9 */
INSERT INTO PRODUCT_SALES VALUES(41401, 9, 'VK002', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41401, 9, 'VB002', 1, 7.99, 7.99);

/*****   Invoice 35012  - '21-May-13' = 41415  'Shawn.Hullett@elsewhere.com' = 8 */
INSERT INTO PRODUCT_SALES VALUES(41415, 8, 'VK003', 1, 19.95, 19.95);
INSERT INTO PRODUCT_SALES VALUES(41415, 8, 'VB003', 1, 9.99, 9.99);
INSERT INTO PRODUCT_SALES VALUES(41415, 8, 'VK004', 1, 24.95, 24.95);

/********************************************************************************/
/*																				*/
/*   Ralph Able made two purchase on 05-Jun-13.  Since this schema				*/
/*	 in the HSD-DW database	shows product sales summarized for each day		 	*/
/*   - NOT for each sale (Invoice) - the data from these two purchases			*/
/*	 must be combined in a total of all product items Ralph bougt on that day   */
/*																				*/
/*							UNCOMBINED DATA PER INVOICE							*/
/*																				*/
/*****   Invoice 35013  - '05-Jun-13' = 41430  'Ralph.Able@somewhere.com' = 3 ***/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35013, 'VK002', 1, 14.95, 14.95);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35013, 'VB002', 1, 7.99, 7.99);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35013, 'BK002', 1, 24.95, 24.95);	*/
/*																				*/
/*****   Invoice 35016  - '05-Jun-13' = 41430  'Ralph.Able@somewhere.com' = 3 ***/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VK001', 1, 14.95, 14.95);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VB001', 1, 7.99, 7.99);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VK002', 1, 14.95, 14.95);	*/
/* INSERT INTO PRODUCT_SALES VALUES(41430, 3, 35016, 'VB002', 1, 7.99, 7.99);	*/
/*																				*/
/********************************************************************************/

/*****   Invoice 35013+35016  - '05-Jun-13' = 41430  'Ralph.Able@somewhere.com' = 3 */
INSERT INTO PRODUCT_SALES VALUES(41430, 3, 'VK001', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41430, 3, 'VB001', 1, 7.99, 7.99);
INSERT INTO PRODUCT_SALES VALUES(41430, 3, 'VK002', 2, 14.95, 29.90);
INSERT INTO PRODUCT_SALES VALUES(41430, 3, 'VB002', 2, 7.99, 15.98);
INSERT INTO PRODUCT_SALES VALUES(41430, 3, 'BK002', 1, 24.95, 24.95);

/*****   Invoice 35014  - '05-Jun-13' = 41430  'Jenny.Tyler@somewhere.com' = 11 */
INSERT INTO PRODUCT_SALES VALUES(41430, 11, 'VK002', 2, 14.95, 29.90);
INSERT INTO PRODUCT_SALES VALUES(41430, 11, 'VB002', 2, 7.99, 15.98);

/*****   Invoice 35015  - '05-Jun-13' = 41430  'Joan.Wayne@elsewhere.com' = 12 **/
INSERT INTO PRODUCT_SALES VALUES(41430, 12, 'VK002', 1, 14.95, 14.95);
INSERT INTO PRODUCT_SALES VALUES(41430, 12, 'BK002', 1, 24.95, 24.95);
INSERT INTO PRODUCT_SALES VALUES(41430, 12, 'VK003', 1, 19.95, 19.95);
INSERT INTO PRODUCT_SALES VALUES(41430, 12, 'VB003', 1, 9.99, 9.99);
INSERT INTO PRODUCT_SALES VALUES(41430, 12, 'VK004', 1, 24.95, 24.95);


/********************************************************************************/
