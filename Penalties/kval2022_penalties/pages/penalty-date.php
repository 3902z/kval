<?php
if(isset($_POST['send']))
{
    if(isset($_POST["date1"])
        && isset($_POST["date2"])
    ){
        $penalties = mysqlGetPenaltiesByDate(
            $_POST["date1"],
            $_POST["date2"]
        );
        echo "<pre>";
        print_r($penalties);
        echo "</pre>";
    }
}else{
    if(!empty($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
    }
}
?>
<h2>Штрафы за указанный период</h2>
<div class="form">
    <form method="POST" action="penalty-date" class="row g-3">

        <label>Дата от</label>
        <input type="date" name="date1" class="form-control">

        <label>Дата до</label>
        <input type="date" name="date2" class="form-control">

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>






