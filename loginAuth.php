<?php
session_start(); // Start the session
// define variables and set to empty values
$user_name = $error = $password = "";

if (isset($_SESSION['user_data'])) {
    //already logged in, redirect to mill dashboard
    header("Location:index.php");
    die;
} else {
    //now to log in

    if (isset($_POST['login_submit'])) {

        if ($_POST['user_name'] != "" || $_POST['password'] != "") {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            $jsonobj =  file_get_contents("https://api.globestationers.com/api/users/loginUser.php?user_name=$user_name&password=$password");

            $PHPobj = json_decode($jsonobj);

            if ($PHPobj->success == 0) {
                $error = $PHPobj->message;
            } else {
                $_SESSION['user_data'] = $PHPobj->data;

                header("Location:index.php");
                die;
            }
        } else {
            $error = "Please fill all fields";
        }
    } else {
        //$error = "Please hit the submit button";
    }
}
