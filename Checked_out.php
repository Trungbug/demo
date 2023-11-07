<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <?php require('inc/links.php') ?>
    <style>
        /* Thêm các quy tắc CSS tùy chỉnh tại đây */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container-fluid {
            padding: 20px;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .table {
            background-color: #fff;
        }

        /* Tùy chỉnh thanh tìm kiếm và nút tìm kiếm */
        .search-form {
            display: flex;
        }

        .search-input {
            flex: 1;
        }
    </style>
</head>
<body class="bg-white">
    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Danh sách khách hàng đã trả phòng</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
</div>
  <?php 

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
            <form method="POST" action="" class="search-form">
                            <div class="form-group search-input">
                                <input type="text" name="search_customer" class="form-control" placeholder="Nhập tên khách hàng">
                            </div>
                            <button type="submit" name="btn_search" class="btn btn-primary">Tìm kiếm</button>
                        </form>
				<div class="card">
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>Phòng số</th>
								<th>Tên khách hàng</th>
								<th>Số người ở</th>
                                <th>Check in</th>
                                <th>Check Out</th>
                                <th>Tổng tiền</th>

							</thead>
                            <tbody>
                        <?php 
                        include('DBHelper.php'); 
                        $i = 1;
                        if (isset($_POST['btn_search'])) {
                            $search_customer = $_POST['search_customer'];
                            $query = "SELECT *
                                FROM booking
                                JOIN customer ON booking.CustomerId = customer.CustomerId
                                JOIN room ON room.RoomId = booking.RoomId
                                JOIN roomtype ON room.RoomTypeId = roomtype.RoomTypeId
                                WHERE status = 2
                                AND customer.Name LIKE '%$search_customer%'";
                            $result = DBHelper::execute($query);
                        } else {
                            $query = "SELECT *
                                FROM booking
                                JOIN customer ON booking.CustomerId = customer.CustomerId
                                JOIN room ON room.RoomId = booking.RoomId
                                JOIN roomtype ON room.RoomTypeId = roomtype.RoomTypeId
                                WHERE status = 2";
                            $result = DBHelper::execute($query);
                        }

                        while ($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                            echo '<tr>
                                <td>' . $i++ . '</td>
                                <td>' . $row['RoomName'] . '</td>
                                <td>' . $row['Name'] . '</td>
                                <td>' . $row['NumberOfPeople'] . '</td>
                                <td>' . $row['CheckInDate'] . '</td>
                                <td>' . $row['CheckOutDate'] . '</td>
                                <td>' . $row['TotalAmount'] . '</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
				</div>
                <button type="button" class="btn btn-sm rounded-pill btn-danger" onclick="window.location.href='CheckOut.php'">Trở về</button>
			</div>
		</div>
	</div>
</div>



  </body>
</html>
    <?php require('inc/scripts.php') ?>
</body>
</html>