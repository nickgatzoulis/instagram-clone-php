<?php require_once "../../includes/global_inc.php"; ?>

<?php
if (!isset($_SESSION['logged_in'])) {
    header('Location: /public');
}

session_unset();
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
    <?php require_once "../../includes/header.php"; ?>
    <title><?php echo $LNG['home_site_title']; ?></title>
</head>
<body>

<div class="container">
    <div class="row h-100v">
        <div class="col-lg-4 align-self-center m-auto auth-box">
            <img src="../assets/img/logo.png" height="100" class="logo">
            <h4>You have been logged out.</h4>
            <p>Redirecting to homepage in <span class="countdown"></span></p>
        </div>
    </div>
</div>
<?php require_once "../../includes/scripts.php"; ?>
<script src="../assets/js/logout.js"></script>
</body>
</html>
