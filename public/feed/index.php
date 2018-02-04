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
    <title><?php echo $LNG['logout_site_title']; ?></title>
</head>
<body>

</body>
</html>
