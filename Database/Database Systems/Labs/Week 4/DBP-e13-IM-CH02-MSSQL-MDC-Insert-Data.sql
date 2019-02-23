/********************************************************************************/
/*																				*/
/*	Kroenke and Auer - Database Processing (13th Edition) Chapter 02			*/
/*																				*/
/*	Marcia's Dry Cleaning [MDC-CH02] Project Insert Data						*/
/*																				*/
/*	Microsoft SQL Server 2008 R2 / 2012 code solutions							*/
/*																				*/
/********************************************************************************/

/*****  CUSTOMER Data   *********************************************************/

INSERT INTO CUSTOMER VALUES(
		'Nikki', 'Kaccaton', '723-543-1233', 'Nikki.Kaccaton@somewhere.com');
INSERT INTO CUSTOMER VALUES(
		'Brenda', 'Catnazaro', '723-543-2344', 'Brenda.Catnazaro@somewhere.com');
INSERT INTO CUSTOMER VALUES(
		'Bruce', 'LeCat', '723-543-3455', 'Bruce.LeCat@somewhere.com');
INSERT INTO CUSTOMER VALUES(
		'Betsy', 'Miller', '725-654-3211', 'Betsy.Miller@somewhere.com');
INSERT INTO CUSTOMER VALUES(
		'George', 'Miller', '725-654-4322', 'George.Miller@somewhere.com');
INSERT INTO CUSTOMER VALUES(
		'Kathy', 'Miller', '723-514-9877', 'Kathy.Miller@somewhere.com');
INSERT INTO CUSTOMER VALUES(
		'Betsy', 'Miller', '723-514-8766', 'Betsy.Miller@elsewhere.com');



/*****  INVOICE Data   ************************************************************/

INSERT INTO INVOICE VALUES(
		2013001, 1, '04-Oct-13', '06-Oct-13', 158.50);
INSERT INTO INVOICE VALUES(
		2013002, 2, '04-Oct-13', '06-Oct-13', 25.00);
INSERT INTO INVOICE VALUES(
		2013003, 1, '06-Oct-13', '08-Oct-13', 49.00);
INSERT INTO INVOICE VALUES(
		2013004, 4, '06-Oct-13', '08-Oct-13', 17.50);
INSERT INTO INVOICE VALUES(
		2013005, 6, '07-Oct-13', '11-Oct-13', 12.00);
INSERT INTO INVOICE VALUES(
		2013006, 3, '11-Oct-13', '13-Oct-13', 152.50);
INSERT INTO INVOICE VALUES(
		2013007, 3, '11-Oct-13', '13-Oct-13', 7.00);
INSERT INTO INVOICE VALUES(
		2013008, 7, '12-Oct-13', '14-Oct-13', 140.50);
INSERT INTO INVOICE VALUES(
		2013009, 5, '12-Oct-13', '14-Oct-13', 27.00);


/*****  INVOICE_ITEM Data   ********************************************************/

INSERT INTO INVOICE_ITEM VALUES(2013001, 1, 'Blouse', 2,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2013001, 2, 'Dress Shirt', 5,  2.50);
INSERT INTO INVOICE_ITEM VALUES(2013001, 3, 'Formal Gown', 2, 10.00);
INSERT INTO INVOICE_ITEM VALUES(2013001, 4, 'Slacks–Mens', 10, 5.00);
INSERT INTO INVOICE_ITEM VALUES(2013001, 5, 'Slacks–Womens', 10, 6.00);
INSERT INTO INVOICE_ITEM VALUES(2013001, 6, 'Suit–Mens', 1,  9.00);
INSERT INTO INVOICE_ITEM VALUES(2013002, 1, 'Dress Shirt', 10, 2.50);
INSERT INTO INVOICE_ITEM VALUES(2013003, 1, 'Slacks–Mens', 5,  5.00);
INSERT INTO INVOICE_ITEM VALUES(2013003, 2, 'Slacks–Womens', 4,  6.00);
INSERT INTO INVOICE_ITEM VALUES(2013004, 1, 'Dress Shirt', 7,  2.50);
INSERT INTO INVOICE_ITEM VALUES(2013005, 1, 'Blouse', 2,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2013005, 2, 'Dress Shirt', 2,  2.50);
INSERT INTO INVOICE_ITEM VALUES(2013006, 1, 'Blouse', 5,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2013006, 2, 'Dress Shirt', 10, 2.50);
INSERT INTO INVOICE_ITEM VALUES(2013006, 3, 'Slacks–Mens', 10, 5.00);
INSERT INTO INVOICE_ITEM VALUES(2013006, 4, 'Slacks–Womens', 10, 6.00);
INSERT INTO INVOICE_ITEM VALUES(2013007, 1, 'Blouse', 2,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2013008, 1, 'Blouse', 3,  3.50);
INSERT INTO INVOICE_ITEM VALUES(2013008, 2, 'Dress Shirt', 12, 2.50);
INSERT INTO INVOICE_ITEM VALUES(2013008, 3, 'Slacks–Mens', 8,  5.00);
INSERT INTO INVOICE_ITEM VALUES(2013008, 4, 'Slacks–Womens', 10, 6.00);
INSERT INTO INVOICE_ITEM VALUES(2013009, 1, 'Suit–Mens', 3,  9.00);


/*********************************************************************************/


