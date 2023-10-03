<?php
    require('DBHelper.php');

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $facilitiesName = isset($_POST['facilities-name']) ? $_POST['facilities-name'] : false;
        $price = isset($_POST['price']) ? $_POST['price'] : false;
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : false;

        if($facilitiesName && $price && $quantity) {
            $totalPrice = $quantity * $price;
            // $q = "select * from facilities where name = '$facilitiesName'";
            // $r = DBHelper::execute($q);
            // if($r->num_rows > 0) {
            //     $quantity += $r->fetch_array(MYSQLI_ASSOC)['quantity'];
            //     $totalPrice = $quantity * $price + $r->fetch_array(MYSQLI_ASSOC)['totalprice'];
            //     $query = "update facilities set quantity=$quantity where name='$facilitiesName'";
            //     $result = DBHelper::execute($query);
            //     header('location: Facilities.php');
            // }
        //    else {
                $query = "insert into facilities(name, quantity, price, totalprice) values('$facilitiesName', $quantity, $price, $totalPrice)";
                $result = DBHelper::execute($query);
                if($result) {
                    header('location: Facilities.php');
                }
           // }
        }
    }
?>