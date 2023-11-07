<?php
require('DBHelper.php');
$id = isset($_GET['id']) ? $_GET['id'] : false;

if($id) {
    
        $query = "delete from booking where BookingId = $id";
        $result = DBHelper::execute($query);

        if($result) {
            echo "<script>alert('đã xóa!');</script>";
            header('location: Booked.php');
            
        }
    }

?>