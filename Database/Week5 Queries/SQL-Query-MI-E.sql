SELECT ShipmentID, ShipperName, ShipperInvoiceNumber, convert(varchar, DepartureDate, 101) DepartureDate, convert(varchar, ArrivalDate, 101) ArrivalDate
FROM SHIPMENT
WHERE MONTH (DepartureDate) = 12;