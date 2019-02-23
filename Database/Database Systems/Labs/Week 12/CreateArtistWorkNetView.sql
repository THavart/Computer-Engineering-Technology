CREATE VIEW ArtistWorkNetView AS 

SELECT	LastName AS ArtistLastName, 
		FirstName AS ArtistFirstName, 
		W.WorkID, Title, Copy, DateSold, 
		AcquisitionPrice, SalesPrice, 
		(SalesPrice - AcquisitionPrice) AS NetProfit 

FROM	TRANS AS T JOIN WORK AS W 
ON		T.WorkID = W.WorkID 
		JOIN ARTIST AS A 
		ON W.ArtistID = A.ArtistID; 
