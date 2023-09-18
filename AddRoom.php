<?php
    require('DBHelper.php');

    if($_SERVER["REQUEST_METHOD"] === "POST") {
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

        if($roomName && $selectedRoomTypes && $roomImage && $roomPrice && $roomArea && $maxGuests && $roomStatus) {
            $query = "insert into room(roomname, roomtypeid, image, pricepernight, area, quantity, status) values('$roomName', $roomTypeID, LOAD_FILE('$roomImage'), $roomPrice, $roomArea, $maxGuests, '$roomStatus')";
            $result = DBHelper::execute($query);

            if($result) {
                header('location: MyRoom.php');
            }
        }
    }
?>