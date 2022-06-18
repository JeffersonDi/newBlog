<?php
// include("../../path.php");
session_start();
require('connect.php');
require(ROOT_PATH . '/app/includes/dev.php');


function dd($value)
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuery($sql, $data)
{
    global $conn;

    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE activity=1";

    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " AND $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectOne($table, $conditions, $not = '')
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE activity=1 AND";
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    if (!empty($not)) {
        $sql = $sql . " AND NOT id=" . $not;
    }
    //dd($sql);
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

// function delete($table, $id)
// {
//     global $conn;
//     $sql = "DELETE FROM $table WHERE id=?";
//     $stmt = executeQuery($sql, ['id' => $id]);
//     return $stmt->affected_rows;
// }
//Удаление не полностью
function delete($table, $id)
{
    global $conn;
    $sql = "UPDATE $table SET activity=0";

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}
//Восстановление
function reestablish($table, $id)
{
    global $conn;
    $sql = "UPDATE $table SET activity=1";

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function getPostsByTopicId($topic_id)
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.activity=1 AND p.published=? AND topic_id=? ORDER BY created_at DESC";

    $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPublisedPosts()
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.activity=1 AND p.published=? ORDER BY created_at DESC";
    //dd($sql);
    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = 
    "SELECT p.*, u.username 
    FROM posts AS p 
    JOIN users AS u 
    ON p.user_id=u.id 
    WHERE p.activity=1 AND p.published=? AND p.title LIKE ? OR p.body LIKE ?";

    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
// $conditions = [
//     'username' => 'mo_dosaaf_Bograd',
//     'admin' => 1,
//     'email' => 'dosaaf@mail.ru',
//     'password' => 'aksldjfkjlasdhfkjsdh'
// ];
// $conditions = [
//     'name' => 'mo_dosaaf_Bograd',
//     'admin' => 1,
//     'email' => 'dosaaf@mail.ru',
//     'password' => 'aksldjfkjlasdhfkjsdh'
// ];
// selectAll('topics');
// $users = selectOne('users', $conditions);
// $users = create('users', $conditions);
// $id = update('users',2 , $conditions);
//  $id = reestablish('users', 1);
//  dd($id);