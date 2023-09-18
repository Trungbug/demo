<?php
require('DBHelper.php');
$id = isset($_GET['id']) ? $_GET['id'] : false;

if($id) {
    $query = "delete from roomtype where roomtypeid = $id";
    $result = DBHelper::execute($query);
    if($result) {
        header('location: MyRoomType.php');
    }
}
?>