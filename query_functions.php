<?php
function find_user_by_username($username) {
    global $db;
    $sql = "SELECT * FROM users ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql)  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db), E_USER_ERROR);
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;
}
function display(){
    global $db;
    $sql = "SELECT * from blogs ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_blog_post_by_id($id){
    global $db;
    $sql = "SELECT * from blogs ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}
function find_blog_visitor_by_post_id($id){
    global $db;
    $sql = "SELECT * from visitors ";
    $sql .= "WHERE blog_id='" . db_escape($db, $id) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function update_post($post){
    global $db;
    $sql = "UPDATE blogs SET ";
    $sql .= "title='" . db_escape($db, $post['title']) . "', ";
    $sql .= "fullname='" . db_escape($db, $post['fullname']) . "', ";
    $sql .= "nickname='" . db_escape($db, $post['nickname']) . "', ";
    $p_post =  str_replace("\n", "<br/>", $post['post']);
    $sql .= "post='" . db_escape($db, $p_post) . "' ";
    $sql .= "WHERE id='" .db_escape($db, $post['id']). "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db), E_USER_ERROR);

    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function add_comment($comment){
    global $db;
    $sql = "INSERT INTO visitors ";
    $sql .= "(blog_id, fullname, nickname, date, hobbies, interest, comment) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $comment['blog_id']) . "',";
    $sql .= "'" . db_escape($db, $comment['fullname']) . "',";
    $sql .= "'" . db_escape($db, $comment['nickname']) . "',";
    $sql .= "'" . db_escape($db, $comment['date']) . "',";
    $sql .= "'" . db_escape($db, $comment['hobbies']) . "',";
    $sql .= "'" . db_escape($db, $comment['interest']) . "',";
    $sql .= "'" . db_escape($db, $comment['comment']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}