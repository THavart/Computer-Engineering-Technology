CREATE TRIGGER TRANS_AfterInsertSetAskingPrice 
ON TRANS 
AFTER INSERT 
AS 
BEGIN 
DECLARE 
@PriorRowCount AS Int, 
@WorkID AS Int, 
@TransactionID AS Int, 
@AcquisitionPrice AS Numeric(8, 2), 
@NewAskingPrice AS Numeric(8, 2), 
@SumNetProfit AS Numeric(8, 2), 
@AvgNetProfit AS Numeric(8,2) 
SELECT @TransactionID = TransactionID, 
@AcquisitionPrice = AcquisitionPrice, 
@WorkID = WorkID 
FROM inserted 
-- First find if work has been here before. 
SELECT * 
FROM dbo.TRANS AS T 
WHERE T.WorkID = @WorkID;  
-- Since this is an AFTER trigger, @@Rowcount includes the new row. 
SET @PriorRowCount = (@@Rowcount - 1) 
IF (@PriorRowCount = 0) 
-- This is first Lime work has been in the gallery. 
-- Set @NewAskinqPrice to twice the acquisition cost. 
SET @NewAskingPrice = (2 * @AcquisitionPrice) 
ELSE 
-- The work has been here before 
-- We have to determine the value of @HewAskingPrice 
BEGIN 
SELECT @SumNetProfit = SUM(NetProfit) 
FROM dbo.ArtistWorkNetView AWNV 
WHERE AWNV.WorkID = @WorkID 
GROUP BY AWNV.WorkID; 
SET @AvgNetProfit = (@SumNetProfit / @PriorRowCount); 
-- Now choose larger value for the new AskingPrice. 
IF ((@AcquisitionPrice - @AvgNetProfit) > (2 * @AcquisitionPrice)) 
SET @NewAskingPrice = (@AcquisitionPrice + @AvgNetProfit) 
ELSE 
SET @NewAskingPrice =(2 * @AcquisitionPrice) 
END 
-- Update TRANS with the value of AskingPrice 
UPDATE dbo.TRANS 
SET AskingPrice = @NewAskingPrice 
WHERE TransactionID = @TransactionID 
-- The INSERT is completed. Print output 
BEGIN 
PRINT '***********************************' 
PRINT '' 
PRINT 'INSERT complete. ' 
PRINT '' 
PRINT 'TransactionID = '+CONVERT(Char(6), @TransactionID) 
PRINT 'WorkID = '+CONVERT(Char(6), @WorkID) 
PRINT 'Acquisition Price = '+CONVERT(Char(12), @AcquisitionPrice) 
PRINT 'Asking Price = '+CONVERT(Char(12), @NewAskingPrice) 
PRINT '' 
PRINT '***************************************' 
END 
END 


