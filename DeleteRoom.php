<?php
require('DBHelper.php');

$roomId = isset($_GET['roomId']) ? $_GET['roomId'] : false;

if($roomId != false) {
    $query = "delete from room where roomid = '$roomId'";
    $result = DBHelper::execute($query);
    if($result) {
        header('location: MyRoom.php');
    }
    else {
        echo 'Loi xoa phong';
    }
}
?>