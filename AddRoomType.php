<?php
    require('DBHelper.php');

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $roomType = isset($_POST['room-type-name']) ? $_POST['room-type-name'] : false;
        $description = isset($_POST['description']) ? $_POST['description'] : false;
    
        $query = "insert into roomtype(typename, description) values('$roomType', '$description')";
        $result = DBHelper::execute($query);

        if($result) {
            header('location: MyRoomType.php');
        }
    }
?>