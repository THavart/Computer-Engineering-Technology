SELECT
FirstNameFirst(C.FirstName, C.LastName) AS CustomerName,FirstNameFirst(A.FirstName, A.LastName) AS ArtistName
FROM
CUSTOMER AS C JOIN customer_artist_int AS CAI
ON C.CustomerID = CAI.CustomerID
JOIN ARTIST AS A
ON CAI.ArtistID = A.ArtistID
ORDER BY
CustomerName, ArtistName;