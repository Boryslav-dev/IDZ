<?php
    $db = mysqli_connect ("localhost","root","");
    mysqli_select_db ($db,'finecalculator') or die("Нет соединения с БД ".mysqli_connect_error());
    ?>