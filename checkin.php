<?php
require('DBHelper.php');
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : false;
$_SESSION['id'] = $id;



if($id) {
    $query = "SELECT *
    FROM booking
    JOIN customer ON booking.CustomerId = customer.CustomerId
    JOIN room ON room.RoomId = booking.RoomId
    JOIN roomtype ON room.RoomTypeId = roomtype.RoomTypeId
    WHERE BookingId='$id'";
    $result = DBHelper::execute($query);

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $Name = $row['Name'];
        $TypeName = $row['TypeName'];
        $RoomName= $row['RoomName'];
        $CheckInDate=$row['CheckInDate'];
        $CheckOutDate=$row['CheckOutDate'];
        $NumberOfPeople=$row['NumberOfPeople'];
        $TotalAmount=$row['TotalAmount'];
        $RoomId=$row['RoomId'];
        $_SESSION['RoomId'] = $RoomId;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Check In </title>
    <?php require('inc/links.php') ?>
    <link rel="stylesheet" href="css/EditTypeRoom.css">
</head>
<body>
    <?php require('inc/header.php') ?>

    <h1>Check in</h1>
    <form action="CheckInBooked.php" method="POST">
        <label for="ten-khach-hang">Tên Khách Hàng:</label>
        <input type="text" id="name" name="name" value = "<?php echo $Name ?>" readonly>

        <label for="ten-loai-phong">Loại phòng: </label>
        <input type="text" id="room-type" name="room-type" value = "<?php echo $TypeName ?>" readonly>

        <label for="ten-phong">Tên phòng: </label>
        <input type="text" id="room-name" name="room-name" value = "<?php echo $RoomName ?>" readonly>

        <label for="Check-in">CheckIN: </label>
        <input type="text" id="check-in" name="check-in" value = "<?php echo $CheckInDate ?>" readonly>
        
        <label for="Check-Out">CheckOut: </label>
        <input type="text" id="check-out" name="check-out" value = "<?php echo $CheckOutDate ?>" readonly>

        <label for="Tong-tien">Tổng tiền: </label>
        <input type="number" id="totalAmount" name="tong-tien" value = "<?php echo $TotalAmount ?>" readonly>

        <button type="submit" value="Lưu" class="btn btn-sm rounded-pill btn-primary">Lưu</button>
        <button type="button" value="Hủy" class="btn btn-sm rounded-pill btn-danger" onclick="history.go(-1)">Hủy</button>
    </form>

    <?php require('inc/scripts.php') ?>
</body>
</html>