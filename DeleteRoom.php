<?php
require('DBHelper.php');

$roomId = isset($_GET['roomId']) ? $_GET['roomId'] : false;

if($roomId != false) {
    $query = "select * from booking inner join room on booking.RoomId = room.RoomId and room.RoomId = $roomId";
    $result = DBHelper::execute($query);
    if($result->num_rows > 0) {
        echo "<script> alert('Phòng đang có người đặt. Không thể xóa được') </script>";
    }
    else {
        $query = "delete from room_facilities where RoomId = '$roomId'";
        $result = DBHelper::execute($query);

        $query = "delete from room where roomid = '$roomId'";
        $result = DBHelper::execute($query);
        if($result) {
            header('location: MyRoom.php');
        }
        else {
            echo 'Loi xoa phong';
        }
    }
}
?>
