/******************************************************************************/
/*																				                                    */
/*	Kroenke and Auer - Database Processing (13th Edition)                			*/
/*																				                                    */
/*	The Queen Anne Curiousity Shop Database Create Tables		           				*/
/*																				                                    */
/*	These are the Oracle Database 11g Release 2 SQL code solutions	          */
/*																				                                    */
/******************************************************************************/
/*																				                                    */
/*	NOTE:  These SQL Statements use the following surrogate keys:			        */
/*																				                                    */
/*		CUSTOMER:	Start at 1, Increment by 1 - seqCID       				            */
/*		EMPLOYEE:	Start at 1, Increment by 1 - seqEID     				              */
/*		VENDOR:		Start at 1, Increment by 1 - seqVID     				              */
/*		ITEM:		Start at 1, Increment by 1 - seqIID     	    		              */
/*		SALE:		Start at 1, Increment by 1 - seqSID       				              */
/*																				                                    */
/******************************************************************************/

CREATE  TABLE CUSTOMER(
	CustomerID			        Int				        NOT NULL,
	LastName			          Char(25)		      NOT NULL,
	FirstName			          Char(25)		      NOT NULL,
	Address				          Char(35)		      NULL,
	City				            Char(35)		      NULL,
	State				            Char(2)			      NULL,
	ZIP					            Char(10)		      NULL,
	Phone				            Char(12)		      NOT NULL,
	Email				            VarChar(100)	    NULL,
	CONSTRAINT 			        CUSTOMER_PK 	    PRIMARY KEY(CustomerID)
  );
  
CREATE SEQUENCE seqCID INCREMENT BY 1 START WITH 1; 

CREATE  TABLE EMPLOYEE(
	EmployeeID			        Int 			        NOT NULL,
	LastName			          Char(25) 		      NOT NULL,
	FirstName			          Char(25) 		      NOT NULL,
	Phone				            Char(12)		      NULL,
	Email 				          VarChar(100)	    NOT NULL UNIQUE,
	CONSTRAINT 			        EMPLOYEE_PK 	    PRIMARY KEY(EmployeeID)
	);

CREATE SEQUENCE seqEID INCREMENT BY 1 START WITH 1; 

CREATE  TABLE VENDOR(
	VendorID			          Int				        NOT NULL,
	CompanyName			        Char(100)		      NULL,
	ContactLastName		      Char(25)		      NOT NULL,
	ContactFirstName	      Char(25)		      NOT NULL,
	Address				          Char(35)		      NULL,
	City				            Char(35)		      NULL,
	State				            Char(2)			      NULL,
	ZIP					            Char(10)		      NULL,
	Phone				            Char(12)		      NOT NULL,
	Fax					            Char(12)		      NULL,
	Email				            VarChar(100)	    NULL,
	CONSTRAINT 			    VENDOR_PK 		        PRIMARY KEY(VendorID)
	);

CREATE SEQUENCE seqVID INCREMENT BY 1 START WITH 1; 

/*****   ITEM Table As Used in Chapter03   ************************************/

CREATE  TABLE ITEM(
	ItemID				          Int	 			        NOT NULL,
	ItemDescription		      VarChar(255)	    NOT NULL,
	PurchaseDate		        Date    		      NOT NULL,
	ItemCost			          Numeric(9,2)	    NOT NULL,
	ItemPrice			          Numeric(9,2)	    NOT NULL,
	VendorID			          Int				        NOT NULL,
	CONSTRAINT 			    ITEM_PK			          PRIMARY KEY (ItemID),
	CONSTRAINT 			    ITEM_VENDOR_FK        FOREIGN KEY	(VendorID)
								          REFERENCES VENDOR(VendorID)
  );
  
CREATE SEQUENCE seqIID INCREMENT BY 1 START WITH 1;   

CREATE  TABLE SALE(
  SaleID				          Int				       NOT NULL,
	CustomerID			        Int	 			       NOT NULL,
	EmployeeID			        Int				       NOT NULL,
	SaleDate			          Date		         NOT NULL,
	SubTotal			          Numeric(15,2)	   NULL,
	Tax					            Numeric(15,2)	   NULL,
	Total				            Numeric(15,2)	   NULL,
  CONSTRAINT 			    SALE_PK 		         PRIMARY KEY (SaleID),
	CONSTRAINT 			    SALE_CUSTOMER_FK     FOREIGN KEY (CustomerID)
								          REFERENCES Customer(CustomerID),
	CONSTRAINT 	        SALE_EMPLOYEE_FK     FOREIGN KEY(EmployeeID)
								          REFERENCES Employee(EmployeeID)
  );

CREATE SEQUENCE seqSID INCREMENT BY 1 START WITH 1; 

/*****   SALE_ITEM Table As Used in Chapter03   *******************************/

CREATE  TABLE SALE_ITEM(
  SaleID				          Int				       NOT NULL,
	SaleItemID			        Int				       NOT NULL,
	ItemID				          Int	 			       NOT NULL,
	ItemPrice			          Numeric(9,2)	   NOT NULL,
  CONSTRAINT 			    SALE_ITEM_PK 	   PRIMARY KEY (SaleID, SaleItemID),
	CONSTRAINT 			    SALE_ITEM_SALE_FK FOREIGN KEY (SaleID)
								          REFERENCES SALE(SaleID)
										          ON DELETE CASCADE,
	CONSTRAINT 			    SALE_ITEM_ITEM_FK FOREIGN KEY (ItemID)
								          REFERENCES ITEM(ItemID)
  );

/******************************************************************************/