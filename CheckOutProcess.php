<?php
require('DBHelper.php');
session_start();
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

// $roomType = isset($_POST['room-type']) ? $_POST['room-type'] : false;
// $description = isset($_POST['description']) ? $_POST['description'] : false;

$query = "UPDATE booking SET status = 2 WHERE BookingId = $id";
$result = DBHelper::execute($query);

if($result) {
    header('location: CheckOut.php');
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
}

?>