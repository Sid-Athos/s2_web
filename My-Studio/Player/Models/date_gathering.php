<?php
    include('./db_connect.php');
    function date_gathering($_POST){
        $query = "SELECT MONTHNAME(:date)";
        $query_params = array(':date' => $date);

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){   
            die("Failed to run query: " . $ex->getMessage());
        }
        $row = $stmt -> fetchAll();
        return $row;
    }
?>