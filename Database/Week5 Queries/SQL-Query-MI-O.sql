SELECT ShipperName, ShipmentID, DepartureDate
FROM SHIPMENT
WHERE ShipmentID IN
(SELECT ShipmentID
FROM SHIPMENT_ITEM
WHERE ItemID IN
(SELECT ItemID
FROM ITEM
WHERE City = 'Singapore'))
ORDER BY ShipperName, DepartureDate DESC;