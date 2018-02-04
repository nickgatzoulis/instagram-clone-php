<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 03/02/2018
 * Time: 23:29
 */
if (isset($_POST['login_submit'])) {


} else {

}

echo "<br/>";

$REG_ERRORS = [];



if (isset($_POST['signup_submit'])) {
    $username = $_POST['username_signup'];
    $email_signup = $_POST['email_signup'];
    $password_signup = $_POST['password_signup'];
    $password_signup_c = $_POST['password_signup_c'];


    if (empty($username)) {
        $REG_ERRORS['username_empty'] = 'Username is empty.';
    } else {
        // Username sanitize and clean up
        $username = strip_tags($username);
        $username = str_replace(' ', '', $username);
        $username = $conn->real_escape_string($username);
    }

    if (empty($email_signup)) {
        $REG_ERRORS['email_empty'] = 'Email is empty.';
    } else {
        // Email sanitize and clean up
        $email_signup = strip_tags($email_signup);
        $email_signup = str_replace(' ', '', $email_signup);
        $email_signup = filter_var($email_signup, FILTER_SANITIZE_EMAIL);
        $email_signup = $conn->real_escape_string($email_signup);
    }


    // Check if passwords are empty or not
    if (empty($password_signup) || empty($password_signup_c)) {
        $REG_ERRORS['pass_empty'] = 'Please fill in the password field(s).';
    } else {

        // Strip the tags
        $password_signup = strip_tags($password_signup);
        $password_signup_c = strip_tags($password_signup_c);

        // Check if passwords are the exactly same
        if ($password_signup != $password_signup_c) {
            $REG_ERRORS['pass_mismatch'] = 'Passwords do not match.';
        } else {

            // Check the length of the password
            if (strlen($password_signup) < 6) {
                $REG_ERRORS['pass_short'] = 'Password is too short. Min: 6 chars.';
            } else {
                $password_signup = $conn->real_escape_string($password_signup);
            }

        }
    }

    // CHeck if there are any errors inside the $REG_ERRORS associative array
    if (empty($REG_ERRORS)) {
        // If there are no errors, proceed with adding values to database.
    }
}

