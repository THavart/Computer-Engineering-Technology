SELECT Distinct ShipperName,SHIPMENT.ShipmentID,DepartureDate
FROM ITEM JOIN SHIPMENT
ON City like '%Singapore'
JOIN SHIPMENT_ITEM ON ITEM.ItemID = ShipmentItemID AND SHIPMENT.ShipmentID = SHIPMENT_ITEM.ShipmentID
Order By ShipperName ASC, DepartureDate DESC;
