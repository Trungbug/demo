<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Information</title>
</head>
<body>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    /* Thiết lập phong cách cho container chính */
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }

    /* Phong cách cho bảng thông tin đặt phòng */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    table th {
        background-color: #f2f2f2;
    }

    /* Phong cách cho các nút hủy dịch vụ */
    a.delete-link {
        color: red;
        text-decoration: none;
    }

    a.delete-link:hover {
        text-decoration: underline;
    }

    /* Phong cách cho thông báo khi không có dịch vụ đặt phòng nào */
    .info-text {
        font-size: 14px;
        margin-top: 10px;
    }
    a{
        text-decoration: none;
    }
</style>

    <?php
     require_once('DBHelper.php');
    session_start();
    $username = $_SESSION['username'];
    $select_user = "SELECT * FROM booking as b inner join customer as c on b.CustomerId = c.CustomerId  inner join room as r on r.RoomId = b.RoomId  WHERE c.CustomerId = '{$_SESSION['customerId']}'";
    $res = DBHelper::executeResult($select_user);
    if ($res->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Tên Người Đặt</th>";
        echo "<th>Tên Phòng</th>";
        echo "<th>Số Điện Thoại</th>";
        echo "<th>Ghi Chú</th>";
        echo "<th>Email</th>";
        echo "<th>Ngày Đặt Phòng</th>";
        echo "<th>Ngày Check-out</th>";
        echo "</tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>"; // Thay đổi để hiển thị tên người đặt
            echo "<td>" . $row['RoomName'] . "</td>"; // Thay đổi để hiển thị tên phòng
            echo "<td>" . $row['phoneNumber'] . "</td>"; // Số điện thoại
            echo "<td>" . $row['RequiredSpecial'] . "</td>"; // Ghi chú
            echo "<td>" . $row['Email'] . "</td>"; // Email
            echo "<td>" . $row['CheckInDate'] . "</td>"; // Ngày đặt phòng
            echo "<td>" . $row['CheckOutDate'] . "</td>"; // Ngày check-out
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='info-text'>Bạn Chưa Đặt Bất Kì phòng nào.</p>";
    }
    
    ?>
</body>
</html>
