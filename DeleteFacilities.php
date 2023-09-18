<?php
require('DBHelper.php');

$id = isset($_GET['id']) ? $_GET['id'] : false;

if($id != false) {
    $query = "delete from facilities where id = '$id'";
    $result = DBHelper::execute($query);
    if($result) {
        header('location: Facilities.php');
    }
    else {
        echo 'Loi xoa phong';
    }
}
?>