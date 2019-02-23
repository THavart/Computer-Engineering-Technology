DELIMITER //
 
CREATE PROCEDURE InsertCustomerWithTransaction
        (IN newCustomerLastName CHAR(25),
        IN newCustomerFirstName CHAR(25),
        IN newCustomerAreaCode CHAR(3),
        IN newCustomerPhoneNumber CHAR(8),
        IN newCustomerEmail VARCHAR(100),
        IN transArtistLastName CHAR(25),
        IN transWorkTitle CHAR(35),
        IN transWorkCopy CHAR(12),
        IN transTransSalesPrice NUMERIC(8,2))
 
spicwt:BEGIN
 
DECLARE varRowCount INT;
DECLARE varArtistID INT;
DECLARE varCustomerID INT;
DECLARE varWorkID INT;
DECLARE varTransactionID INT;
 
#Check TO see IF Customer already exist IN DATABASE
 
SELECT COUNT(*) INTO varRowCount
FROM CUSTOMER
WHERE LastName = newCustomerLastName
        AND FirstName = newCustomerFirstName
        AND AreaCode = newCustomerAreaCode
        AND PhoneNumber = newCustomerPhoneNumber
        AND Email = newCustomerEmail;
 
#(IF varRowCount > 0) THEN Customer alread y EXISTS.
IF (varRowCount > 0)
        THEN
        SELECT 'Customer already exists';
        ROLLBACK;
        LEAVE spicwt;
        END IF;
 
#IF (varRowCount = 0) THEN Customer does NOT exist IN DATABASE
IF (varRowCount = 0)
        THEN
        spicwtif:BEGIN
 
                #Start TRANSACTION -ROLLBACK everything IF unable TO complete it
                START TRANSACTION;
 
                #Insert NEW Customer DATA
                INSERT INTO CUSTOMER (LastName, FirstName, AreaCode, PhoneNumber, Email)
                        VALUES(newCustomerLastName, newCustomerFirstName,
                                        newCustomerAreaCode, newCustomerPhoneNumber, newCustomerEmail);
 
                #Get NEW CustomerID surrogate KEY VALUE.
                SET varCustomerID = LAST_INSERT_ID();
 
                #Get ArtistID surrogate KEY VALUE, CHECK FOR validity.
                SELECT ArtistID INTO varArtistID
                FROM ARTIST
                WHERE LastName = transArtistLastName;
 
                IF (varArtistID IS NULL) THEN
                SELECT 'Invalid ArtistID';
                ROLLBACK;
                LEAVE spicwtif;
                END IF;
 
                #Get WorkID surrogate KEY VALUE, CHECK FOR validity
                SELECT WorkID INTO varWorkID
                FROM WORK
                WHERE ArtistID = varArtistID
                        AND Title = transWorkTitle
                        AND Copy = transWorkCopy;
 
                IF (varWorkID IS NULL) THEN
                        SELECT 'Invalid WorkID';
                        ROLLBACK;
                        LEAVE spicwtif;
                        END IF;
 
        #Get TransID surrogate KEY VALUE, CHECK FOR validity
        SELECT TransactionID INTO varTransactionID
        FROM TRANS
        WHERE WorkID = varWorkID
                AND SalesPrice IS NULL;
 
        IF (varTransactionID IS NULL) THEN
                SELECT 'Invalid TransactionID';
                ROLLBACK;
                END IF;
 
                #ALL surrogate KEY VALUES OF OK, complete the TRANSACTION
                #Update TRANS ROW
                UPDATE TRANS
                        SET DateSold = CURRENT_DATE(),
                                SalesPrice = transTransSalesPrice,
                                CustomerID = varCustomerID
                WHERE TransactionID = varTransactionID;
 
                #Commit the TRANSACTION
                COMMIT;
 
                #Create CUSTOMER_ARTIST_INT ROW
                INSERT INTO CUSTOMER_ARTIST_INT (CustomerID, ArtistID)
                        VALUES(varCustomerID, varArtistID);
                #The TRANSACTION IS completed.Print message
                SELECT 'The new customer and transaction are now in the datebase.'
                        AS InsertCustomerWithTransactionResults;
        #END spicwtif;
        END spicwtif;
        END IF;
        #END spicwt
END spicwt
//
DELIMITER ;