<?php
    if(isset($_POST['login'])){ // Заносим введеный пользователем логин, если пустой, то удаляем переменную 
        $login = $_POST['login'];
        if($login == ''){
            unset($login);
        }
    }
    if(isset($_POST['password'])){ // Заносим введеный пользователем пароль, если пустой, то удаляем переменную 
        $password = $_POST['password'];
        if($password == ''){
            unset($password);
        }
    }
    if(empty($login) or empty ($password)){
        exit("Поля были введены не правильно, проверьте пожалуйста правильность ввода");
    }
    // Удаление лишних символов (пробелов)
    $login = htmlspecialchars($login);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    // Подключение к базе данных 
    include ("db.php");
    // Проверяем на наличения схожего логина
    $result = mysqli_query( $db, "SELECT id FROM users WHERE login LIKE '$login'");
    $myrow = mysqli_fetch_array($result);
    if(!empty($myrow['id'])){
        exit("Введённый логин уже зарегистрирован");
    }
    $result_2 = mysqli_query( $db, "INSERT INTO users (login, password) VALUES ('$login', '$password')");
    if ($result_2 == 'true'){
        echo "Вы зарегистрированы";
       $result_3 =  mysqli_query( $db, "SELECT id FROM users WHERE login LIKE '$login'");
       $myrow_2 = mysqli_fetch_array($result_3);
       $current_id  = $myrow_2['id'];
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'tax', '0')");
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'food', '0')");
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'things', '0')");
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'clother', '0')");
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'car', '0')");
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'mobile', '0')");
       mysqli_query ($db, "INSERT INTO category (id, NAME, SUM) VALUES ('$current_id', 'soft', '0')");
    }
    else{
        echo "Ошибка";
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