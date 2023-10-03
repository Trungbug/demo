<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Limit form width */
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="button"],
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="button"]:hover,
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        #back-button {
            background-color: #ccc;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php 
    include('DBHelper.php');
    if(isset($_GET['id'])){
        $employeeId = $_GET['id'];
    }
    $query = "Select * from employee where EmployeeID = '$employeeId' ";
    $res = DBHelper::executeResult($query);
    $row = $res->fetch_assoc();
    $name = $row['Name'];
    $birthday = $row['Birthday'];
    $phone = $row['NumberPhone'];
    $pos = $row['Position'];
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
        $update = "UPDATE `employee` SET `Name`='$name',`Birthday`='$birthday',`NumberPhone`='$phone',`Position`='$position' WHERE EmployeeID = '$employeeId'";
        $res = DBHelper::execute($update);
        if($res){
            echo "<script> alert('Sửa Thông Tin Thành Công') </script>";
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="EmployeeID">Mã Nhân Viên:</label>
        <input type="text" id="EmployeeID" name="EmployeeID" value="<?php echo $employeeId; ?>" readonly><br>
        
        <label for="Name">Tên Nhân Viên:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $name; ?>"><br>
        
        <label for="Birthday">Ngày Sinh:</label>
        <input type="date" id="Birthday" name="Birthday" max="<?php echo date('Y-m-d',strtotime('-18 year'));  ?>"  value="<?php echo $birthday; ?>" required><br>

        
        <label for="NumberPhone">Số Điện Thoại:</label>
        <input type="tel" id="NumberPhone" name="NumberPhone"  value="<?php echo $phone; ?>" required><br>
        
        <label for="Position">Chức Vụ:</label>
        <input type="text" id="Position" name="Position"  value="<?php echo $pos; ?>"  required><br>
    
        <input type="submit" value="Update Thông Tin" name ="submit">
        <input type="button" name="btnback" value="Trở Lại" id="back-button" onclick="window.location.href='ManagerEmployee.php'; return false;" >
    </form>
</body>
</html>
