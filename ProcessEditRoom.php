<?php
require('DBHelper.php');
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_SESSION['roomId'])) {
        $roomId = $_SESSION['roomId'];
    }
    $roomName = isset($_POST['room-name']) ? $_POST['room-name'] : false;
    $selectedRoomTypes = isset($_POST["room-type"]) ? $_POST["room-type"] : false;
    $roomImage = isset($_POST['room-image']) ? "C:\\\\ProgramData\\\\MySQL\\\\MySQL Server 8.0\\\\Uploads\\\\".$_POST['room-image'] : false;
    $roomPrice = isset($_POST['room-price']) ? $_POST['room-price'] : false;
    $roomArea = isset($_POST['room-area']) ? $_POST['room-area'] : false;
    $maxGuests = isset($_POST['room-max-guests']) ? $_POST['room-max-guests'] : false;
    $roomStatus =  isset($_POST['room-status']) ? $_POST['room-status'] : false;
   
    
    $q = "select roomtypeid from roomtype where typename = '$selectedRoomTypes'";
    $r = DBHelper::execute($q);

    $roomTypeID = $r->fetch_array(MYSQLI_ASSOC)['roomtypeid'];

    $query = "update room set roomname = '$roomName', roomtypeid = $roomTypeID, pricepernight = $roomPrice, area = $roomArea, quantity = $maxGuests, status = '$roomStatus' where RoomId = $roomId";
    $result = DBHelper::execute($query);

    if($roomImage != "C:\\\\ProgramData\\\\MySQL\\\\MySQL Server 8.0\\\\Uploads\\\\") {
        $query = "update room set image = load_file('$roomImage') where RoomId = $roomId";
        $result = DBHelper::execute($query);
    }

    if($result) {
        header('location: MyRoom.php');
    }
    else {
        echo 'Loi cap nhap phong';
    }
}
?>