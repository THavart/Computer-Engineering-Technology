/********************************************************************************/
/*																				*/
/*	Kroenke and Auer - Database Processing(13th Edition) Chapter 12				*/
/*																				*/
/*	Heather Sweeny Designs Data Warehouse Database Create Tables				*/
/*																				*/
/*	These are the Microsoft SQL Server 2008R2/2012 code solutions				*/
/*																				*/
/********************************************************************************/

USE HSD_DW
GO

CREATE TABLE TIMELINE(
		TimeID			Int					NOT NULL,
		[Date]			Date				NOT NULL,
		MonthID			Int					NOT NULL,
		MonthText		Char(15)			NOT NULL,
		QuarterID		Int					NOT NULL,
		QuarterText		Char(10)			NOT NULL,
		[Year]			Int					NOT NULL,
		CONSTRAINT		TIMELINE_PK		PRIMARY KEY(TimeID)
		);

CREATE TABLE CUSTOMER(
		CustomerID		Int					NOT NULL,
		CustomerName	Char(75)			NOT NULL,
		EmailDomain		VarChar(100)		NOT NULL,
		PhoneAreaCode	Char(6)				NOT NULL,
		City			Char(35)			NULL,
		[State]			Char(2)				NULL,
		ZIP				Char(10)			NULL,
		CONSTRAINT 		CUSTOMER_PK 		PRIMARY KEY(CustomerID)
		);

CREATE TABLE PRODUCT(
		ProductNumber	Char(35)			NOT NULL,
		ProductType		Char(25)			NOT NULL,
		ProductName 	VarChar(75)			NOT NULL,
		CONSTRAINT 		PRODUCT_PK			PRIMARY KEY(ProductNumber)
		);

CREATE TABLE PRODUCT_SALES(
		TimeID			Int					NOT NULL,
		CustomerID		Int					NOT NULL,
		ProductNumber	Char(35) 			NOT NULL,
		Quantity		Int					NOT NULL,
		UnitPrice		Numeric(9,2)		NOT NULL,
		Total			Numeric(9,2	)		NULL,
		CONSTRAINT		SALES_PK
		PRIMARY KEY	    (TimeID, CustomerID, ProductNumber),
		CONSTRAINT		PS_TIMELINE_FK FOREIGN KEY(TimeID)
								REFERENCES TIMELINE(TimeID)
										ON UPDATE NO ACTION
										ON DELETE NO ACTION,
		CONSTRAINT		PS_CUSTOMER_FK FOREIGN KEY(CustomerID)
								REFERENCES CUSTOMER(CustomerID)
										ON UPDATE NO ACTION
										ON DELETE NO ACTION,
		CONSTRAINT		PS_PRODUCT_FK FOREIGN KEY(ProductNumber)
								REFERENCES PRODUCT(ProductNumber)
										ON UPDATE NO ACTION
										ON DELETE NO ACTION
		);

/********************************************************************************/

CREATE TABLE SALES_FOR_RFM(
		TimeID				Int					NOT NULL,
		CustomerID			Int					NOT NULL,
		InvoiceNumber		Int	 				NOT NULL,
		PreTaxTotalSale		Numeric(9,2)		NOT NULL,
		CONSTRAINT			SALES_FOR_RFM_PK
							PRIMARY KEY (TimeID, CustomerID, InvoiceNumber),
		CONSTRAINT			SRFM_TIMELINE_FK FOREIGN KEY(TimeID)
								REFERENCES TIMELINE(TimeID)
										ON UPDATE NO ACTION
										ON DELETE NO ACTION,
		CONSTRAINT			SRFM_CUSTOMER_FK FOREIGN KEY(CustomerID)
								REFERENCES CUSTOMER(CustomerID)
										ON UPDATE NO ACTION
										ON DELETE NO ACTION
		);

/********************************************************************************/

/* The following statements are for creating the PAYMENT_TYPE dimension table   */
/* in the Chapter 12 Exercises.													*/


CREATE TABLE PAYMENT_TYPE(
		PaymentTypeID		Int		NOT NULL,
		PaymentType		Char(25)	NOT NULL,
		CONSTRAINT 		PAY_TYPE_PK 	PRIMARY KEY(PaymentTypeID)
	);

ALTER TABLE PRODUCT_SALES
		ADD PaymentTypeID Int NULL;

ALTER TABLE PRODUCT_SALES
		ADD CONSTRAINT  PAY_TYPE_FK
			FOREIGN KEY (PaymentTypeID)
				REFERENCES PAYMENT_TYPE(PaymentTypeID)
					ON UPDATE NO ACTION
					ON DELETE NO ACTION;
					
 