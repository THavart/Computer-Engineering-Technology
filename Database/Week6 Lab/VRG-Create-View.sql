CREATE VIEW CustomerInterestsView AS
    SELECT  C.LastName AS CustomerLastName, 
            C.FirstName AS CustomerFirstName, 
            A.LastName AS ArtistName
    FROM    CUSTOMER AS C JOIN 
            CUSTOMER_ARTIST_INT AS CI ON C.CustomerID = CI.CustomerID JOIN 
            ARTIST AS A ON CI.ArtistID = A.ArtistID;