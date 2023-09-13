<?php
require('DBHelper.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/EditRoom.css">
    <title>Document</title>
</head>
<?php
$roomId = isset($_GET['roomId']) ? $_GET['roomId'] : false;
if ($roomId) {
    $query = "select * from room where RoomId = $roomId";
    $result = DBHelper::execute($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $roomName = $row['RoomName'];
        $roomTypeId = $row['RoomTypeId'];
        $image = $row['Image'];
        $pricePerNight = $row['PricePerNight'];
        $area = $row['Area'];
        $quantity = $row['Quantity'];
        $description = $row['Description'];
    }
    $imageDataUri = "data:image/jpeg;base64," . base64_encode($image);

    $q = "select typename from roomtype where roomtypeid = '$roomTypeId'";
    $res = DBHelper::execute($q);
    $roomType = $res->fetch_array(MYSQLI_ASSOC)['typename'];
    $_SESSION['roomId'] = $roomId;
    
} else {
    echo 'Error lay id: ' . $roomId;
}
?>
<body>
    <div class="edit-room-form">
        <h2>Sửa thông tin phòng</h2>
        <form id="room-form" method="post" action="ProcessEditRoom.php">
            <label for="room-name">Tên Phòng:</label>
            <input type="text" id="room-name" name="room-name" value="<?php echo $roomName ?>" required>

            <label for="room-type">Loại Phòng:</label>
            <select id="room-type" name="room-type" required>
                <option value="<?php echo $roomType ?>"><?php echo $roomType ?></option>
                <option value="standard">Standard</option>
                <option value="deluxe">Deluxe</option>
                <option value="Executive Suite">Executive Suite</option>
                <!-- Thêm các loại phòng khác vào đây -->
            </select>

            <label for="room-image">Hình ảnh:</label>
            <input type="file" id="room-image" name="room-image" accept="image/*">

            <label for="room-price">Giá một đêm:</label>
            <input type="number" id="room-price" name="room-price" value="<?php echo $pricePerNight ?>" required>

            <label for="room-area">Diện tích:</label>
            <input type="number" id="room-area" name="room-area" value="<?php echo $area ?>" required>

            <label for="room-max-guests">Số người ở tối đa:</label>
            <input type="number" id="room-max-guests" name="room-max-guests" value="<?php echo $quantity ?>" required>

            <label for="room-description">Mô tả:</label>
            <textarea id="room-description" name="room-description" rows="8" cols="50"required><?php echo $description ?></textarea>

            <label for="room-status">Trạng Thái:</label>
            <select id="room-status" name="room-status" required>
                <option value="trống">Trống</option>
                <option value="đã đặt">Đã Đặt</option>
            </select>

            <button type="submit">Lưu</button>
            <button type="button" class="cancel-button">Hủy</button>
        </form>
    </div>
</body>

<script>
document.addEventListener('DOMContentLoaded', function () {
    removeduplicate();
});

function removeduplicate()
{
    var mycode = {};
    $("select[id='room-type'] > option").each(function () {
        if(mycode[this.text]) {
            $(this).remove();
        } else {
            mycode[this.text] = this.value;
        }
    });
}
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
</html>