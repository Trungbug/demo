<?php
require('DBHelper.php');
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : false;
$_SESSION['id'] = $id;

if($id) {
    $query = "select typename, description from roomtype where roomtypeid = '$id'";
    $result = DBHelper::execute($query);

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $typeName = $row['typename'];
        $description = $row['description'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Loại Phòng</title>
    <link rel="stylesheet" href="css/EditTypeRoom.css">
</head>
<body>
    <h1>Thêm Loại Phòng</h1>
    <form action="ProcessEditRoomType.php" method="POST">
        <label for="ten-loai-phong">Tên Loại Phòng:</label>
        <input type="text" id="room-type" name="room-type" value = "<?php echo $typeName ?>"required>

        <label for="mo-ta">Mô Tả:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $description ?></textarea>

        <input type="submit" value="Lưu">
    </form>
</body>
</html>