<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách sạn</title>
    <?php require('inc/links.php') ?>
</head>
<body class="bg-white">
    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Quản lý đặt phòng</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                          
</div>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>Phòng số</th>
                                <th>Mã đặt phòng</th>
								<th>Trạng Thái</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php 
                                include('DBHelper.php'); 
								$i = 1;
								$query="SELECT * FROM booking as bk join room as r on bk.RoomId = r.RoomId  where bk.status = 0";
								$result= DBHelper::execute($query);
                                while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row['RoomName'] ?></td>
                        <td><?php echo $row['BookingId'] ?></td>
                        <td>Booked</td>
                        <td><a href="DeleteBooked.php?id=<?php echo $row['BookingId']?>" class="delete-button">Xóa</a>
                        <a href="checkin.php?id=<?php echo $row['BookingId']?>" class="button">Thông tin</a></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



   
  </body>
</html>
    <script>
        // const open_add = document.querySelector('.js-add');
        // const overlay = document.querySelector('.js-overlay');
        // const close_icon = document.querySelector('.js-close');
        // open_add.addEventListener('click', function (e) {
        //     e.preventDefault();
        //     content_form.style.display = 'block';
        //     overlay.style.display = 'block';
        // });
        // close_icon.addEventListener('click',function(){
        //     content_form.style.display = 'none';
        //     overlay.style.display = 'none';
        // });
        // function hideForm() {
        //     content_form.style.display = 'none';
        //     overlay.style.display = 'none';
        // }
    //     function confirmDelete() {
    //     var result = confirm('Cảnh Báo : Nếu bạn đồng ý xóa đồng nghĩa bạn sẽ xóa các phòng có loại phòng này!Bạn có đồng ý?');
    //     if (result === true) {
    //         header("location: MyRoomType.php");
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    </script>
    <?php require('inc/scripts.php') ?>
</body>
</html>