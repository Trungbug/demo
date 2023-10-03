<?php 
require_once('DBHelper.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$delete = "DELETE FROM `employee` WHERE EmployeeID = '$id'";
$res = DBHelper::execute($delete);
if ($res) {
    echo "<script>alert('Xóa Thành Công')</script>";
    header('location: ManagerEmployee.php');
    exit(); 
}
?>
