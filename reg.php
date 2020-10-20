<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <title>Регистрация</title>
    </head>

    <body>
    <div id = "formlog">
        <h2>Регистрация</h2>
    <form action="configuration_users.php" method="post">
    <!--**** configuration_users.php - это адрес обработчика. ***** -->
<p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="32" maxlength="32">
</p>
<!--**** В текстовое поле (name="login" type="text") для логина ***** -->
<p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="32" maxlength="32">
</p>
<!--**** В поле для паролей (name="password" type="password") для пароля ***** --> 
<p>
    <input name="submit" type="submit" value="Зарегистрироваться">
<!--**** Кнопка отправляет данные на страничку configuration_users.php ***** --> 
</p></form>
    </div>
    </body>
 </html>