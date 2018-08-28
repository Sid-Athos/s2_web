<?php
    function date_to_mysql($album_date){
        $album_date = explode("/",$album_date);
        $date = $album_date[2].'-'.$album_date[1].'-'.$album_date[0];
        unset($album_date);
        return $date;
    }
?>