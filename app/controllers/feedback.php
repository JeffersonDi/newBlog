<?php

//include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateFeedback.php");

$errors = array();
$id = '';
$username = '';
$email = '';
$topic = '';
$body = '';

$table = 'feedbacks';

$feedbacks = selectAll($table);

if (isset($_POST['feedback-btn'])) {
    // dd($_POST);
    $errors = validateFeedback($_POST);

    if (count($errors) === 0) {
        unset($_POST['feedback-btn']);
        $feedback_id = create($table, $_POST);
        $_SESSION['message'] = "Сообщение успешно отправлено";
        $_SESSION['type'] = "success";
        unset($_POST['feedback-btn'], $_POST['username'], $_POST['email'], $_POST['topic'], $_POST['body'],);
        //header("Refresh:0");
        //header('location: ' . BASE_URL . '/login.php');
        //header('location: ' . BASE_URL . '/index.php');
        exit();

    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $topic = $_POST['topic'];
        $body = $_POST['body'];
        //dd($_POST);
    }
}
