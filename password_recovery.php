<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();

define('SITE_KEY', '6LdXEX0gAAAAAFHW5rguSuybxI7hcZeX5pihcfmk');
define('SECRET_KEY', '6LdXEX0gAAAAAOPHifAPA2yOQKrbeagTT_2cr9oQ');

if($_POST){
    function getCaptcha($SecretKey){
        $response = file_get_contents("https://www.google.com/recaptcha/api.siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}");
        $result = json_decode($response);
        return $result;
    }

    $result = getCaptcha($_POST['g-recaptcha-response']);
    var_dump($result);
    if ($result->success == true && $result->score > 0.5) {
        echo "Success";
    }else{
        echo "You are robot";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesom -->
    <script src="https://kit.fontawesome.com/cb0649ed49.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Восстановление пароля</title>
</head>

<body>
    <!-- Header -->
    <?php
    include(ROOT_PATH . "/app/includes/header.php");
    ?>
    <!-- /Header -->

    <div class="auth-content">
        <form action="password_recovery.php" method="post">
            <h2 class="form-title">Восстановление пароля</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <div>
                <label>Введите логин или почту</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>

            <!-- добавление элемента div -->
            <input type="text" id="g-recaptcha-response" name="g-recaptcha-response"></div>

            <!-- js-скрипт гугл капчи -->
            <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>'></script>
            <script>
                grecaptcha.ready(function(){
                    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token){
                        document.getElementById('g-recaptcha-response').value=token;
                    });
                });
            </script>
            <div>
                <button type="submit" name="login-btn" class="btn btn-big">Восстановить</button>
            </div>
        </form>
    </div>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>