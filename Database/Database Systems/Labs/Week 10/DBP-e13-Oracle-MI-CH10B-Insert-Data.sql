/******************************************************************************/
/*									                                                        	*/
/*	Kroenke and Auer - Database Processing (13th Edition) Chapter 10B   			*/
/*										                                                        */
/*	The Morgan Importing (MI-CH10B) Database - Insert Data                    */
/*							                                                              */
/*	These are the Oracle Database 11g RELEASE 2 SQL code solutions	          */
/*								                                                            */
/******************************************************************************/

/*****   EMPLOYEE Data   ******************************************************/

INSERT INTO EMPLOYEE VALUES (
    101, 'Morgan', 'James', 'Executive', '310-208-1401', '310-208-1499',
    'James.Morgan@morganimporting.com');
INSERT INTO EMPLOYEE VALUES (
    102, 'Morgan', 'Jessica', 'Executive', '310-208-1402', '310-208-1499',
    'Jessica.Morgan@morganimporting.com');
INSERT INTO EMPLOYEE VALUES (
    103, 'Williams', 'David', 'Purchasing', '310-208-1434', '310-208-1498',
    'David.Williams@morganimporting.com');
INSERT INTO EMPLOYEE VALUES (
    104, 'Gilbertson', 'Teri', 'Purchasing', '310-208-1435', '310-208-1498',
    'Teri.Gilbertson@morganimporting.com');
INSERT INTO EMPLOYEE VALUES (
    105, 'Wright', 'James', 'Receiving', '310-208-1456', '310-208-1497',
    'James.Wright@morganimporting.com');
INSERT INTO EMPLOYEE VALUES (
    106, 'Douglas', 'Tom', 'Receiving', '310-208-1457', '310-208-1497',
    'Tom.Douglas@morganimporting.com');
    
COMMIT;
/*****   STORE Data   *********************************************************/

INSERT INTO STORE VALUES (
		1000, 'Eastern Sales', 'Singapore', 'Singapore', 
		'65-543-1233','65-543-1239', 'Sales@EasternSales.com.sg',
		 'Jeremey');
INSERT INTO STORE VALUES (
		1050, 'Eastern Treasures', 'Manila', 'Philippines',
		 '63-2-654-2344', '63-2-654-2349', 'Sales@EasternTreasures.com.ph',
		 'Gracielle');
INSERT INTO STORE VALUES (
		1100, 'Jade Antiques', 'Singapore', 'Singapore',
		 '65-543-3455', '65-543-3459', 'Sales@JadeAntiques.com.sg',
		 'Swee Lai');
INSERT INTO STORE VALUES (
		1150, 'Andes Treasures', 'Lima', 'Peru',
		 '51-14-765-4566', '51-14-765-4569', 
		'Sales@AndesTreasures.com.pe', 'Juan Carlos');
INSERT INTO STORE VALUES (
		1200, 'Eastern Sales', 'Hong Kong', 'Hong Kong',
		 '852-876-5677', '852-876-5679', 'Sales@EasternSales.com.hk',
		 'Sam');
INSERT INTO STORE VALUES (
		1250, 'Eastern Treasures', 'New Delhi', 'India',
		 '91-11-987-6788', '91-11-987-6789', 
		'Sales@EasternTreasures.com.in', 'Deepinder');
INSERT INTO STORE VALUES (
		1300, 'EuropeanImports', 'New York City',
		 'United States', '800-432-8766', '800-432-8769',
		 'Sales@ EuropeanImports.com', 'Marcello');

COMMIT;
 
/*****   SHIPPER Data   *******************************************************/

INSERT INTO SHIPPER VALUES (
	1, 'ABC Trans-Oceanic', '800-234-5656', '800-234-5659',
	'Sales@ABCTransOceanic.com', 'Jonathan');
INSERT INTO SHIPPER VALUES (
	2, 'International', '800-123-8898', '800-123-8899',
	'Sales@International.com', 'Marilyn');
