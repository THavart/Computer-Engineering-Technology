SELECT DISTINCT ShipperName,SHIPMENT.ShipmentID,DepartureDate
FROM SHIPMENT,SHIPMENT_ITEM
Where SHIPMENT.ShipmentID = SHIPMENT_ITEM.ShipmentID AND Value 
IN (Select Value FROM SHIPMENT_ITEM
WHERE Value >= 1000)
Order By ShipperName ASC, DepartureDate DESC;