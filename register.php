<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesom -->
    <script src="https://kit.fontawesome.com/cb0649ed49.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
    <link href="https: //fonts.googleapis.com/css2?family= Montserrat: wght @100 & display=swap" rel="stylesheet">
    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>

<body>
    <!-- Header -->
    <?php
    require "blocks/header.php";
    ?>
    <!-- /Header -->

    <div class="auth-content">
        <form action="register.php" method="post">
            <h2 class="form-title">Регистрация</h2>

            <div class="msg error">
                <li>Требуется имя пользователя</li>
            </div>

            <div>
                <label>Логин</label>
                <input type="text" name="username" class="text-input">
            </div>

            <div>
                <label>E-mail</label>
                <input type="email" name="email" class="text-input">
            </div>

            <div>
                <label>Пароль</label>
                <input type="password" name="password" class="text-input">
            </div>
            <div>
                <label>Повторите пароль</label>
                <input type="password" name="passwordConf" class="text-input">
            </div>

            <div>
                <button type="submit" name="register-btn" class="btn btn-big">Регистрация</button>
            </div>
            <p>или <a href="login.php">Авторизуйтесь</a></p>
        </form>
    </div>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Script -->
    <script src="js/scripts.js"></script>
</body>

</html>