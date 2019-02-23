SELECT Store,City,SUM(Quantity) AS Items FROM ITEM
GROUP BY City, Store;