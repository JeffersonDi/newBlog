<?php

function validateFeedback($feedback_id)
{
    $errors = array();

    if (empty($feedback_id['username'])) {
        array_push($errors, 'Введите свое имя');
    }
    if (empty($feedback_id['email'])) {
        array_push($errors, 'Введите почту');
    }
    if (empty($feedback_id['topic'])) {
        array_push($errors, 'Введите тему');
    }
    if (empty($feedback_id['body'])) {
        array_push($errors, 'Введите текст сообщения');
    }
    
    return $errors;
}