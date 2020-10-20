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
    <div id = "content">
        <p>Кучков Борислав КИУ-КИ-18-2</p>
    </div>
    <div class = "side-menu">
        <input type="checkbox" id="hmt" class="hidden-menu-ticker">

        <label class="btn-menu" for="hmt">
            <span class="first"></span>
            <span class="second"></span>
            <span class="third"></span>
        </label>

        <ul class="hidden-menu" >
            <li>
                <?php
                echo $_SESSION['login'];
                ?>
            </li>  
            <li><a href="">Link 2</a></li>
            <li><a href="">Link 3</a></li>  
        </ul>
    </div>
</body>
</html>

</body>