/*-- INSERT new work into WORK
/* *** SQL-INSERT-CH10A-01 *** */INSERT INTO WORK VALUES(
'Spanish Dancer', '635/750', 'High Quality Limited Print',
'American Realist style - From work in Spain', 11);
-- Obtain the new WorkID form WORK
/* *** SQL-Query-CH10A-05 *** */
SELECT
WorkID
FROM
dbo.WORK
WHERE
ArtistID = 11
AND
Title = 'Spanish Dancer'
AND
Copy = '635/75';*/
-- Use the new WorkID value (597 in this case)
/* *** SQL-INSERT-CH10A-02 *** */
INSERT INTO TRANS (DateAcquired, AcquisitionPrice, WorkID)
VALUES ('06/8/2010', 200.00, 597);