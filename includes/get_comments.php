<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 05/02/2018
 * Time: 18:23
 * This PHP file fetches comments for specific PID passed via jQuery Ajax
 */

session_start();
require_once "{$_SERVER['DOCUMENT_ROOT']}/includes/db_connect.php";

$pid = $_POST['pid'];

// Selects all comments of that specific pid
$comments = $conn->query("SELECT * FROM posts_comments WHERE pid = '$pid'");

// Loop through every fetched row
while ($result = $comments->fetch_assoc()) {
    echo
    "
    <div class=\"comment\">
        <a href=\"/public/user/{$result['username']}\" class=\"comment-user\">{$result['username']}</a> <span class=\"comment-content\">{$result['comment']}</span>
    </div>";
}
echo "<input type=\"text\" class=\"post-comment\" id=\"postid_{$pid}\" placeholder=\"Post a comment...\">";