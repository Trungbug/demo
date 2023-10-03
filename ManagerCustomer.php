<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css"/>
    <title>Quản lý khách sạn</title>
    <?php require('inc/links.php') ?>
</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body class="bg-white">
    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Quản lý người dùng</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll; overflow-x:scroll;">
                             <!-- Bang phong -->
                            <table class="table bg-white table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th>Tên Tài Khoản</th>
                                    <th>Tên Người Dùng</th>
                                    <th>Mật Khẩu</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Email</th>
                                    <th>Giới Tính</th>
                                    <th>Lịch Sử</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('DBHelper.php');
                        
                                        $query = "select * from Account as a join Customer as c on a.CustomerID = c.CustomerID";
                                        $result = DBHelper::execute($query);

                                        while($result != null && $row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['UserName'] . "</td>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . '****'. "</td>";
                                            echo "<td>" . $row['phoneNumber'] . "</td>";
                                            echo "<td>" . $row['Email'] . "</td>";
                                            echo "<td>" . $row['Gender'] . "</td>";
                                            echo '<td><a href="history_booking.php?username=' . $row['UserName'] . '" class="custom-link">Đặt Phòng</a> | <a href="user_booking_service.php?username=' . $row['UserName'] . '" class="custom-link">Dịch Vụ</a> </td>';
                                            echo "</tr>"; 
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        
        </div>
    </div>
    <?php require('inc/scripts.php') ?>
</body>
</html>