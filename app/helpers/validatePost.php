<?php

function validatePost($post_id)
{
    $errors = array();

    if (empty($post_id['title'])) {
        array_push($errors, 'Введите название поста');
    }
    if (empty($post_id['body'])) {
        array_push($errors, 'Введите содержание');
    }
    if (empty($post_id['topic_id'])) {
        array_push($errors, 'Выбирите тему');
    }
    $existingPost = selectOne('posts', ['title' => $post_id['title']]);
    if ($existingPost) {
        if ($existingPost['id'] != $post_id['id'] && isset($post_id['update-post'])) {
            array_push($errors, 'Пост с таким заголовком уже существует');
        }
        if (isset($post_id['add-post'])) {
            array_push($errors, 'Пост с таким заголовком уже существует');
        }
    }
    return $errors;
}
