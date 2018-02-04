<?php require_once "../includes/global_inc.php"; ?>
<?php

if (!empty($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] == true) {
        header('Location: /public/feed');
    }
}
?>
<?php require_once "../includes/auth.php";?>

<!doctype html>
<html lang="en">
<head>
    <?php require_once "../includes/header.php"; ?>
    <title><?php echo $LNG['home_site_title']; ?></title>
</head>
<body>

<div class="container">
    <div class="row h-100v">
        <div class="col-lg-4 align-self-center m-auto auth-box">
            <img src="assets/img/logo.png" height="100" class="logo">

            <!-- Login Form -->
            <form method="post" id="login-form">
                <h3><? echo $LNG['login']; ?></h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="<? echo $LNG['username']; ?>">
                </div>
                <?php if (isset($LOGIN_ERRORS['username_empty'])) { echo "<label>{$LOGIN_ERRORS['username_empty']}</label>"; } ?>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="<? echo $LNG['password']; ?>">
                </div>
                <?php if (isset($LOGIN_ERRORS['pass_short'])) { echo "<label>{$LOGIN_ERRORS['pass_short']}</label>"; } ?>
                <?php if (isset($LOGIN_ERRORS['pass_empty'])) { echo "<label>{$LOGIN_ERRORS['pass_empty']}</label>"; } ?>
                <?php if (isset($LOGIN_ERRORS['details_invalid'])) { echo "<label>{$LOGIN_ERRORS['details_invalid']}</label>"; } ?>

                <button type="submit" name="login_submit" class="btn btn-primary"><? echo $LNG['login']; ?></button>
                <p class="helper"><? echo $LNG['helper_login_1']; ?> <a href="#signup"><? echo $LNG['helper_login_2']; ?></a></p>
            </form>
            <!-- /Login Form -->

            <!-- Login Form -->
            <form method="post" id="signup-form">
                <h3><? echo $LNG['signup']; ?></h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="username_signup" name="username_signup" aria-describedby="username" placeholder="<? echo $LNG['username']; ?>">
                </div>
                <?php if (isset($REG_ERRORS['username_empty'])) { echo "<label>{$REG_ERRORS['username_empty']}</label>"; } ?>
                <?php if (isset($REG_ERRORS['username_exists'])) { echo "<label>{$REG_ERRORS['username_exists']}</label>"; } ?>

                <div class="form-group">
                    <input type="text" class="form-control" id="email_signup" name="email_signup" aria-describedby="username" placeholder="<? echo $LNG['email']; ?>">
                </div>
                <?php if (isset($REG_ERRORS['email_empty'])) { echo "<label>{$REG_ERRORS['email_empty']}</label>"; } ?>
                <?php if (isset($REG_ERRORS['email_exists'])) { echo "<label>{$REG_ERRORS['email_exists']}</label>"; } ?>

                <div class="form-group">
                    <input type="password" class="form-control" id="password_signup" name="password_signup" placeholder="<? echo $LNG['password']; ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password_signup_c" name="password_signup_c" placeholder="<? echo $LNG['password_c']; ?>">
                </div>
                <?php if (isset($REG_ERRORS['pass_short'])) { echo "<label>{$REG_ERRORS['pass_short']}</label>"; } ?>
                <?php if (isset($REG_ERRORS['pass_empty'])) { echo "<label>{$REG_ERRORS['pass_empty']}</label>"; } ?>
                <?php if (isset($REG_ERRORS['pass_mismatch'])) { echo "<label>{$REG_ERRORS['pass_mismatch']}</label>"; } ?>
                <button type="submit" name="signup_submit" class="btn btn-primary"><? echo $LNG['signup']; ?></button>
                <p class="helper"><? echo $LNG['helper_signup_1']; ?> <a href="#login"><? echo $LNG['helper_signup_2']; ?></a></p>
            </form>
            <!-- /Login Form -->
        </div>
    </div>
</div>


<?php require_once "../includes/scripts.php"; ?>
<script src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/public/assets/js/auth.js"></script>
</body>
</html>