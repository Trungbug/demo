<?php
require('DBHelper.php');
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_SESSION['facilitiesId'])) {
        $id = $_SESSION['facilitiesId'];
    }

    $name = isset($_POST['facilities-name']) ? $_POST['facilities-name'] : false;
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : false;
    $price = isset($_POST['price']) ? $_POST['price'] : false;
    $totalPrice = isset($_POST['total-price']) ? $_POST['total-price'] : false;
    
    if($name && $quantity && $price && $totalPrice) {
        // convert gia tien
        $gia = 0;
        for($i = 0; $i < strlen($price); ++$i) {
            if($price[$i] >= '0' && $price[$i] <=' 9') {
                $gia = $gia * 10 + ($price[$i] - '0');
            }
        }   
        
        // convert tong tien
        $tongtien = 0;
        for($i = 0; $i < strlen($totalPrice); ++$i) {
            if($totalPrice[$i] >= '0' && $totalPrice[$i] <=' 9') {
                $tongtien = $tongtien * 10 + ($totalPrice[$i] - '0');
            }
        }   

        $query = "update facilities set name = '$name', quantity = $quantity, price = $gia, TotalPrice = $tongtien where id = $id";
        $result = DBHelper::execute($query);

        if($result) {
            header('location: Facilities.php');
        }
        else {
            echo 'Loi cap nhap phong';
        }
    }
}
?>