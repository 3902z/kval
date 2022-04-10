<?php if(!empty($_SESSION['flash'])):?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['flash']?>
    </div>
<?php endif;?>
<?php
if(isset($_POST['send']))
{
    if(isset($_POST["client_name"])
        && isset($_POST["car_number"])
        && isset($_POST["car_brand"])
        && isset($_POST["t_date"])
        && isset($_POST["t_time"])
        && isset($_POST["t_price"])
    ){
        $id = mysqlAddTicket(
            $_POST["client_name"],
            $_POST["car_number"],
            $_POST["car_brand"],
            $_POST["t_date"],
            $_POST["t_time"],
            $_POST["t_price"]
        );
        $_SESSION['flash'] = 'Квитанция добавлена. ID=' . $id;
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
}else{
    if(!empty($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
    }
}
?>
<h2>Новая квитанция</h2>
<div class="form">
    <form method="POST" action="new-ticket" class="row g-3">

        <label>ФИО</label>
        <input type="text" name="client_name" class="form-control">

        <label>Номер машины</label>
        <input type="text" name="car_number" class="form-control">

        <label>Марка машины</label>
        <input type="text" name="car_brand" class="form-control">

        <label>Дата въезда</label>
        <input type="date" name="t_date" class="form-control">

        <label>Время въезда</label>
        <input type="time" name="t_time" class="form-control">

        <label>Стоимость</label>
        <input type="text" name="t_price" class="form-control">

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>





