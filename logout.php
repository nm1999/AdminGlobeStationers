<?php
if (isset($_SESSION['user_data'])) {
  if (isset($_POST['submit-logout'])) {
    // remove all session variables
    session_unset();
    session_destroy();
    header("Location:login.php");
    die;
  }
} else {
  //already logged in
}
