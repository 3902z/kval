<?php if(!empty($_SESSION['flash'])):?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['flash']?>
    </div>
<?php endif;?>
<?php
if(isset($_POST['send']))
{
    if(isset($_POST["car-name"])
        && isset($_POST["penalty-date"])
        && isset($_POST["penalty-time"])
        && isset($_POST["penalty-type"])
        && isset($_POST["penalty-amount"])
    ){
        $id = mysqlAddPenalty(
            $_POST["car-name"],
            $_POST["penalty-date"],
            $_POST["penalty-time"],
            $_POST["penalty-type"],
            $_POST["penalty-amount"]
        );
        $_SESSION['flash'] = 'Штраф добавлен. ID=' . $id;
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
}else{
    if(!empty($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
    }
}
?>
<h2>Новый штраф</h2>
<div class="form">
    <form method="POST" action="new-penalty" class="row g-3">

        <label for="car-name">Номер авто</label>
        <input type="text" id="car-name" name="car-name" required>

        <label for="penalty-date">Дата нарушения</label>
        <input type="date" id="penalty-date" name="penalty-date">

        <label for="penalty-time">Время нарушения</label>
        <input type="time" id="penalty-time" name="penalty-time">

        <label for="penalty-type">Вид нарушения</label>
        <input type="text" id="penalty-type" name="penalty-type">

        <label for="penalty-amount">Размер штрафа(руб)</label>
        <input type="text" id="penalty-amount" name="penalty-amount">

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>





