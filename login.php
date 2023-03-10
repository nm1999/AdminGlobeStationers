<?php include('loginAuth.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
	<!-- Bootstrap 4.5 CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/w3.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet" />
</head>
<style>
    .btn-primary{
        border-radius:2px;
        width:200px;
    }
    .w-75{
        margin:auto;

    }
    .side-login{
        background-color: maroon;
        border-radius:15px 0px 0px 15px;
    }
    .fa{
        position: absolute;
        font-size:23px;
        margin:10px;
    }
    input[type='text'], input[type='password']{
        padding-left:40px;
    }
</style>
<body class="">
    <div class="w3-card-4 w3-round mt-5 w3-padding" style="margin:auto;width:400px;">
        <div class="container">
            <div class="w3-center text-center">
                <img src="img/GSL-logo.png" alt="" style="width:100px;height:50px;">
                <h4 class="w3-center w3-padding m-3">Globe Stationers Limited</h4>
            </div>
            <div class="w-75">
                <form  method="POST" action="#">   
                    <?php
                        if ($error != '') {

                        echo '
                            <div class="example-alert">
                                <div class="alert alert-danger alert-icon alert-dismissible">
                                    <em class="icon ni ni-cross-circle"></em> <strong>' . $error . '</strong> <button class="close" data-bs-dismiss="alert"></button>
                                </div>
                            </div>
                        ';
                        } else {
                            echo 
                            '
                            <div class="nk-block-des">
                                <p>Sign into your account...</p>
                            </div>

                            '
                            ;
                        }
                    ?>             
                    <div class="mb-5">
                        <i class="fa fa-envelope"></i>
                        <input type="text" name="user_name" class="form-control" required placeholder="Enter user_name">
                    </div>
                    <div class="mb-5">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" class="form-control" required placeholder="Enter password">
                    </div>
                    <div class="formgroup text-center w3-center">
                        <input type="submit" name="login_submit" class="btn btn-primary" value="login" >
                    </div>
                    <br>   
                    <div class="text-center mb-3">
                        <a href="">Forgot password</a>
                    </div>             
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>