/******************************************************************************/
/*																				                                    */
/*	Kroenke and Auer - Database Processing (13th Edition)                			*/
/*																				                                    */
/*	The Queen Anne Curiousity Shop Database Create Tables		           				*/
/*																				                                    */
/*	These are the Oracle Database 11g Release 2 SQL code solutions	          */
/*																				                                    */
/******************************************************************************/

/*****   CUSTOMER DATA   ******************************************************/

/*****   The first 6 items are based on data in Figures in Chapter 02 *********/

INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Shire', 'Robert', '6225 Evanston Ave N', 'Seattle', 'WA', '98103',
	'206-524-2433', 'Robert.Shire@somewhere.com');
  
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Goodyear', 'Katherine', '7335 11th Ave NE', 'Seattle', 'WA', '98105',
	'206-524-3544', 'Katherine.Goodyear@somewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Bancroft', 'Chris', '12605 NE 6th Street', 'Bellevue', 'WA', '98005',
	'425-635-9788', 'Chris.Bancroft@somewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Griffith', 'John', '335 Aloha Street', 'Seattle', 'WA', '98109',
	'206-524-4655', 'John.Griffith@somewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Tierney', 'Doris', '14510 NE 4th Street', 'Bellevue', 'WA', '98005',
	'425-635-8677', 'Doris.Tierney@somewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Anderson', 'Donna', '1410 Hillcrest Parkway', 'Mt. Vernon', 'WA', '98273',
	'360-538-7566', 'Donna.Anderson@elsewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Svane', 'Jack', '3211 42nd Street', 'Seattle', 'WA', '98115',
	'206-524-5766', 'Jack.Svane@somewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Walsh', 'Denesha', '6712 24th Avenue NE', 'Redmond', 'WA', '98053',
	'425-635-7566', 'Denesha.Walsh@somewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Enquist', 'Craig', '534 15th Street', 'Bellingham', 'WA', '98225',
	'360-538-6455', 'Craig.Enquist@elsewhere.com');
INSERT INTO CUSTOMER VALUES (seqCID.NextVal, 
	'Anderson', 'Rose', '6823 17th Ave NE', 'Seattle', 'WA', '98105',
	'206-524-6877', 'Rose.Anderson@elsewhere.com');
  
COMMIT;


/*****   EMPLOYEE DATA   ******************************************************/

/*****   The first ZERO items are based on data in Figures in Chapter 02 ******/

INSERT INTO EMPLOYEE
  VALUES(seqEID.NextVal, 'Stuart', 'Anne', '206-527-0010', 'Anne.Stuart@QACS.com');
INSERT INTO EMPLOYEE
  VALUES(seqEID.NextVal, 'Stuart', 'George', '206-527-0011', 'George.Stuart@QACS.com');
INSERT INTO EMPLOYEE
  VALUES(seqEID.NextVal, 'Stuart', 'Mary', '206-527-0012', 'Mary.Stuart@QACS.com');
INSERT INTO EMPLOYEE
  VALUES(seqEID.NextVal, 'Orange', 'William', '206-527-0013', 'William.Orange@QACS.com');
INSERT INTO EMPLOYEE
  VALUES(seqEID.NextVal, 'Griffith', 'John', '206-527-0014', 'John.Griffith@QACS.com');
  
COMMIT;


/*****   VENDOR DATA   ********************************************************/

/*****   The first 6 items are based on data in Figures in Chapter 02 *********/

INSERT INTO VENDOR
   VALUES(seqVID.NextVal, 
	'Linens and Things', 'Huntington', 'Anne', '1515 NW Market Street',
	'Seattle', 'WA', '98107', '206-325-6755', '206-329-9675', 'LAT@business.com');
INSERT INTO VENDOR
   VALUES(seqVID.NextVal,
	'European Specialties', 'Tadema', 'Ken', '6123 15th Avenue NW',
  'Seattle', 'WA', '98107', '206-325-7866', '206-329-9786', 'ES@business.com');
INSERT INTO VENDOR
   VALUES(seqVID.NextVal,
	'Lamps and Lighting', 'Swanson', 'Sally', '506 Prospect Street',
  'Seattle', 'WA', '98109', '206-325-8977', '206-329-9897', 'LAL@business.com');
INSERT INTO VENDOR (VendorID, ContactLastName, ContactFirstName, Address, City, 
  State, ZIP, Phone, Email)
   VALUES(seqVID.NextVal,
	'Lee', 'Andrew', '1102 3rd Street',
	'Kirkland', 'WA', '98033', '425-746-5433', 'Andrew.Lee@somewhere.com');
INSERT INTO VENDOR (VendorID, ContactLastName, ContactFirstName, Address, City, 
  State, ZIP, Phone, Email)
   VALUES(seqVID.NextVal,
	'Harrison', 'Denise', '533 10th Avenue',
	'Kirkland', 'WA', '98033', '425-746-4322', 'Denise.Harrison@somewhere.com');
