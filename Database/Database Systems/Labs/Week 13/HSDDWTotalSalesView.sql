CREATE VIEW HSDDWTotalSalesView AS

SELECT C.CustomerID, C.CustomerName, P.ProductNumber, 
P.ProductName, SUM(PS.Total) AS TotalAmount 
FROM CUSTOMER AS C, PRODUCT_SALES AS PS, PRODUCT AS P 
WHERE C.CustomerID = PS.CustomerID AND P.ProductNumber = PS.ProductNumber 
GROUP BY C.CustomerID, C.CustomerName, P.ProductNumber, P.ProductName; 
