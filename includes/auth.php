<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 03/02/2018
 * Time: 23:29
 * 2) Add check against username characters for LOGIN & SIGNUP (minlength: 5)
 */

$REG_ERRORS = [];
$LOGIN_ERRORS = [];

// Log In logic
if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username is empty
    if (empty($username)) {
        $LOGIN_ERRORS['username_empty'] = $LNG['username_empty'];
    } else {
        $username = strip_tags($username);
        $username = str_replace(' ', '', $username);
        $username = $conn->real_escape_string($username);
    }


    // Check if password is empty
    if (empty($password)) {
        $LOGIN_ERRORS['pass_empty'] = $LNG['pass_empty'];
    } else {
        $password = strip_tags($password);

        // Check if password is short
        if (strlen($password) < 6) {
            $LOGIN_ERRORS['pass_short'] = $LNG['pass_short'];
        } else {
            $password = $conn->real_escape_string($password);
        }
    }

    // Check if there are any login errors
    if (empty($LOGIN_ERRORS)) {
        // Step 1 - Fetch user
        $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
        // Step 2 - Check if user with supplied username exists.
        if ($result->num_rows == 0) {
            $LOGIN_ERRORS['details_invalid'] = $LNG['details_invalid'];
        } else {
            $user = $result->fetch_assoc();
            print_r($user);

            // Step 3 - Check if supplied password ($password) is the same as fetched user's password
            if (password_verify($password, $user['password'])) {
                // Set the session's username to the fetched user's username
                $_SESSION['username'] = $user['username'];

                // This is how we know user is logged in
                $_SESSION['logged_in'] = true;

                header('Location: /public/feed');
            } else {
                $LOGIN_ERRORS['details_invalid'] = $LNG['details_invalid'];
            }
        }
    }
}


// Sign Up logic
if (isset($_POST['signup_submit'])) {
    $username = $_POST['username_signup'];
    $email_signup = $_POST['email_signup'];
    $password_signup = $_POST['password_signup'];
    $password_signup_c = $_POST['password_signup_c'];


    if (empty($username)) {
        $REG_ERRORS['username_empty'] = $LNG['username_empty'];
    } else {
        // Username sanitize and clean up
        $username = strip_tags($username);
        $username = str_replace(' ', '', $username);
        $username = $conn->real_escape_string($username);

        // Check if user with that username exists
        $usernameExistsQuery = $conn->query("SELECT * FROM users WHERE username = '$username'");

        if ($usernameExistsQuery->num_rows > 0) {
            $REG_ERRORS['username_exists'] = $LNG['username_exists'];
        }
    }

    if (empty($email_signup)) {
        $REG_ERRORS['email_empty'] = $LNG['email_empty'];
    } else {
        // Email sanitize and clean up
        $email_signup = strip_tags($email_signup);
        $email_signup = str_replace(' ', '', $email_signup);
        $email_signup = filter_var($email_signup, FILTER_SANITIZE_EMAIL);
        $email_signup = $conn->real_escape_string($email_signup);

        // Check if a user with that email already exists
        $emailExistsQuery = $conn->query("SELECT * FROM users WHERE email = '$email_signup'");

        if ($emailExistsQuery->num_rows > 0) {
            $REG_ERRORS['email_exists'] = $LNG['email_exists'];
        }
    }


    // Check if passwords are empty or not
    if (empty($password_signup) || empty($password_signup_c)) {
        $REG_ERRORS['pass_empty'] = $LNG['pass_empty'];
    } else {

        // Strip the tags
        $password_signup = strip_tags($password_signup);
        $password_signup_c = strip_tags($password_signup_c);

        // Check if passwords are the exactly same
        if ($password_signup != $password_signup_c) {
            $REG_ERRORS['pass_mismatch'] = $LNG['pass_mismatch'];
        } else {

            // Check the length of the password
            if (strlen($password_signup) < 6) {
                $REG_ERRORS['pass_short'] = $LNG['pass_short'];
            } else {
                $password_signup = $conn->real_escape_string(password_hash($password_signup, PASSWORD_BCRYPT));
            }

        }
    }

    // Check if there are any errors inside the $REG_ERRORS associative array
    if (empty($REG_ERRORS)) {
        // If there are no errors, proceed with adding values to database.
        $signupQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$password_signup', '$email_signup')";

        if ($conn->query($signupQuery)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: /public/feed');
        }
    }
}