INSERT INTO VENDOR
   VALUES(seqVID.NextVal,
	'New York Brokerage', 'Smith', 'Mark', '621 Roy Street',
	'Seattle', 'WA', '98109', '206-325-9088', '206-329-9908', 'NYB@business.com');
INSERT INTO VENDOR (VendorID, ContactLastName, ContactFirstName, Address, City, 
  State, ZIP, Phone, Email)
   VALUES(seqVID.NextVal,
	'Walsh', 'Denesha', '6712 24th Avenue NE',
	'Redmond', 'WA', '98053', '425-635-7566', 'Denesha.Walsh@somewhere.com');
INSERT INTO VENDOR (VendorID, ContactLastName, ContactFirstName, Address, City, 
  State, ZIP, Phone, Fax, Email)
   VALUES(seqVID.NextVal,
	'Bancroft', 'Chris', '12605 NE 6th Street',
	'Bellevue', 'WA', '98005', '425-635-9788', '425-639-9978', 'Chris.Bancroft@somewhere.com');
INSERT INTO VENDOR
   VALUES(seqVID.NextVal,
	'Specialty Antiques', 'Nelson', 'Fred', '2512 Lucky Street',
	'San Francisco', 'CA', '94110', '415-422-2121', '415-429-9212', 'SA@business.com');
INSERT INTO VENDOR
   VALUES(seqVID.NextVal,
	'General Antiques', 'Garner', 'Patty', '2515 Lucky Street',
	'San Francisco', 'CA', '94110', '415-422-3232', '415-429-9323', 'GA@business.com');

COMMIT;

/*****   ITEM DATA   **********************************************************/

/*****   ITEM Table As Used in Chapter03   ************************************/

/*****   The first 11 items are based on data in Figures in Chapter 02 ********/

INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Desk', TO_DATE('11/07/12', 'MM/DD/YY'), 1800.00, 3000.00, 2);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Desk Chair', TO_DATE('11/10/12', 'MM/DD/YY'), 300.00, 500.00, 4);
  
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Dining Table Linens', TO_DATE('11/14/12', 'MM/DD/YY'), 600.00, 1000.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Candles', TO_DATE('11/14/12', 'MM/DD/YY'), 30.00, 50.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Candles', TO_DATE('11/14/12', 'MM/DD/YY'), 27.00, 45.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Desk Lamp', TO_DATE('11/14/12', 'MM/DD/YY'), 150.00, 250.00,  3);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Dining Table Linens', TO_DATE('11/14/12', 'MM/DD/YY'), 450.00, 750.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Book Shelf', TO_DATE('11/21/12', 'MM/DD/YY'), 150.00, 250.00, 5);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Chair', TO_DATE('11/21/12', 'MM/DD/YY'), 750.00, 1250.00, 6);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Chair', TO_DATE('11/21/12', 'MM/DD/YY'), 1050.00, 1750.00, 6);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Candle Holders', TO_DATE('11/28/12', 'MM/DD/YY'), 210.00, 350.00, 2);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Desk', TO_DATE('01/05/13', 'MM/DD/YY'), 1920.00, 3200.00, 2);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Desk', TO_DATE('01/05/13', 'MM/DD/YY'), 2100.00, 3500.00, 2);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Desk Chair', TO_DATE('01/06/13', 'MM/DD/YY'), 285.00, 475.00, 9);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Desk Chair', TO_DATE('01/06/13', 'MM/DD/YY'), 339.00, 565.00, 9);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Desk Lamp', TO_DATE('01/06/13', 'MM/DD/YY'), 150.00, 250.00, 10);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Desk Lamp', TO_DATE('01/06/13', 'MM/DD/YY'), 150.00, 250.00, 10);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Desk Lamp', TO_DATE('01/06/13', 'MM/DD/YY'), 144.00, 240.00, 3);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Dining Table', TO_DATE('01/10/13', 'MM/DD/YY'), 3000.00, 5000.00, 7);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Antique Sideboard', TO_DATE('01/11/13', 'MM/DD/YY'), 2700.00, 4500.00, 8);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Dining Table Chairs', TO_DATE('01/11/13', 'MM/DD/YY'), 5100.00, 8500.00, 9);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Dining Table Linens', TO_DATE('01/12/13', 'MM/DD/YY'), 450.00, 750.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Dining Table Linens', TO_DATE('01/12/13', 'MM/DD/YY'), 480.00, 800.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Candles', TO_DATE('01/17/13', 'MM/DD/YY'), 30.00, 50.00, 1);
INSERT INTO ITEM VALUES(seqIID.NextVal,
	'Candles', TO_DATE('01/17/13', 'MM/DD/YY'), 36.00, 60.00, 1);
COMMIT;  
  


/*****   SALE DATA   **********************************************************/