INSERT INTO SHIPPER VALUES (
	3, 'Worldwide', '800-123-4567', '800-123-4569',
	'Sales@Worldwide.com', 'Jose');

COMMIT;

/*****   ITEM Data   *************************************************/

INSERT INTO ITEM VALUES(
		500, 1050, 101, '10-Dec-10', 'Antique large bureaus',
		 'Furniture', 13415);
INSERT INTO ITEM VALUES(
		505, 1050, 102, '12-Dec-10', 'Porcelain lamps', 
		'Lamps', 13300);
INSERT INTO ITEM VALUES(
		510, 1200, 104, '15-Dec-10', 'Gold Rim design china', 
		'Tableware', 38500);
INSERT INTO ITEM VALUES(
		515, 1200, 104, '16-Dec-10', 'Gold Rim design serving 
		dishes','Tableware', 3200);
INSERT INTO ITEM VALUES(
		520, 1050, 102, '07-Apr-11', 'QE dining set',
		 'Furniture', 14300);
INSERT INTO ITEM VALUES(
		525, 1100, 103, '18-May-11', 'Misc linen',
		 'Linens', 88545);
INSERT INTO ITEM VALUES(
		530, 1000, 103, '19-May-11', 'Large masks',
		 'Decorations', 22135);
INSERT INTO ITEM VALUES(
		535, 1100, 104, '20-May-11', 'Willow design china',
		 'Tableware', 147575);
INSERT INTO ITEM VALUES(
		540, 1100, 104, '20-May-11',
		 'Willow design serving dishes', 'Tableware', 12040);
INSERT INTO ITEM VALUES(
		545, 1150, 102, '14-Jun-11', 'Woven goods',
		 'Decorations', 1200);
INSERT INTO ITEM VALUES(
		550, 1150, 101, '16-Jun-11',
		 'Antique leather chairs', 'Furniture', 5375);
INSERT INTO ITEM VALUES(
		555, 1100, 104, '15-Jul-11', 'Willow serving dishes',
		 'Dishes', 4500);
INSERT INTO ITEM VALUES(
		560, 1000, 103, '17-Jul-11', 'Large bureau',
		 'Furniture', 9500);
INSERT INTO ITEM VALUES(
		565, 1100, 104, '20-Jul-11', 'Brass lamps',
		 'Lamps', 1200);

COMMIT;
 

/*****   SHIPMENT Data   ***************************************************/

INSERT INTO SHIPMENT VALUES(
		100, 1, 103, 2010651, 'Philippines', 'Seattle',
		 '10-Dec-12', '10-Dec-12', '15-Mar-13');
INSERT INTO SHIPMENT VALUES(
		101, 1, 104, 2011012, 'Hong Kong', 'Seattle',
    '10-Jan-13', '12-Jan-13', '20-Mar-13');
INSERT INTO SHIPMENT VALUES(
		102, 3, 103, 49100300, 'Philippines', 'Seattle',
		 '05-May-12', '05-May-12', '17-Jun-13');
INSERT INTO SHIPMENT VALUES(
		103, 2, 104, 399400, 'Singapore', 'Portland',
		 '02-Jun-13', '04-Jun-13', '17-Jul-13' );
INSERT INTO SHIPMENT VALUES(
		104, 3, 103, 84899440, 'Peru', 'Seattle',
		 '10-Jul-13', '10-Jul-13', '28-Jul-13');
INSERT INTO SHIPMENT VALUES(
		105, 2, 104, 488955,  'Singapore', 'Portland',
    '05-Aug-13', '09-Aug-13', '11-Sep-13');

COMMIT;

/*****   SHIPMENT_ITEM Data   **********************************************/

INSERT INTO SHIPMENT_ITEM VALUES(100, 1, 500, 15000);
INSERT INTO SHIPMENT_ITEM VALUES(100, 2, 505, 15000);
INSERT INTO SHIPMENT_ITEM VALUES(101, 1, 510, 40000);
INSERT INTO SHIPMENT_ITEM VALUES(101, 2, 515, 3500);
INSERT INTO SHIPMENT_ITEM VALUES(102, 1, 520, 15000);
INSERT INTO SHIPMENT_ITEM VALUES(103, 1, 525, 90000);
INSERT INTO SHIPMENT_ITEM VALUES(103, 2, 530, 25000);
INSERT INTO SHIPMENT_ITEM VALUES(103, 3, 535, 150000);
INSERT INTO SHIPMENT_ITEM VALUES(103, 4, 540, 12500);
INSERT INTO SHIPMENT_ITEM VALUES(104, 1, 545, 12500);
INSERT INTO SHIPMENT_ITEM VALUES(104, 2, 550, 5500);
INSERT INTO SHIPMENT_ITEM VALUES(105, 1, 555, 4500);
INSERT INTO SHIPMENT_ITEM VALUES(105, 2, 560, 10000);
INSERT INTO SHIPMENT_ITEM VALUES(105, 3, 565, 1500);

COMMIT;

INSERT INTO SHIPMENT_RECEIPT VALUES(200001, 100, 500, 105, 
    TO_DATE('17-Mar-13 10:00 AM', 'DD-MON-YY HH:MI AM'), 3, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200002, 100, 505, 105, 
    TO_DATE('17-Mar-13 10:00 AM', 'DD-MON-YY HH:MI AM'), 50, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200003, 101, 510, 105, 
    TO_DATE('23-Mar-13 3:30 PM', 'DD-MON-YY HH:MI AM'), 100, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200004, 101, 515, 105, 
    TO_DATE('23-Mar-13 3:30 PM', 'DD-MON-YY HH:MI AM'), 10, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200005, 102, 520, 106, 
    TO_DATE('19-Jun-13 10:15 AM', 'DD-MON-YY HH:MI AM'), 1, 'No', 
    'One leg on one char broken.');
INSERT INTO SHIPMENT_RECEIPT VALUES(200006, 103, 525, 106, 
    TO_DATE('20-Jul-13 2:20 AM', 'DD-MON-YY HH:MI AM'), 1000, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200007, 103, 530, 106, 
    TO_DATE('20-Jul-13 2:20 AM', 'DD-MON-YY HH:MI AM'), 100, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200008, 103, 535, 106, 
    TO_DATE('20-Jul-13 2:20 AM', 'DD-MON-YY HH:MI AM'), 100, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200009, 103, 540, 106, 
    TO_DATE('20-Jul-13 2:20 AM', 'DD-MON-YY HH:MI AM'), 10, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200010, 104, 545, 105, 
    TO_DATE('29-Jul-13 9:00 PM', 'DD-MON-YY HH:MI AM'), 100, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200011, 104, 550, 105, 
    TO_DATE('29-Jul-13 9:00 PM', 'DD-MON-YY HH:MI AM'), 5, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200012, 105, 555, 106, 
    TO_DATE('14-Sep-13 2:45 PM', 'DD-MON-YY HH:MI AM'), 4, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200013, 105, 560, 106, 
    TO_DATE('14-Sep-13 2:45 PM', 'DD-MON-YY HH:MI AM'), 1, 'Yes', NULL);
INSERT INTO SHIPMENT_RECEIPT VALUES(200014, 105, 565, 106, 
    TO_DATE('14-Sep-13 2:45 PM', 'DD-MON-YY HH:MI AM'), 10, 'No', 
    'Base of one lamp scratched.');
COMMIT;
/* Create sequences after data has been inserted */

CREATE SEQUENCE seqEmployeeID INCREMENT BY 1 START WITH 107;

CREATE SEQUENCE seqShipperID INCREMENT BY 1 START WITH 4;

CREATE SEQUENCE seqIID INCREMENT BY 5 START WITH 570;

CREATE SEQUENCE seqShipmentID INCREMENT BY 1 START WITH 106;

CREATE SEQUENCE seqStoreID INCREMENT BY 50 START WITH 1350;

CREATE SEQUENCE seqReceiptNum INCREMENT BY 1 START WITH 200015;