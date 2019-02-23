CREATE VIEW CustomerInterestsView AS
SELECT
C.LastName AS CustomerLastName,
C.FirstName AS CustomerFirstName,
A.LastName AS ArtistName
FROM
CUSTOMER AS C JOIN CUSTOMER_ARTIST_INT AS CAI
ON
C.CustomerID = CAI.CustomerID
JOIN
ARTIST AS A
ON
CAI.ArtistID = A.ArtistID;