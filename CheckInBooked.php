<?php
require('DBHelper.php');
session_start();
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
if(isset($_SESSION['RoomId'])) {
    $RoomId = $_SESSION['RoomId'];
}

$queryFilter = "SELECT * FROM booking WHERE RoomId = $RoomId AND status = 1";
$resultF = DBHelper::execute($queryFilter);
if($resultF->num_rows == 0) {
    $query = "UPDATE booking SET status = 1 WHERE BookingId = $id";
    $result = DBHelper::execute($query);

    if($result) {
        header('location: booked.php');
    } else {
        echo "<script>alert('Phòng chưa được trả!');</script>";
        // Nếu không thực hiện chuyển hướng, bạn có thể thực hiện xử lý khác tại đây
    }
} else {
    echo "<script>alert('Phòng chưa được trả!');</script>";
    header('location: booked.php');
}
// Bây giờ, trong trường hợp không thực hiện chuyển hướng, mã sẽ hiển thị thông báo lỗi và sau đó tiếp tục thực hiện xử lý tiếp theo tùy thuộc vào yêu cầu của bạn.







?>