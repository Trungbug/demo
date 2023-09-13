<?php
require('DBHelper.php');
session_start();
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

$roomType = isset($_POST['room-type']) ? $_POST['room-type'] : false;
$description = isset($_POST['description']) ? $_POST['description'] : false;

$query = "update roomtype set typename = '$roomType', description = '$description' where roomtypeid = $id";
$result = DBHelper::execute($query);

if($result) {
    header('location: TypeRoom.php');
}

?>