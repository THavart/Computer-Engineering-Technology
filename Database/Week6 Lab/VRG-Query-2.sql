SELECT CustomerlastName, CustomerFirstName
FROM CustomerInterestsView
WHERE CustomerLastName = "Gliddens" OR CustomerLastName = "Bench" AND CustomerFirstName = "Michael" OR  CustomerFirstName = "Melinda"