SELECT DISTINCT ShipperName,SHIPMENT.ShipmentID,DepartureDate
FROM ITEM,SHIPMENT,SHIPMENT_ITEM
WHERE City like '%Singapore'AND SHIPMENT.ShipmentID = SHIPMENT_ITEM.ShipmentID AND ITEM.ItemID = ShipmentItemID
Order By ShipperName ASC, DepartureDate DESC;
