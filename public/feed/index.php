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



        </div>
    </div>
</div>
<?php require_once "../../includes/scripts.php"; ?>

<script>
    $(document).ready(() => {
        $(".feed").load('../../includes/get_feed.php');

        $(".feed").on('click', '.like', (event) => {
            let id = event.target.id;
            alert(id);

        });

    });
</script>


</body>
</html>
