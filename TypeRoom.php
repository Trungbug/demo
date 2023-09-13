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
        <h1>Quản Lý Loại Phòng</h1>
    </header>
    <main>
        <h2>Danh Sách Loại Phòng</h2>
        <table>
            <thead>
                <tr>
                    <th>Loại Phòng</th>
                    <th>Mô tả</th> 
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu phòng sẽ được thêm ở đây -->
                <?php
                    require('DBHelper.php');
    
                    $query = "select * from roomtype";
                    $result = DBHelper::execute($query);

                    while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $row['TypeName']?></td>
                        <td><?php echo $row['Description'] ?></td>
                        <td><a href="EditRoomType.php?id=<?php echo $row['RoomTypeId']?>" class="edit-button">Sửa</a></td>
                        <td><a href="DeleteRoomType.php?id=<?php echo $row['RoomTypeId']?>" class="delete-button">Xóa</a></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
        <button class="add-button">Thêm Loại Phòng</button>
        
        <!-- Biểu mẫu thêm phòng -->
        <div class="add-room-form">
            <h2>Thêm Loại Phòng Mới</h2>
            <form id="room-form" method = "post" action = "AddRoomType.php">
                <label for="room-name">Tên Loại Phòng:</label>
                <input type="text" id="room-type-name" name="room-type-name" required>
                
                <label for="room-description">Mô tả:</label>
                <textarea id="description" name="description" rows="8" cols="50" required></textarea>
                
                <button type="submit">Lưu</button>
                <button type="button" class="cancel-button">Hủy</button>
            </form>
        </div>

    </main>
    <footer>
        <p>&copy; 2023 Hotel Management</p>
    </footer>
    <script src="JavaScript/script.js"></script>
</body>
</html>