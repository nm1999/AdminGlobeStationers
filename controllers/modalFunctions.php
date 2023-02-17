<?php

// addSessionSubmit
if (isset($_POST['addSessionSubmit'])) {
    // once the submit button is hit
    if ( (isset($_POST['opening_power_units']) && $_POST['opening_power_units'] != "") && (isset($_POST['createdBy']) && $_POST['createdBy'] != "") && (isset($_POST['opening_cash']) && $_POST['opening_cash'] != "")) {

        // check fields have data and handle the situation
        $opening_cash = isset($_POST['opening_cash']) && $_POST['opening_cash'] != "" ? urlencode($_POST['opening_cash']) : "";
        $createdBy = isset($_POST['createdBy']) && $_POST['createdBy'] != "" ? urlencode($_POST['createdBy']) : "";
        $opening_power_units = isset($_POST['opening_power_units']) && $_POST['opening_power_units'] != "" ? urlencode($_POST['opening_power_units']) : "";
        
        // clear the _POST array data
        $_POST = array();

        $jsonobj =  file_get_contents("https://api.destineyent.com/api/work_session/createSession.php?opening_cash=$opening_cash&createdBy=$createdBy&opening_power_units=$opening_power_units");

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
    } else {
        $reg_error = "Please enter either the account_id name or account_id code";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}

// close session
if (isset($_POST['closeSessionSubmit'])) {
    // once the submit button is hit
    if (isset($_POST['account_id']) && $_POST['account_id'] != "" && isset($_POST['amount']) && $_POST['amount'] != "") {

        function clean_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $closing_power_units = clean_input($_POST['closing_power_units']);
        // session_id, closing_power_units
        if ($session_id = clean_input($_POST['session_id'])) {
            $account_idArray = $_POST['account_id'];
            $amountArray = $_POST['amount'];
            $_POST = array();
            $acctAmountArray = array();
            // echo '<script>alert("Hi' . $JsonEconded . '")</script>';
            
            if (count($account_idArray) ===  count($amountArray)) {
                
                for ($i = 0; $i < count($account_idArray); $i++) {
                    $rowInNewArray['account_id'] = $account_idArray[$i];
                    $rowInNewArray['amount'] = $amountArray[$i];
                    
                    array_push($acctAmountArray, $rowInNewArray);
                }
                $response['session_id'] = $session_id;
                $response['closing_power_units'] = $closing_power_units;
                $response['totalCount'] = count($acctAmountArray);
                $response['close_session_data'] = $acctAmountArray;
                $JsonEconded = json_encode($response);
                // echo json_decode($JsonEconded);
                
                if ($jsonobj =  file_get_contents("https://api.destineyent.com/api/work_session/closeSession.php?raw_data=$JsonEconded")) {
                    
                    if ($PHPobj = json_decode($jsonobj)) {
                        if ($PHPobj->success == 0) {
                            // echo '<script>alert("Hieeedsfff' . $session_id . '")</script>';
                            $order_error = $PHPobj->message;
                            echo '<script>alert("' . $order_error . '")</script>';
                        } elseif ($PHPobj->success == 1) {
                            $order_message = $PHPobj->message;
                            echo '<script>alert("' . $order_message . '")</script>';
                        } else {
                            $order_message = "Unknown Error!";
                            echo '<script>alert("' . $order_message . '")</script>';
                        }
                    } else {
                        $order_error = "Internal Error";
                        echo '<script>alert("' . $order_error . '")</script>';
                    }
                } else {
                    $order_error = "Error receiving response";
                    echo '<script>alert("' . $order_error . '")</script>';
                }
            } else {
                $order_error = "Your order seems to have had an error. please try again.";
                echo '<script>alert("' . $order_error . '")</script>';
            }
        } else {
            $order_error = "Username error";
            echo '<script>alert("' . $order_error . '")</script>';
        }
    } else {
        $order_error = "Empty Cart";
        echo '<script>alert("' . $order_error . '")</script>';
    }
}

// create / add new user
if (isset($_POST['add_user_submit'])) {
    // once the submit button is hit
    if ($_POST['first_name'] != "" && $_POST['user_name'] != "" && $_POST['contact'] != "") {

        // check fields have data and handle the situation
        $first_name = isset($_POST['first_name']) && $_POST['first_name'] != "" ? urlencode($_POST['first_name']) : "";
        $last_name = isset($_POST['last_name']) && $_POST['last_name'] != "" ? urlencode($_POST['last_name']) : "";
        $user_name = isset($_POST['user_name']) && $_POST['user_name'] != "" ? urlencode($_POST['user_name']) : "";
        $email = isset($_POST['email']) && $_POST['email'] != "" ? urlencode($_POST['email']) : "";
        $address = isset($_POST['address']) && $_POST['address'] != "" ? urlencode($_POST['address']) : "";
        $contact = isset($_POST['contact']) && $_POST['contact'] != "" ? urlencode($_POST['contact']) : "";
        $password = $passwordConfirm = $contact;
        
        $_POST = array();

        $jsonobj =  file_get_contents("https://api.destineyent.com/api/users/createUser.php?first_name=$first_name&last_name=$last_name&user_name=$user_name&email=$email&address=$address&phone_number=$contact&password=$password&passwordConfirm=$passwordConfirm");

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
    } else {
        $reg_error = "Please fill all fields";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}
