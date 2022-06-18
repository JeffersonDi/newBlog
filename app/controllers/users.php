<?php

// $_SESSION['id'] = 1;
// $_SESSION['username'] = 'mo_dosaaf';

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$errors = array();
$id = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'users';

//$users = selectAll($table);
$admin_users = selectAll($table);

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Вы авторизованы';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }

    $_SESSION['activity'] = $user['activity'];
    exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    //dd($_POST);
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Пользователь администратор успешно создан";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);

            // dd($user);
            // Авторизация пользователя
            loginUser($user);
        }
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-user'], $_POST['passwordConf'], $_POST['id']);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1:0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "Пользователь администратор успешно изменен";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $email = $user['email'];
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            //Авторизация. редирект
            // Авторизация пользователя
            loginUser($user);
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            array_push($errors, 'Неправильные учетные данные');
        }
    }
}

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Пользователь администратор удален";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}
