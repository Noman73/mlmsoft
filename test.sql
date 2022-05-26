DROP PROCEDURE LoopDemo;

DELIMITER $$
CREATE PROCEDURE LoopDemo()
BEGIN
	DECLARE x  INT;
	DECLARE str varchar(50);
	-- DECLARE id  INT;
    DECLARE count int;
	DECLARE user_id  INT;
    SET X=0; 
	-- SET id = 1;
	SET str =  '';
        
	loop_label:  LOOP
		IF  x > 10 THEN 
			LEAVE  loop_label;
		END  IF;
            
		SET  x = x + 1;
        
        select id,name from users ;
        select count(id) from users where uplink_id=3;
        let count=
        set count =select count(id) from users where uplink_id=3;
		IF  (x mod 2) THEN
			ITERATE  loop_label;
		ELSE
			SET  str = CONCAT(str,x,',');
		END  IF;
	END LOOP;
	SELECT count;
END$$

DELIMITER ;