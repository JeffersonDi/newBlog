<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$table = 'posts';

$errors = array();
$id = '';
$title =  '';
$body =  '';
$topic_id =  0;
$image =  '';
$published =  "";

if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);
    //dd($post);
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $image =  $post['image'];
    $published = $post['published'];
}

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = 'Пост успешно удален';
    $_SESSION['type'] = 'success';

    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);

    $_SESSION['message'] = 'Изменено';
    $_SESSION['type'] = 'success';

    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}

$posts = selectAll($table);
$topics = selectAll('topics');

if (isset($_POST['add-post'])) {
    adminOnly();
    //dd($_FILES['image']['name']);
    //dd($_POST);
    $errors = validatePost($_POST);
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;
        //dd($destination);
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        //dd($result);
        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Ошибка загрузки файлов");
        }
    } else {
        array_push($errors, "Картинка отсутствует");
    }
    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        //dd($_POST);
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);

        $_SESSION['message'] = 'Пост успешно создан';
        $_SESSION['type'] = 'success';

        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();

        //dd($post_id);
    } else {
        //dd($_POST);
        $title =  $_POST['title'];
        $body =  $_POST['body'];
        $topic_id =  $_POST['topic_id'];
        //$image =  $_POST['image'];
        //($_FILES);
        $published =  isset($_POST['published']) ? 1 : 0;
        //header('location: ' . BASE_URL . '/admin/posts/create.php');
    }
}

if (isset($_POST['update-post'])) {
    //dd($_POST);
    adminOnly();
    $errors = validatePost($_POST);
    if (!empty($_FILES['image']['name'] || !empty($image))) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;
        //dd($destination);
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        //dd($result);
        if ($result) {
            $_POST['image'] = $image_name;
            //dd($_POST);
        } else {
            array_push($errors, "Ошибка загрузки файлов");
        }
    } else {
        //array_push($errors, "Картинка отсутствует");
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = update($table, $id, $_POST);

        $_SESSION['message'] = 'Пост успешно обновлен';
        $_SESSION['type'] = 'success';

        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();

        //dd($post_id);
    } else {
        //dd($_POST);
        $title =  $_POST['title'];
        $body =  $_POST['body'];
        $topic_id =  $_POST['topic_id'];
        $image =  $_POST['image'];
        //($_FILES);
        $published =  isset($_POST['published']) ? 1 : 0;
        //header('location: ' . BASE_URL . '/admin/posts/create.php');
    }
}

// if (isset($_FILES['upl_img'])) {
//     $dir = ROOT_PATH . "/assets/img/" . $id . "_" . $title;
//     if (!is_dir($dir)) {
//         mkdir($dir, 0600, true);
//     }
//     $f_name = basename($_FILES['upl_img']['name']);
//     $uploadfile = $dir . basename($_FILES['upl_img']['name']);
//     if (move_uploaded_file($_FILES['upl_img']['tmp_name'], $uploadfile)) {
//         $out = ['success' => 1];
//         $out['data'] = ['url' => '/assets/img/' . $f_name];
//         $mod_out = json_encode($out);
//     }
// }
