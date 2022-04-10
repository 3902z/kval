<?php
if(isset($_POST['send']))
{
    if(isset($_POST["r_type"])
    ){
        $rooms = mysqlGetRoomByType(
            $_POST["r_type"]
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
    <form method="POST" action="type-rooms" class="row g-3">

        <label>Количество комнат(вид комнаты)</label>
        <select name="r_type" class="form-select">
            <option selected value="1-комнатная">1-комнатная</option>
            <option value="2-комнатная">2-комнатная</option>
            <option value="3-комнатная">3-комнатная</option>
            <option value="Студия">Студия</option>
            <option value="Дом">Дом</option>
        </select>

        <input type="submit" value="Отправить" name="send" class="btn btn-success">
    </form>
</div>






