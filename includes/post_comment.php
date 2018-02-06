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

// Query to post comment
$post_comment = $conn->query("INSERT INTO posts_comments (pid, username, comment) VALUES ('$pid', '$username', '$comment_content') ");