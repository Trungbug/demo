<?php
require('DBHelper.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/EditFacilities.css">
    <title>Document</title>
     <?php require('inc/links.php') ?>
</head>
<?php
$id= isset($_GET['id']) ? $_GET['id'] : false;
if ($id) {
    $query = "select * from facilities where id = $id";
    $result = DBHelper::execute($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $facilitiesName = $row['name']; 
        $price = $row['price'];
        $quantity = $row['quantity'];
        $totalPrice = $row['TotalPrice'];
    } 
    $_SESSION['facilitiesId'] = $id;
} 
else {
    echo 'Error lay id: ' . $id;
}
?>
<body class="bg-white">
    <?php require('inc/header.php') ?>

    <div class="edit-facilities-form">
        <h2>Sửa thông tin cơ sở vật chất</h2>
        <form id="facilities-form" method="post" action="ProcessFacilities.php">
            <label>Tên cơ sở vật chất:</label>
            <input type="text" id="facilities-name" name="facilities-name" value="<?php echo $facilitiesName ?>" required>

            <label>Số lượng:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="<?php echo $quantity ?>" oninput = "totalPrice()">

            <label>Giá tiền:</label>
            <input type="money_format" id="price" name="price" value="<?php echo number_format($price, 0, '.', ',') . 'đ' ?>" required>

            <label>Tổng tiền:</label>
            <input type="text" id="total-price" name="total-price" value="<?php echo number_format($totalPrice, 0, '.', ',') . 'đ' ?>" required readonly>

            <button type="submit" class="btn btn-sm rounded-pill btn-primary">Lưu</button>
            <button type="button" class="btn btn-sm rounded-pill btn-danger" onclick="history.go(-1)">Hủy</button>
        </form>
    </div>

    <script>   
            function formatCurrencyVND(amount) {
                return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
            }

            function converToInt(priceFacilities) {
                var price = 0;
                for(let i = 0; i < priceFacilities.length; ++i) {
                    if(priceFacilities[i] >= '0' && priceFacilities[i] <= '9') {
                        price = price * 10 + (priceFacilities[i] - '0');
                    }
                }
                return price;
            }
        
            // tinh gia tien
            function totalPrice() {
                var quantity = document.getElementById('quantity').value;
                var price = converToInt(document.getElementById('price').value);
                var total = document.getElementById('total-price');
                var totalPrice = quantity * price;
                total.value = formatCurrencyVND(totalPrice);
            }
    </script>

    <?php require('inc/scripts.php') ?>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
</html>