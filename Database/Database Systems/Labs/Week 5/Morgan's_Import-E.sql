SELECT ShipmentID,ShipperName,ShipperInvoiceNumber,ArrivalDate,DepartureDate
FROM SHIPMENT
Where MONTH(DepartureDate) = '12' ;