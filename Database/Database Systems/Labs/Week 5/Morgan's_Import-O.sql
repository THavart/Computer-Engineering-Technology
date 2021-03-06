SELECT DISTINCT ShipperName,SHIPMENT.ShipmentID,DepartureDate
FROM ITEM,SHIPMENT,SHIPMENT_ITEM
WHERE SHIPMENT.ShipmentID IN (SELECT ShipmentID FROM SHIPMENT_ITEM
WHERE SHIPMENT_ITEM.ItemID IN (SELECT ITEM.ItemID FROM ITEM WHERE City like '%Singapore'))
Order By ShipperName ASC, DepartureDate DESC;
