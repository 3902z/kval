<h2>Максимальное количество штрафов</h2>
<?php
    $penalties = getMaxPenalties();
    foreach ($penalties as $penalty) {
        echo $penalty['c_name'] . " : штрафов : " . $penalty['p_count'] . "<br />";
    }
?>
