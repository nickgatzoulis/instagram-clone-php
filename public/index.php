<?php require_once "../includes/global_inc.php"; ?>

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
                <div class="form-group">
                    <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="<? echo $LNG['username']; ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="<? echo $LNG['password']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <p class="helper"><? echo $LNG['helper_login_1']; ?> <a href="#"><? echo $LNG['helper_login_2']; ?></a></p>
            </form>
            <!-- /Login Form -->

            <!-- Signup Form -->
<!--            <form method="post" id="signup-form">-->
<!--                <div class="form-group">-->
<!--                    <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="--><?// echo $LNG['username']; ?><!--">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <input type="password" class="form-control" id="password" placeholder="--><?// echo $LNG['password']; ?><!--">-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                <p class="helper">Don't have an account? <a href="#">Create one!</a></p>-->
<!--            </form>-->
            <!-- /Signup Form -->

        </div>
    </div>
</div>

<?php require_once "../includes/scripts.php"; ?>
</body>
</html>