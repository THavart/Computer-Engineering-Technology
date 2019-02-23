SELECT City, Store,
COUNT (*) AS City_Store_Combination_Count
FROM ITEM
GROUP BY City, Store;