SELECT		ArtistLastName, ArtistFirstName, 
			WorkID, Title, Copy, DateSold, NetProfit 
			
FROM		ArtistWorkNetView 

WHERE		NetProfit > 5000 

ORDER BY	DateSold; 
