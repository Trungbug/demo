<?php
    require('DBHelper.php');

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $facilitiesName = isset($_POST['facilities-name']) ? $_POST['facilities-name'] : false;
        $price = isset($_POST['price']) ? $_POST['price'] : false;
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : false;

        if($facilitiesName && $price && $quantity) {
            $totalPrice = $quantity * $price;
            $query = "insert into facilities(name, quantity, price, totalprice) values('$facilitiesName', $quantity, $price, $totalPrice)";
            $result = DBHelper::execute($query);
            if($result) {
                header('location: Facilities.php');
            }
        }
    }
?>