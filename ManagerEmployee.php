<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css"/>
    <title>Quản lý khách sạn</title>
    <?php require('inc/links.php'); ?>
    <style>
    /* Thêm kiểu cho form */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
        z-index: 999; /* Đảm bảo nó hiển thị trên cùng */
    }
    .form_employyee {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Thêm kiểu cho các label và input */
    .form_employyee label {
        display: block;
        margin-bottom: 5px;
    }

    .form_employyee input[type="text"],
    .form_employyee input[type="date"],
    .form_employyee input[type="tel"],
    .form_employyee input[type="file"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    /* Thêm kiểu cho nút Submit */
    .form_employyee input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Kiểu cho link "Sửa Thông Tin" */
    .custom-link {
        color: #007bff;
        text-decoration: none;
    }

    /* Kiểu cho hình ảnh trong bảng */
    .table img {
        max-width: 80px;
        max-height: 80px;
        border-radius: 3px;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    }
    
</style>
                                    <?php
                                    require('DBHelper.php');
                                    if(isset($_POST['EmployeeID'])){
                                        $employeeID = $_POST['EmployeeID'];
                                    }
                                    if(isset($_POST['Name'])){
                                        $name = $_POST['Name'];
                                    }
                                    if(isset($_POST['Birthday'])){
                                        $birthday = $_POST['Birthday'];
                                    }
                                    if(isset($_POST['NumberPhone'])){
                                        $phone = $_POST['NumberPhone'];
                                    }
                                    if(isset($_POST['Position'])){
                                        $position = $_POST['Position'];
                                    }
                                    if(isset($_POST['submit'])){
                                        $insert = "INSERT INTO employee VALUES ('$employeeID','$name','$birthday','$phone','$position', '')";
                                        $res = DBHelper::execute($insert);
                                        if($res){
                                            echo "<script>alert('Insert Thành Công');</script>";
                                        }
                                        else{
                                            echo"<script>alert('Mã Số Nhân Viên Đã Tồn Tại Trong Hệ Thống');</script>";
                                        }
                                    }
                                  
                                    ?>

</head>
<body class="bg-white">
    <?php require('inc/header.php'); ?>
    <div class="text-end mb-4">
        <a href="#" class="btn btn-success rounded-pill shadow-none btn-sm js-add">
            <i class="bi bi-file-earmark-plus"></i> Thêm Nhân Viên
        </a>
    </div>
    <div class="overlay js-overlay"></div>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Quản lý nhân viên</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll; overflow-x: scroll;">
                            <!-- Bảng nhân viên -->
                            <table class="table bg-white table-hover border">
                            <thead class="thead-dark">
                                    <tr class="bg-dark text-light">
                                        <th>Mã Nhân Viên</th>
                                        <th>Tên Nhân Viên</th>
                                        <th>Ngày Sinh</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Chức Vụ</th>
                                        <th>Tùy Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $query = "SELECT * FROM employee";
                                    $result = DBHelper::executeResult($query);

                                    while ($result != null && $row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['EmployeeID'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Birthday'] . "</td>";
                                        echo "<td>" . $row['NumberPhone'] . "</td>";
                                        echo "<td>" . $row['Position'] . "</td>";
                                        echo '<td><a href="edit_employee.php?id=' . $row['EmployeeID'] . '" class="custom-link">Sửa Thông Tin</a> | <a href="delete_employee.php?id=' . $row['EmployeeID'] . '" class="custom-link" onclick="return confirmDelete();">Xóa Nhân Viên</a></td>';

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
    </div>
    <div class="form_employyee js-modal">
    <i class="fa-solid fa-xmark js-close" style="margin-left: 400px;"></i>
      <form method="post" action="ManagerEmployee.php" enctype="multipart/form-data">
        <label for="EmployeeID">Mã Nhân Viên:</label>
        <input type="text" id="EmployeeID" name="EmployeeID" required><br>
        
        <label for="Name">Tên Nhân Viên:</label>
        <input type="text" id="Name" name="Name" required><br>
        
        <label for="Birthday">Ngày Sinh:</label>
        <input type="date" id="Birthday" name="Birthday" max="<?php echo date('Y-m-d',strtotime('-18 year')); ?>" required><br>

        
        <label for="NumberPhone">Số Điện Thoại:</label>
        <input type="text" id="NumberPhone" name="NumberPhone" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

        
        <label for="Position">Chức Vụ:</label>
        <input type="text" id="Position" name="Position" required><br>
        
        <input type="submit" value="Thêm Nhân Viên" name ="submit">
    </form>
    </div>
    <script>
        const open_add = document.querySelector('.js-add');
        const content_form = document.querySelector('.form_employyee');
        const overlay = document.querySelector('.js-overlay');
        const close_icon = document.querySelector('.js-close');
        open_add.addEventListener('click', function (e) {
            e.preventDefault();
            content_form.style.display = 'block';
            overlay.style.display = 'block';
        });
        close_icon.addEventListener('click',function(){
            content_form.style.display = 'none';
            overlay.style.display = 'none';
        });
        function hideForm() {
            content_form.style.display = 'none';
            overlay.style.display = 'none';
        }
        function confirmDelete() {
        var result = confirm('Cảnh Báo : Bạn có muốn xóa phòng?');
        if (result === true) {
            header("location: delete_employee.php");
            return true;
        } else {
            return false;
        }
    }
    </script>
    
    <?php require('inc/scripts.php'); ?>
</body>
</html>
