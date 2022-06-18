<?php

$textErrors = [
    'required' => 'Введите название темы',
    'exists' => 'Тема с таким название уже существует'
];

function validateTopicCreate($topic)
{
    global $textErrors;
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, $textErrors['required']);
    }
    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if($existingTopic){
        array_push($errors, $textErrors['exists']);
    }
    return $errors;
}

function validateTopicEdit($topic)
{
    global $textErrors;
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, $textErrors['required']);
    }
    $existingTopic = selectOne('topics', ['name' => $topic['name']], $topic['id']);
    if($existingTopic){
        array_push($errors, $textErrors['exists']);
    }
    return $errors;
}