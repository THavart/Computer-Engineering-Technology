SELECT CustomerlastName, CustomerFirstName
FROM CustomerPhoneView
WHERE CustomerLastName = "Gliddens" OR CustomerLastName = "Bench" AND CustomerFirstName = "Michael" OR  CustomerFirstName = "Melinda"