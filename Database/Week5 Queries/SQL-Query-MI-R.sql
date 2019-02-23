SELECT ShipperName, SHIPMENT.ShipmentID, DepartureDate, Value
FROM SHIPMENT, SHIPMENT_ITEM
WHERE SHIPMENT.ShipmentID = SHIPMENT_ITEM.ShipmentID
AND ItemID IN
(SELECT ItemID
FROM ITEM
WHERE City = 'Singapore')
ORDER BY ShipperName, DepartureDate DESC;