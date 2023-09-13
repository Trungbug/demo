<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phòng</title>
    <link rel="stylesheet" href="css/RoomManagement.css">
</head>
<body>
    <header>
        <h1>Check-in</h1>
    </header>
    <main>
        <h2>Danh Sách Booking</h2>
        <table>
            <thead>
                <tr>
                    <th>Khách hàng</th>
                    <th>Phòng đã đặt</th>
                    <th>Trạng thái</th>
                    <th>Ngày đến</th>
                    <th>Ngày đi</th> 
                    <th>Số người ở</th>
                    <th>Yêu cầu khách hàng</th>
                    <th>Tổng tiền phải trả</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu phòng sẽ được thêm ở đây -->
                <?php
                    require('DBHelper.php');
    
                    $query = "select * from booking where status = 'Trống'";
                    $result = DBHelper::execute($query);

                    while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $res = DBHelper::execute("select name from customer where CustomerId = {$row['CustomerId']}");
                        $customer = $res->fetch_array(MYSQLI_ASSOC)['name'];

                        $res = DBHelper::execute("select roomname from room where RoomId = {$row['RoomId']}");
                        $room = $res->fetch_array(MYSQLI_ASSOC)['roomname'];
                    ?>
                    <tr>
                        <td><?php echo $customer?></td>
                        <td><?php echo $room ?></td>
                        <td><?php echo $row['status']?></td>
                        <td><?php echo $row['CheckInDate']?></td>
                        <td><?php echo $row['CheckOutDate']?></td>
                        <td><?php echo $row['NumberOfPeople'] ?></td>
                        <td><?php echo $row['RequiredSpecial'] ?></td>
                        <td><?php echo number_format($row['TotalAmount'], 0, '.', ',') . 'đ' ?></td>
                        <td><a href="ProcessCheckIn.php?id=<?php echo $row['BookingId'] ?>" class="edit-button">Check-in</a></td>
                        <td>Thông tin chi tiết</td></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
</body>
</html>