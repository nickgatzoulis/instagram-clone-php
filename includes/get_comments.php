<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 05/02/2018
 * Time: 18:23
 */

session_start();
require_once "{$_SERVER['DOCUMENT_ROOT']}/includes/db_connect.php";

$pid = $_POST['pid'];
$comments = $conn->query("SELECT * FROM posts_comments WHERE pid = '$pid'");

while ($result = $comments->fetch_assoc()) {
    echo $result['comment'];
}