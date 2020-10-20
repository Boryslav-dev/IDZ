<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>FineCalculator</title>
</head>
<body>
    <!-- *********  Header  ********** -->
    <header>
        <div id = "header">
            <h1><a href="index.php"><b>FINE</b>Calculator</a></h1>
            <div id = "menu">
                <ul>
                    <li id = "converter"><a href ="">Конвертаторы</a></li>
                    <li id = "about"><a href = "about.php">О нас</a></li>
                </ul>  
            </div>
            <h2><a href="reg.php"><b>Зарегистрироваться</b></a>
            <h3><a href="login.php"><b>Войти</b>
            </a>
        </div>    
    </header>
    <!-- *********  Content  ********** -->
    <div id = "content">
        <div class="info-content">
            <h4>Данные храняться в DataBase</h4>
            <p>Я использую XAMPP для хранения данных</p>
        </div>
        
        <div class="info-content">
            <h4>Можно создавать сущности</h4>
            <p>Можно создать свой раздел расходов которых сохранится в DataBase</p>
        </div>
        
        <div class="info-content">
            <h4>Что-то ещё</h4>
            <p>Ещё у нас работает что-то</p>
        </div>
        <?php
    // Проверяем текущюю ссесию
    if (empty($_SESSION['login']) or empty($_SESSION['id'])){
        // Если пусты, то выводим
        echo "<div class = 'info-reg'><p>Что бы Зарегистрироваться нажмите <a href = 'reg.php'> здесь</a></p></div>";
    }
    else{    
      echo"<div class='info-acc'>
            <h5> Ваша учётная запись. </h5>
            <p> Здесь представлены самые популярные категории расходов, если у вас нет расходов в одной из категории, просто пропустите или поставьте 0. </p>   
            <form action='check.php' method = 'post'>
                <p>
                    <label>Коммунальные:</label>
                    <input name='tax' type='text' size='5' maxlength='32'><br>
                    <label>Питание:</label>
                    <input name='food' type='text' size='5' maxlength='32'><br>
                    <label>Бытовые вещи:</label>
                    <input name='things' type='text' size='5' maxlength='32'><br>
                    <label>Одежда:</label>
                    <input name='clother' type='text' size='5' maxlength='32'><br>
                    <label>Машина:</label>
                    <input name='car' type='text' size='5' maxlength='32'><br>
                    <label>Мобильный + интернет:</label>
                    <input name='mobile' type='text' size='5' maxlength='32'><br>
                    <label>Програмное обеспечение:</label>
                    <input name='soft' type='text' size='5' maxlength='32'><br>   
                 <input class = 'button' type='submit' name='submit' value ='Отправить'/>
                </p>
            </form>";
    }
    ?>
    </div>
    </div>
    </div>
    <div class = "side-menu">
        <input type="checkbox" id="hmt" class="hidden-menu-ticker">

        <label class="btn-menu" for="hmt">
            <span class="first"></span>
            <span class="second"></span>
            <span class="third"></span>
        </label>
        <?php
        include ("db.php");
        if (!empty($_SESSION['login']) or !empty($_SESSION['id'])){
        $current_id = $_SESSION['id'];
        $result_tax = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'tax'");
        $myrow_tax = mysqli_fetch_array($result_tax);
        $result_food = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'food'");
        $myrow_food = mysqli_fetch_array($result_food);
        $result_things = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'things'");
        $myrow_things = mysqli_fetch_array($result_things);
        $result_clother = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'clother'");
        $myrow_clother = mysqli_fetch_array($result_clother);
        $result_car = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'car'");
        $myrow_car = mysqli_fetch_array($result_car);
        $result_mobile = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'mobile'");
        $myrow_mobile = mysqli_fetch_array($result_mobile);
        $result_soft = mysqli_query( $db, "SELECT SUM FROM category WHERE id = '$current_id' AND NAME Like 'soft'");
        $myrow_soft = mysqli_fetch_array($result_soft);
        }
        if (!empty($_SESSION['login']) or !empty($_SESSION['id'])){
            echo" <div class = hidden-menu><ul><li class = 'main'>" . $_SESSION['login'];echo"</li>";
            echo "<li><strong>Ваши текущие расходы:</strong></li>";
            echo "<li>Коммунальные: " . $myrow_tax['SUM']; echo"</li>";
            echo "<li>Питание: " . $myrow_food['SUM'];echo"</li>";
            echo "<li>Бытовые вещи: " . $myrow_things['SUM'];echo"</li>";
            echo "<li>Одежда: " . $myrow_clother['SUM'];echo"</li>";
            echo "<li>Машина: " .  $myrow_car['SUM'];echo"</li>";
            echo "<li>Мобильный + интернет: " . $myrow_mobile['SUM'];echo"</li>";
            echo "<li>Програмное обеспечение: " .  $myrow_soft['SUM'];echo"</li>";
            echo "</ul>";
        }
    

    ?>

    </div>
    </div>
</body>
</html>
