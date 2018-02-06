<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 06/02/2018
 * Time: 00:22
 */

session_start();
require_once "{$_SERVER['DOCUMENT_ROOT']}/includes/db_connect.php";

$pid = $_POST['pid'];
$username = $_SESSION['username'];
$comment_content = $_POST['comment_content'];
$post_date = date('Y-m-d H:i:s'); // The time of post

// Query to post comment
$post_comment = $conn->query("INSERT INTO posts_comments (pid, username, comment, post_date) VALUES ('$pid', '$username', '$comment_content', '$post_date') ");