/******************************************************************************/
/*									                                                        	*/
/*	Kroenke and Auer - Database Processing (13th Edition) Chapter 10B   			*/
/*										                                                        */
/*	The Morgan Importing (MI-CH10B) Database - Create Tables                  */
/*							                                                              */
/*	These are the Oracle Database 11g Release 2 SQL code solutions	          */
/*								                                                            */
/******************************************************************************/

CREATE TABLE EMPLOYEE(
    EmployeeID  Int         NOT NULL,
    LastName    Char(25)    NOT NULL,
    FirstName   Char(25)    NOT NULL,
    Department  Char(25)    NOT NULL,
    Phone       Char(16)    NULL,
    Fax         Char(16)    NULL,
    Email       Char(100)   NULL,
    CONSTRAINT  Employee_PK   PRIMARY KEY(EmployeeID)
    );

CREATE TABLE STORE (
		StoreID     Int         NOT NULL,
    StoreName		Char(50)		NOT NULL,
		City				Char(35)		NOT NULL,
		Country			Char(50)		NOT NULL,
		Phone				Char(16)		NOT NULL,
		Fax					Char(16)		NULL,
		Email				Char(100)		NULL,
		Contact			Char(50)		NOT NULL,
		CONSTRAINT	Store_PK			PRIMARY KEY(StoreID),
		CONSTRAINT	StoreCountry		CHECK
								(Country IN ('Hong Kong', 'India',
								 'Japan', 'Peru','Philippines', 'Singapore',
								 'United States'))
		);

CREATE TABLE ITEM (
		ItemID	          Int				    NOT NULL,
		StoreID   	      Int     	    NOT NULL,
    PurchasingAgentID Int           NOT NULL,
		PurchaseDate	  	Date			    NOT NULL,
		ItemDescription		VarChar(255)	NOT NULL,
		Category			    Char(25)		  NULL,
		PriceUSD			    Number(12,2)	NOT NULL,
		CONSTRAINT	Item_PK	    PRIMARY KEY (ItemID),
		CONSTRAINT	Item_Store_FK 	  FOREIGN KEY(StoreID)
									 REFERENCES STORE(StoreID),
    CONSTRAINT  Item_Employee_FK  FOREIGN KEY(PurchasingAgentID)
                   REFERENCES EMPLOYEE(EmployeeID)
		);

CREATE TABLE SHIPPER (
		ShipperID			Int				  NOT NULL,
		ShipperName		Char(50)		NOT NULL,
		Phone				  Char(16)		NOT NULL,
		Fax					  Char(16)		NULL,
		Email				  Char(100)		NULL,
		Contact			  Char(50)		NOT NULL,
		CONSTRAINT	  Shipper_PK	PRIMARY KEY(ShipperID)
		);

CREATE TABLE SHIPMENT (
		ShipmentID				      Int				NOT NULL,
		ShipperID					      Int			  NOT NULL,
    PurchasingAgentID       Int       NOT NULL,
		ShipperInvoiceNumber	  Int				NOT NULL,
		Origin						      Char(35)	NOT NULL,
		Destination				      Char(35)	NOT NULL,
		ScheduledDepartureDate	Date			NULL,
		ActualDepartureDate	    Date			NULL,
    EstimatedArrivalDate    Date      NULL,
		CONSTRAINT	Shipment_PK				  PRIMARY KEY (ShipmentID),
		CONSTRAINT	Ship_Shipper_FK 		FOREIGN KEY(ShipperID)
                       REFERENCES SHIPPER(ShipperID),
		CONSTRAINT	Ship_Employee_FK 		FOREIGN KEY(PurchasingAgentID)
                       REFERENCES EMPLOYEE(EmployeeID)                      
		);
 
CREATE TABLE SHIPMENT_ITEM (
		ShipmentID		    Int				    NOT NULL,
		ShipmentItemID		Int				    NOT NULL,
		ItemID		        Int				    NOT NULL,
		InsuredValue		  Number(12,2)	NOT NULL,
		CONSTRAINT	ShipmentItem_PK	    PRIMARY KEY(ShipmentID, ShipmentItemID),
		CONSTRAINT	Ship_Item_Ship_FK		    FOREIGN KEY(ShipmentID)
                      REFERENCES SHIPMENT(ShipmentID)
                        ON DELETE CASCADE,
		CONSTRAINT	Ship_Item_Purchase_FK	FOREIGN KEY(ItemID)
                      REFERENCES ITEM(ItemID)
                        ON DELETE CASCADE
		);

CREATE TABLE SHIPMENT_RECEIPT (
		ReceiptNumber     Int           NOT NULL,
    ShipmentID		    Int				    NOT NULL,
		ItemID		        Int				    NOT NULL,
    ReceivingAgentID  Int           NOT NULL,
    ReceiptDateTime   Date          NOT NULL,
    ReceiptQuantity   Int           NOT NULL,
    isReceivedUndamaged   Char(3)   NOT NULL,
    DamageNotes       Char(1000)    NULL,
		CONSTRAINT	ShipmentReceipt_PK	    PRIMARY KEY(ReceiptNumber),
		CONSTRAINT	Ship_Receipt_Ship_FK		    FOREIGN KEY(ShipmentID)
                      REFERENCES SHIPMENT(ShipmentID)
                        ON DELETE CASCADE,
		CONSTRAINT	Ship_Receipt_Item_FK	FOREIGN KEY(ItemID)
                      REFERENCES ITEM(ItemID)
                        ON DELETE CASCADE,
		CONSTRAINT	Ship_Receipt_Emp_FK	FOREIGN KEY(ReceivingAgentID)
                      REFERENCES EMPLOYEE(EmployeeID)
		);
    
