<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
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
                            <!-- <a href="" class="btn btn-success rounded-pill shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room-type">
                                <i class="bi bi-file-earmark-plus"></i>Thêm loại phòng
                            </a> -->
</div>
  <?php 
// require('DBHelper.php');
// require('Classes/PHPExcel.php');
//     if(isset($_POST['btnExport'])){
//         $objExcel = new PHPExcel;
//         $objExcel->setActiveSheetIndex(0);
//         $sheet= $objExcel->getActiveSheet()->setTitle('Checked_out');
//         $rowCount= 1;
//         $sheet->setCellValue('A'.$rowCount, 'BookingId');
//         $sheet->setCellValue('B'.$rowCount, 'CustomerId');
//         $sheet->setCellValue('C'.$rowCount, 'RoomId');
//         $sheet->setCellValue('D'.$rowCount, 'SeriveId');
//         $sheet->setCellValue('E'.$rowCount, 'CheckInDate');
//         $sheet->setCellValue('F'.$rowCount, 'CheckOutDate');
//         $sheet->setCellValue('G'.$rowCount, 'NumberOfPeople');
//         $sheet->setCellValue('H'.$rowCount, 'RequiredSpecial');
//         $sheet->setCellValue('I'.$rowCount, 'TotalAmount');
//         $sheet->setCellValue('J'.$rowCount, 'PaymentStatus');
//         $sheet->setCellValue('K'.$rowCount, 'status');
//         $query1="SELECT * FROM booking where status = 2";
// 		$result1= DBHelper::execute($query1);
//         while($result != null && $row1 = $result->fetch_array(MYSQLI_ASSOC)){
//             $rowCount++;
//             $sheet->setCellValue('A'.$rowCount, $row1['BookingId']);
//             $sheet->setCellValue('B'.$rowCount, $row1['CustomerId']);
//             $sheet->setCellValue('C'.$rowCount, $row1['RoomId']);
//             $sheet->setCellValue('D'.$rowCount, $row1['SeriveId']);
//             $sheet->setCellValue('E'.$rowCount, $row1['CheckInDate']);
//             $sheet->setCellValue('F'.$rowCount, $row1['CheckOutDate']);
//             $sheet->setCellValue('G'.$rowCount, $row1['NumberOfPeople']);
//             $sheet->setCellValue('H'.$rowCount, $row1['RequiredSpecial']);
//             $sheet->setCellValue('I'.$rowCount, $row1['TotalAmount']);
//             $sheet->setCellValue('J'.$rowCount, $row1['PaymentStatus']);
//             $sheet->setCellValue('K'.$rowCount, $row1['status']);
            
//         }
//         $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
//         $fileName='ExportExcel.xlsx';
//             $objWriter->save($fileName);
//             header('Content-Disposition: attachment; filename="'.$fileName.'"');
//             header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
//             header('Content-Length: '.filesize($fileName));
//             header('Content-Transfer-Encoding:binary');
//             header('Cache-Control: must-revalidate');
//             header('Pragma: no-cache');
//             readfile($fileName);
//         return;


//     }

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
                    <form  method="post" action="">
                    <a href="Checked_out.php">Danh sách đã trả phòng</a>
                    </form>
						<table class="table table-bordered">
							<thead>
								<th>#</th>
								<th>Phòng số</th>
								<th>Trạng Thái</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php 
                                include('DBHelper.php'); 
								$i = 1;
								$query="SELECT * FROM booking as bk join room as r on bk.RoomId = r.RoomId  where bk.status = 1";
								$result= DBHelper::execute($query);
                                while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row['RoomName'] ?></td>
                        <td><span class="badge badge-danger">Checked In</span></td>
                        <td><a href="checkingOut.php?id=<?php echo $row['BookingId']?>" class="button">Check Out</a></td>
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