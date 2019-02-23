DELIMITER //

CREATE FUNCTION FirstNameFirst
(
	varFirstName  Char(25),
	varLastName   Char(25)
)
RETURNS Varchar(60) DETERMINISTIC

begin
DECLARE varFullName Varchar(60);
SET varFullName = CONCAT(varFirstName, ' ', varLastName);
RETURN varFullName;

END
// 

DELIMITER ;