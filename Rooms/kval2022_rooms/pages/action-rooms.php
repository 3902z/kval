<?php
if(isset($_POST['send']))
{
    if(isset($_POST["r_action"])
    ){
        $rooms = mysqlGetRoomByAction(
            $_POST["r_action"]
        );
        if ($rooms) {
            echo "<pre>";
            print_r($rooms);
            echo "</pre>";
        } else {
            echo "Не найдено.";
        }
    }
}
?>
<h2>По типу комнаты</h2>
<div class="form">
    <form method="POST" action="action-rooms" class="row g-3">

        <label>Тип сделки</label>
        <select name="r_action" class="form-select">
            <option selected value="Обмен">Обмен</option>
            <option value="Покупка">Покупка</option>
            <option value="Продажа">Продажа</option>
        </select>

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>






