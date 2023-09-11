<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_room.css">
    <title>Thông tin phòng</title>
</head>
<body>
    <div class="container">
        <div class="search-form">
            <h2>Tìm kiếm phòng</h2>
            <form method="post" action="form_room.php">
                <div class="form-group">
                    <label for="room-type">Loại phòng:</label>
                    <select id="room-type" name="room-type">
                        <option value="standard">All</option>
                        <?php
                            require('DBHelper.php');
                            $query = "select * from roomtype";
                            $result = DBHelper::execute($query);
                        while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                            <option><?php echo $row['TypeName']?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="guests">Số người ở:</label>
                    <input type="number" id="guests" name="guests" min="1">
                </div>
                <div class="form-group">
                    <label for="min-price">Giá tối thiểu:</label>
                    <input type="number" id="price" name="price" min="0">
                </div>
                <div class="form-group">
                    <label for="min-price">Giá tối đa:</label>
                    <input type="number" id="price" name="price" min="0">
                </div>
                <button type="submit" name="search" id="search">Tìm kiếm</button>
            </form>
        </div>

        <h2>Thông tin phòng</h2>
        <table name="table">
            <tr>
                <th>Tên phòng</th>
                <th>Loại phòng</th>
                <th>Ảnh</th>
                <th>Giá một đêm</th>
                <th>Diện tích</th>
                <th>Số người ở tối đa</th>
                <th>Mô tả</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php
                require('Room.php');
                
                // if(isset($_POST['search'])) {
                //     $roomType = isset($_POST['room-type']) ? $_POST['room-type'] : '';
                //     $conditionRoomType = '';
                //     $guests = isset($_POST['guests']) ? $_POST['guests'] : '';
                //     $conditionGuests = ($guests == '' ? " Quantity like '%' " : " Quantity <= $guests ");
                //     $price = isset($_POST['price']) ? $_POST['min-price'] : '';
                //     $query = "select roomtypeid from roomtype where typename = '$roomType'";
                //     $roomTypeId = DBHelper::execute($query)->fetch_array(MYSQLI_ASSOC)['roomtypeid'];
                // }

                $query = "select roomname, roomtypeid, image, pricepernight, area, quantity, description from room";
                $result = DBHelper::execute($query);

                if ($result != null) {
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $room = new Room();
                        $roomType = $room->getTypeRoom($row['roomname']);
                        $price = $row['pricepernight'];
                        $price = number_format($price, 0, '.', ',') . 'đ';
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['roomname'];
                            ?>
                        </td>
                        <td>
                            <?php echo $roomType;
                            ?>
                        </td>
                        <td>
                            <?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" alt="Image" style="width: 100px; height: 100px;">'; 
                            ?>
                        </td>
                        <td>
                            <?php echo $price?>
                        </td>
                        <td><?php echo $row['area'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td>
                            <button id="booking-button" class="book-button" name="btnBooking" style="display: inline;" onclick="redirectToBookingPage('<?php echo $row['roomname']; ?>', '<?php echo $roomType ?>', '<?php echo $price ?>', '<?php echo $row['quantity']; ?>')">Đặt phòng</button>
                        </td>
                        <td>
                            <button id="edit-button" class="edit-button" name="btnEdit" class="btnEdit"  style="display: none;" onclick="redirectToEditPage('<?php echo $row['roomname']; ?>', '<?php echo $roomType ?>', '<?php echo $price ?>', '<?php echo $row['quantity']; ?>')">Sửa thông tin</button>
                        </td>
                        <td>
                            <button id="cancel-button" class="cancel-button" name="btnCancel" style="display: none;" onclick="redirectToCancelPage('<?php echo $row['roomname']; ?>', '<?php echo $roomType ?>', '<?php echo $price ?>', '<?php echo $row['quantity']; ?>')">Hủy đặt phòng</button>
                        </td>
                    </tr>
                    <?php
                    }
                }
            ?>
        </table>

        <?php
            if(isset($_POST['booking'])) {
                // echo 
                // "<script>
                //     document.getElementById('booking-button').style.display = 'none';
                //     document.getElementById('edit-button').style.display = 'inline';
                //     document.getElementById('cancel-button').style.display = 'inline';
                // </script>";
            }
        ?>

        <script>
            function redirectToBookingPage(roomName, roomType, price, quantity) {
                const encodedRoomName = encodeURIComponent(roomName);
                const encodedRoomType = encodeURIComponent(roomType);
                const encodedPrice = encodeURIComponent(price);
                const encodedQuantity = encodeURIComponent(quantity);
                window.location.href = `form_booking.php?roomName=${encodedRoomName}&roomType=${encodedRoomType}&price=${encodedPrice}&quantity=${encodedQuantity}`;
            
                document.getElementById('booking-button').style.display = 'none';
                document.getElementById('edit-button').style.display = 'inline';
                document.getElementById('cancel-button').style.display = 'inline';
            }
        </script>
    </div>
</body>
</html>