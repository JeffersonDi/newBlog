<?php
function validateUser($user_reg)
{
    $errors = array();

    if (empty($user_reg['username'])) {
        array_push($errors, 'Введите имя пользователя');
    }
    if (empty($user_reg['email'])) {
        array_push($errors, 'Введите email');
    }
    if (empty($user_reg['password'])) {
        array_push($errors, 'Введите пароль');
    }
    if ($user_reg['passwordConf'] !== $user_reg['password']) {
        array_push($errors, 'Пароли не совпадают');
    }

    $existingUsername = selectOne('users', ['username' => $user_reg['username']]);
    if ($existingUsername) {
        array_push($errors, 'Пользователь с таким логином уже зарегестрирован');
    }

    $existingUserEmail = selectOne('users', ['email' => $user_reg['email']]);
    if ($existingUserEmail) {
        array_push($errors, 'Пользователь с такой почтой уже зарегестрирован');
    }

    return $errors;
}

function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Введите имя пользователя');
    }
    if (empty($user['password'])) {
        array_push($errors, 'Введите пароль');
    }

    return $errors;
}
