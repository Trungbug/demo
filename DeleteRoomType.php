<?php
require('DBHelper.php');
$id = isset($_GET['id']) ? $_GET['id'] : false;

if($id) {
    $query = "select * from booking inner join room on booking.RoomId = room.RoomId and room.RoomTypeId = $id";
    $result = DBHelper::execute($query);
    if($result->num_rows > 0) {
        echo "<script> alert('Phòng đang có người đặt. Không thể xóa được') </script>";
    }
    else {
        $query = "delete from room where RoomTypeId = $id";
        $result = DBHelper::execute($query);

        $query = "delete from roomtype where roomtypeid = $id";
        $result = DBHelper::execute($query);
        if($result) {
            header('location: MyRoomType.php');
        }
    }
}
?>