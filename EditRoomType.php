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
    <?php require('inc/links.php') ?>
    <link rel="stylesheet" href="css/EditTypeRoom.css">
</head>
<body>
    <?php require('inc/header.php') ?>

    <h1>Sửa Loại Phòng</h1>
    <form action="ProcessEditRoomType.php" method="POST">
        <label for="ten-loai-phong">Tên Loại Phòng:</label>
        <input type="text" id="room-type" name="room-type" value = "<?php echo $typeName ?>"required>

        <label for="mo-ta">Mô Tả:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $description ?></textarea>

        <button type="submit" value="Lưu" class="btn btn-sm rounded-pill btn-primary">Lưu</button>
        <button type="button" value="Hủy" class="btn btn-sm rounded-pill btn-danger" onclick="history.go(-1)">Hủy</button>
    </form>

    <?php require('inc/scripts.php') ?>
</body>
</html>