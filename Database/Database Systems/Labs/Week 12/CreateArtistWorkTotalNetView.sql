CREATE VIEW	ArtistWorkTotalNetView AS 

SELECT		ArtistLastName, ArtistFirstName, 
			WorkID, Title, Copy, 
			SUM(NetProfit) AS TotalNetProfit 

FROM		ArtistWorkNetView 

GROUP BY	ArtistLastName, ArtistFirstName, WorkID, Title, Copy; 
