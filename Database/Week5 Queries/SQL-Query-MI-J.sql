SELECT ItemID, Description, Store,
LocalCurrencyAmount * ExchangeRate AS USCurrencyAmount
FROM ITEM;