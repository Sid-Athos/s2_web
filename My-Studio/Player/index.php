<?php
    if(isset($_GET['page'])){
        switch($_GET['page']):
            case 'administration';
                include './Controllers/admin.php';
                break;
            default:
        endswitch;
    } else {
        include('./errors/404/404.html');
    }
?>
                
