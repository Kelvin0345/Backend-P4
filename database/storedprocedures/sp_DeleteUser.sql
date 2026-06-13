DELIMITER $$

DROP PROCEDURE IF EXISTS Sp_DeleteUser$$

CREATE PROCEDURE Sp_DeleteUser(
    IN p_id INT
)
BEGIN 
    delete from users
    WHERE  id = p_id;

    select row_count() AS affected;
end$$