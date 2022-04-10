<?php if(!empty($_SESSION['flash'])):?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['flash']?>
    </div>
<?php endif;?>
<?php
if(isset($_POST['send']))
{
    if(isset($_POST["customer_name"])
        && isset($_POST["r_type"])
        && isset($_POST["r_action"])
        && isset($_POST["r_floor"])
        && isset($_POST["r_footage"])
    ){
        $id = mysqlAddRequest(
            $_POST["customer_name"],
            $_POST["r_type"],
            $_POST["r_action"],
            $_POST["r_floor"],
            $_POST["r_footage"]
        );
        if (is_array($id)) {
            echo "<pre>";
            print_r($id);
            echo "</pre>";
        } else {
            $_SESSION['flash'] = 'Заявка оформлена. ID=' . $id;
            header("Location: ".$_SERVER['REQUEST_URI']);
        }
    }
}else{
    if(!empty($_SESSION['flash']))
    {
        unset($_SESSION['flash']);
    }
}
?>
<h2>Новая заявка</h2>
<div class="form">
    <form method="POST" action="new-request" class="row g-3">

        <label>ФИО Клиента</label>
        <input type="text" name="customer_name" class="form-control">

        <label>Количество комнат(вид комнаты)</label>
        <select name="r_type" class="form-select">
            <option selected value="1-комнатная">1-комнатная</option>
            <option value="2-комнатная">2-комнатная</option>
            <option value="3-комнатная">3-комнатная</option>
            <option value="Студия">Студия</option>
            <option value="Дом">Дом</option>
        </select>

        <label>Тип сделки</label>
        <select name="r_action" class="form-select">
            <option selected value="Обмен">Обмен</option>
            <option value="Покупка">Покупка</option>
            <option value="Продажа">Продажа</option>
        </select>

        <label>Этаж</label>
        <input type="text" name="r_floor" class="form-control">

        <label>Метраж</label>
        <input type="text" name="r_footage" class="form-control">

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>





