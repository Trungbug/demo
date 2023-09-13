<?php
    require('DBHelper.php');

    $bookingId = isset($_GET['id']) ? $_GET['id'] : false;
    if($bookingId) {
        $query = "update booking set status = 'Đang ở' where bookingid = $bookingId";
        $result = DBHelper::execute($query);
        if($result) {
            header('location: ListBooking.php');
        }
    }
?>