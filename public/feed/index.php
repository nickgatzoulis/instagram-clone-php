<?php require_once "../../includes/global_inc.php"; ?>
<?php
if (!isset($_SESSION['logged_in'])) {
    header('Location: /public');
}
?>

<!doctype html>
<html lang="<? echo $LNG['iso_code']; ?>">
<head>
    <?php require_once "../../includes/header.php"; ?>
    <title><?php echo $LNG['feed_site_title']; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/logo2.png" height="40"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/public/feed">
                        <i class="fas fa-fw fa-home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#upload">
                        <i class="fas fa-fw fa-cloud-upload-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo "/public/user/{$_SESSION['username']}"; ?>">
                        <i class="fas fa-fw fa-user"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>

</nav>


<div class="container">
    <div class="row">
        <div class="col-lg-6 feed">
            <?php
            $username = $_SESSION['username'];
            // Select all posts and their respective usernames and profile images
            $posts = $conn->query("SELECT * FROM posts INNER JOIN users ON posts.username = users.username ORDER BY pid DESC LIMIT 10");

            while ($row = $posts->fetch_assoc()) {

                // Set the $post_id to be the value of post id from fetched row.
                $post_id = $row['pid'];

                // Get the like status of the user (if user liked the image or not)
                $like_status = $conn->query("SELECT * FROM posts_likes WHERE pid = '$post_id' AND username = '$username'");

                // If the liked value is 1 then change the FontAwesome icon to fas
                if ($like_status->fetch_assoc()['liked'] == 1) {
                    $liked = "fas";
                } else {
                    $liked = "far";
                }

                // Get the total amount of likes of the specific image
                $like_total = $conn->query("SELECT SUM(liked) FROM posts_likes WHERE pid = '$post_id'");
                $total_likes = $like_total->fetch_assoc()['SUM(liked)'];

                // If the amount of likes is less than 1 then set the total likes to empty string.
                if ($total_likes < 1) {
                    $total_likes = '';
                }


                echo
                "
                <div class=\"row feed-row\">
                <div class=\"col-lg-12 feed-post\">
                    <div class=\"feed-user\">
                        <img src=\"{$row['profile_img']}\" class=\"thumbnail\" height=\"40\"/>
                        <h3><a href=\"/public/user/{$row['username']}\">{$row['username']}</a></h3>
                    </div>
                    <div class=\"feed-media\">
                        <img src=\"{$row['media']}\" class=\"feed-img\">
                    </div>
                    <div class=\"feed-reaction\">
                        <div class=\"row\">
                            <div class=\"col-6\">
                                <i class=\"{$liked} fa-fw fa-2x fa-heart\" id=\"postid_{$row['pid']}\"></i> <span>{$total_likes}</span>
                            </div>
                            <div class=\"col-6\">
                                <i class=\"far fa-fw fa-2x fa-comment\"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ";
            }

            ?>


        </div>
    </div>
</div>
<?php require_once "../../includes/scripts.php"; ?>



</body>
</html>
