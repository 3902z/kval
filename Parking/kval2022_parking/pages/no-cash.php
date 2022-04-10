<h2>Без оплаты</h2>
<?php

    $tickets = mysqlGetNoCash();
    if ($tickets) {
        echo "<pre>";
        print_r($tickets);
        echo "</pre>";
    }

?>