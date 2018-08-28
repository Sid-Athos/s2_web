<?php

    function get_date(&$db){
        $query = 
            "SELECT 
            DAYNAME(CURRENT_TIMESTAMP()), 
            DAY(CURRENT_TIMESTAMP()), 
            MONTHNAME(CURRENT_TIMESTAMP()), 
            YEAR(CURRENT_TIMESTAMP())";
            $query_params = NULL;

            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }catch(PDOException $ex){   
                die("Failed to run query: " . $ex->getMessage());
            }

            $row = $stmt -> fetchAll();
            $pattern = array(array("/^l/","/^j/","/^f/","/^m/","/^a/","/^s/","/^o/","/^n/","/^d/"),array("L","J","F","M","A","S","O","N","D"));
            $row[0]['MONTHNAME(CURRENT_TIMESTAMP())'] = preg_replace($pattern[0],$pattern[1],$row[0]['MONTHNAME(CURRENT_TIMESTAMP())']);
            $row[0]['DAYNAME(CURRENT_TIMESTAMP())'] =  preg_replace($pattern[0], $pattern[1], $row[0]['DAYNAME(CURRENT_TIMESTAMP())']); 
            $actual_date = implode(" ",$row[0]);
            unset($row);
            return $actual_date;
    }
?>