/*****   The first 9 items are based on data in Figures in Chapter 02 *********/

INSERT INTO SALE VALUES(seqSID.NextVal,
  1, 1, TO_DATE('12/14/12', 'MM/DD/YY'), 3500.00, 290.50, 3790.50);
  
INSERT INTO SALE VALUES(seqSID.NextVal,
  2, 1, TO_DATE('12/15/12', 'MM/DD/YY'), 100.00, 83.00, 1083.00);
INSERT INTO SALE VALUES(seqSID.NextVal,
  3, 1, TO_DATE('12/15/12', 'MM/DD/YY'), 50.00, 4.15, 54.15);
INSERT INTO SALE VALUES(seqSID.NextVal,
  4, 3, TO_DATE('12/23/12', 'MM/DD/YY'), 45.00, 3.74, 48.74);
INSERT INTO SALE VALUES(seqSID.NextVal,
  1, 5, TO_DATE('01/05/13', 'MM/DD/YY'), 250.00, 20.75, 270.75);
INSERT INTO SALE VALUES(seqSID.NextVal,
  5, 5,	TO_DATE('01/10/13', 'MM/DD/YY'), 750.00, 62.25, 812.25);
INSERT INTO SALE VALUES(seqSID.NextVal,
  6, 4, TO_DATE('01/12/13', 'MM/DD/YY'), 250.00, 20.75, 270.75);
INSERT INTO SALE VALUES(seqSID.NextVal,
  2, 1, TO_DATE('01/15/13', 'MM/DD/YY'), 3000.00, 249.00, 3249.00);
INSERT INTO SALE VALUES(seqSID.NextVal,
  5, 5, TO_DATE('01/25/13', 'MM/DD/YY'), 350.00, 29.05, 379.05);
INSERT INTO SALE VALUES(seqSID.NextVal,
  7, 1, TO_DATE('02/04/13', 'MM/DD/YY'), 14250.00, 1182.75, 15432.75);
INSERT INTO SALE VALUES(seqSID.NextVal,
  8, 5, TO_DATE('02/04/13', 'MM/DD/YY'), 250.00, 20.75, 270.75);
INSERT INTO SALE VALUES(seqSID.NextVal,
  5, 4, TO_DATE('02/07/13', 'MM/DD/YY'), 50.00, 4.15, 54.15);
INSERT INTO SALE VALUES(seqSID.NextVal,
  9, 2, TO_DATE('02/07/13', 'MM/DD/YY'), 4500.00, 373.50, 4873.50);
INSERT INTO SALE VALUES(seqSID.NextVal,
  10,	3, TO_DATE('02/11/13', 'MM/DD/YY'), 3675.00, 305.03, 3980.03);
INSERT INTO SALE VALUES(seqSID.NextVal,
  2, 2, TO_DATE('02/11/13', 'MM/DD/YY'), 800.00, 66.40, 866.40);
  
COMMIT;

/*****   SALE_ITEM DATA   *****************************************************/

/*****   SALE_ITEM Table As Used in Chapter03   *******************************/

/*****   The first 11 items are based on data in Figures in Chapter 02 ********/

INSERT INTO SALE_ITEM VALUES(1, 1, 1, 3000.00);
INSERT INTO SALE_ITEM VALUES(1,  , 2, 500.00);
INSERT INTO SALE_ITEM VALUES(2, 1, 3, 1000.00);
INSERT INTO SALE_ITEM VALUES(3, 1, 4, 50.00);
INSERT INTO SALE_ITEM VALUES(4, 1, 5, 45.00);
INSERT INTO SALE_ITEM VALUES(5, 1, 6, 250.00);
INSERT INTO SALE_ITEM VALUES(6, 1, 7, 750.00);
INSERT INTO SALE_ITEM VALUES(7, 1, 8, 250.00);
INSERT INTO SALE_ITEM VALUES(8, 1, 9, 1250.00);
INSERT INTO SALE_ITEM VALUES(8,  , 10, 1750.00);
INSERT INTO SALE_ITEM VALUES(9, 1, 11, 350.00);
INSERT INTO SALE_ITEM VALUES(10, 1, 19, 5000.00);
INSERT INTO SALE_ITEM VALUES(10,  , 21, 8500.00);
INSERT INTO SALE_ITEM VALUES(10,  , 22, 750.00);
INSERT INTO SALE_ITEM VALUES(11, 1, 17, 250.00);
INSERT INTO SALE_ITEM VALUES(12, 1, 24, 50.00);
INSERT INTO SALE_ITEM VALUES(13, 1, 20, 4500.00);
INSERT INTO SALE_ITEM VALUES(14, 1, 12, 3200.00);
INSERT INTO SALE_ITEM VALUES(14, 2, 14, 475.00);
INSERT INTO SALE_ITEM VALUES(15, 1, 23, 800.00);

COMMIT;
/********************************************************************************/