<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:ital,wght@0,400;0,500;1,600&display=swap" rel="stylesheet">
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
     include 'inc/navigation.php';
     require_once('DBHelper.php');
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
    }
    $select_user = "SELECT * FROM `information_booking` WHERE user_booking = '$username'";
    $res = DBHelper::executeResult($select_user);
    if ($res->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>STT</th>
                <th>Tên Phòng</th> 
                <th>Tên Người Đặt</th>
                <th>Phone Number</th>
                <th>Note</th>
                <th>Email</th>
                <th>Date Booking</th>
                <th>Date Checkout</th>
                <th>Chức Năng</th>
            </tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['STT'] . "</td>";
            echo "<td>" . $row['room_name'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['number_phone'] . "</td>";
            echo "<td>" . $row['note'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['date_booking'] . "</td>";
            echo "<td>" . $row['date_checkout'] . "</td>";
            echo "<td><a href='delete_form_service.php?id=" . $row['STT'] . "' onclick='return confirmDelete()'>Hủy Dịch Vụ</a> | <a href='edit_form_service.php?id=" . $row['STT'] . "'>Sửa Thông Tin</a></td>";


            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='info-text'>Bạn Chưa Đặt Bất Kì Dịch Vụ Nào.</p>";
    }
    
    ?>
    <script>
    function confirmDelete() {
        var result = confirm('Cảnh Báo : Bạn có muốn hủy dịch vụ?');
        if (result === true) {
            header("location: delete_form_service.php");
            return true;
        } else {
            return false;
        }
    }
</script>
</body>
</html>
