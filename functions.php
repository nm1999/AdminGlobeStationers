<?php
function check_login()
{
    //check if inside session, there is user_data
    if (isset($_SESSION['user_data'])) {
        $user_data = $_SESSION['user_data'];
        return $user_data;
    } else {
        //redirect to login
        header("Location:login.php");
        die;
    }
}
