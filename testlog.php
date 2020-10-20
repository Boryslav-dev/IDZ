<?php
    session_start();
if (isset($_POST['login'])){
     $login = $_POST['login'];
      if ($login == ''){
           unset($login);
        } 
    } 
    if (isset($_POST['password'])){
         $password=$_POST['password']; 
         if ($password ==''){
              unset($password);
            } 
        }
if (empty($login) or empty($password)) 
    {
    exit ("Не все поля заполнены");
    }
    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
  // Подключение к базе данных 
    include ("db.php");
$result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    //Проверка на наличия логина или пароля
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {
    //Проверка паролей
    if ($myrow['password']==$password) {
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];
    echo "<div id = 'vhod'><p>Вы успешно вошли на сайт! <a href='index.php'>Главная страница</a></p></div>";
    }// Храним в ссесия данные о пользователе
    else
    {
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    }
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