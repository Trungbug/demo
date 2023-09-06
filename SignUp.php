<?php 
    require('Customer.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $userName = $password = $email = $phoneNumber = $confirmPassword = $gender = '';

        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            trim($name);
        }

        if(isset($_POST['userName'])) {
            $userName = $_POST['userName'];
        }

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
        }

        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            trim($email);
        }

        if(isset($_POST['phoneNumber'])) {
            $phoneNumber = $_POST['phoneNumber'];
        }

        if(isset($_POST['confirmPassword'])) {
            $confirmPassword = $_POST['confirmPassword'];
        }

        if(isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        
        if(isset($_POST['resigter'])) {
            if(!empty($password) && $password === $confirmPassword) {
                $account = new Account($userName, $password);
                if(!$account->isExist()) {
                    $account->insert();
                    $customer = new Customer($name, $phoneNumber, $email, $gender, $account);
                    $customer->insert();
                    echo 'Dang ky thanh cong';
                    //header('location: resigter.php');
                }
                else {
                    echo 'Tai khoan da ton tai';
                }
            }
            else {
                echo 'Vui long xac nhan mat khau dung!';
            }
        }
    }
?>