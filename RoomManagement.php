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
        <h1>Quản Lý Phòng</h1>
    </header>
    <main>
        <h2>Danh Sách Phòng</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên Phòng</th>
                    <th>Loại Phòng</th>
                    <th>Hình ảnh</th>
                    <th>Giá một đêm</th> 
                    <th>Diện tích</th>
                    <th>Số người ở tối đa</th>
                    <th>Mô tả</th> 
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu phòng sẽ được thêm ở đây -->
                <?php
                    require('DBHelper.php');
    
                    $query = "select RoomId, roomname, roomtypeid, image, pricepernight, area, quantity, description from room";
                    $result = DBHelper::execute($query);

                    while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $res = DBHelper::execute("select typename from roomtype where roomtypeid = {$row['roomtypeid']}");
                        $typeName = $res->fetch_array(MYSQLI_ASSOC)['typename'];
                    ?>
                    <tr>
                        <td><?php echo $row['roomname']?></td>
                        <td><?php echo $typeName ?></td>
                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" alt="Image" style="width: 100px; height: 100px;">' ?></td>
                        <td><?php echo number_format($row['pricepernight'], 0, '.', ',') . 'đ' ?></td>
                        <td><?php echo $row['area'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><a href="EditRoom.php?roomId=<?php echo $row['RoomId'];?>" class="edit-button">Sửa</a></td>
                        <td><a href="DeleteRoom.php?roomId=<?php echo $row['RoomId'];?>" class="delete-button">Xóa</a></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
        <button class="add-button">Thêm Phòng</button>
        
        <!-- Biểu mẫu thêm phòng -->
        <div class="add-room-form">
            <h2>Thêm Phòng Mới</h2>
            <form id="room-form" method = "post" action = "AddRoom.php">
                <label for="room-name">Tên Phòng:</label>
                <input type="text" id="room-name" name="room-name" required>
                
                <label for="room-type">Loại Phòng:</label>
                <select id="room-type" name="room-type" required>
                    <?php
                        $query = "select * from roomtype";
                        $result = DBHelper::execute($query);
                        while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                        <option><?php echo $row['TypeName']?></option>
                    <?php 
                        }
                    ?>
                </select>
                
                <label for="room-image">Hình ảnh:</label>
                <input type="file" id="room-image" name="room-image" accept="image/*" required>
                
                <label for="room-price">Giá một đêm:</label>
                <input type="number" id="room-price" name="room-price" required>
                
                <label for="room-area">Diện tích:</label>
                <input type="number" id="room-area" name="room-area" required>
                
                <label for="room-max-guests">Số người ở tối đa:</label>
                <input type="number" id="room-max-guests" name="room-max-guests" min="1" value="1" required>
                
                <label for="room-description">Mô tả:</label>
                <textarea id="room-description" name="room-description" rows="8" cols="50" required></textarea>
                
                <label for="room-status">Trạng Thái:</label>
                <select id="room-status" name="room-status" required>
                    <option value="trống">Trống</option>
                    <option value="đã đặt">Đã Đặt</option>
                </select>
                
                <button type="submit">Lưu</button>
                <button type="button" class="cancel-button">Hủy</button>
            </form>
        </div>

        <script>
            function formatCurrencyVND(amount) {
                return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
            }

            function convertToCurrency() {
                // Lấy giá trị nhập vào từ trường số
                var inputElement = document.getElementById('room-price');
                var inputValue = parseFloat(inputElement.value);

                // Kiểm tra nếu giá trị là số hợp lệ
                if (!isNaN(inputValue)) {
                    // Sử dụng toFixed để giới hạn số lẻ và chuyển đổi thành tiền tệ
                    // Hiển thị giá trị đã chuyển đổi lên trường tiền tệ
                    inputElement.value = formatCurrencyVND(inputValue); // Thay đổi 'VND' thành tiền tệ bạn muốn
                } else {
                    // Nếu giá trị không hợp lệ, hiển thị thông báo lỗi
                    alert('Vui lòng nhập một số hợp lệ.');
                }
            }
    </script>

    </main>
    <footer>
        <p>&copy; 2023 Hotel Management</p>
    </footer>
    <script src="JavaScript/script.js"></script>
</body>
</html>