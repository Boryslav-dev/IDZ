<?php
    session_start();

    $current_id = $_SESSION['id'];

    $tax = 0;
    $food = 0;
    $things = 0;
    $clother = 0;
    $car = 0;
    $mobile = 0;
    $soft = 0;

    function Check($check, $check_2)
    {
        if(isset($check)){ // Заносим введеный пользователем логин, если пустой, то удаляем переменную 
            $check_2 = $check;
            if($check_2 == ''){
                $check_2 = 0;
            }
        } return $check_2;
    }
  
    $tax = Check($_POST['tax'], $tax);
    $food = Check($_POST['food'], $food);
    $things = Check($_POST['things'], $things);
    $clother = Check($_POST['clother'], $clother);
    $car = Check($_POST['car'], $car);
    $mobile = Check($_POST['mobile'], $mobile);
    $soft = Check($_POST['soft'], $soft);
    include ("db.php");
    $choose_2 = mysqli_query( $db, "UPDATE category SET SUM = SUM+'$tax' WHERE Id Like '$current_id' AND NAME Like 'tax'");
        mysqli_query ( $db, "UPDATE category SET SUM = SUM+'$food' WHERE Id Like '$current_id' AND NAME Like 'food'");
        mysqli_query ( $db, "UPDATE category SET SUM = SUM+'$things' WHERE Id Like '$current_id' AND NAME Like 'things'");
        mysqli_query ( $db, "UPDATE category SET SUM = SUM+'$clother' WHERE Id Like '$current_id' AND NAME Like 'clother'"); 
        mysqli_query ( $db, "UPDATE category SET SUM = SUM+'$car' WHERE Id Like '$current_id' AND NAME Like 'car'");
        mysqli_query ( $db, "UPDATE category SET SUM = SUM+'$mobile' WHERE Id Like '$current_id' AND NAME Like 'mobile'");
        mysqli_query ( $db, "UPDATE category SET SUM = SUM+'$soft' WHERE Id Like '$current_id' AND NAME Like 'soft'");
    if ($choose_2 == 'true'){
        echo "Категории успешно заполнены<a href= 'index.php'> вернуться </a>";
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
