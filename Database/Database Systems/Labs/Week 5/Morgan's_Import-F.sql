SELECT ShipmentID,ShipperName,ShipperInvoiceNumber,ArrivalDate,DepartureDate
FROM SHIPMENT
Where Day(DepartureDate) = '10';