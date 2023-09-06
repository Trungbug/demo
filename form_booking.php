<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_booking.css">
    <title>Đặt phòng</title>
</head>
<body>
    <div class="container">
        <h2>Đặt Phòng</h2>
        <form id="booking-form" method = "POST" action = "ProcessBooking.php" onsubmit="return checkBooking();">
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group radio-group">
                <label>Giới tính:</label>
                <label><input type="radio" name="gender" value="Nam" checked>Nam</label>
                <label><input type="radio" name="gender" value="Nữ">Nữ</label>
            </div>
            <div class="form-group">
                <label for="room-name">Tên phòng:</label>
                <input type="text" id="room-name" name="room-name" value="<?php echo isset($_GET['roomName']) ? $_GET['roomName'] : ''; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="room-name">Loại phòng:</label>
                <input type="text" id="room-type" name="room-type" value="<?php echo isset($_GET['roomType']) ? $_GET['roomType'] : ''; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="check-in">Ngày đến:</label>
                <input type="date" id="check-in" name="check-in" oninput="validDate(), totalPrice()" required>
            </div>
            <div class="form-group">
                <label for="check-out">Ngày đi:</label>
                <input type="date" id="check-out" name="check-out" oninput="totalPrice()" required>
            </div>
            <div class="form-group">
                <label for="guests">Số người ở:</label>
                <input type="number" id="guests" name="guests"  value="1" min="1" max = "<?php echo isset($_GET['quantity']) ? $_GET['quantity'] : 1?>" oninput = "checkVaildGuests()">
            </div>
            <div class="form-group">
                <label for="special-requests">Yêu cầu đặc biệt:</label>
                <textarea id="special-requests" name="special-requests" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="price-per-night">Giá một đêm:</label>
                <input type="text" id="price-per-night" name="price-per-night" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="total-price">Tổng tiền:</label>
                <input type="text" id="total-price" name="total-price" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>" required readonly>
            </div>
            <button type="submit" name = "booking">Đặt phòng</button>
        </form>
        
        <script>
            // xu ly so luong nguoi
            function checkVaildGuests() {
                var guests = document.getElementById('guests');
                var maxGuests = <?php echo isset($_GET['quantity']) ? $_GET['quantity'] : 1; ?>;
                if(empty(guests.value) || guests.value < 1)  {
                        guests.value = 1;
                }
                else if(guests.value > maxGuests) {
                        guests.value = maxGuests;
                }
            }

            function validEmail() {
                var validRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                email = document.getElementById('email').value;
                return validRegex.test(email);
            }

            function validPhone() {
                phone = document.getElementById('phone').value;
                var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                return vnf_regex.test(phone);
            }
           
            function checkBooking() {
                if(!validEmail()) {
                    alert('Email khong hop le!');
                    return false;
                }
                if(!validPhone()) {
                    alert('Phone khong hop le!');
                    return false;
                }
                if(document.getElementById('check-in').value >= document.getElementById('check-out').value) {
                    alert('Ngay dat phong khong hop le!');
                    return false;
                }

                var guests = document.getElementById('guests').value;
                var maxGuests = <?php echo isset($_GET['quantity']) ? $_GET['quantity'] : 1; ?>;
                if(guests < 1 || guests > maxGuests) {
                    alert('So nguoi o khong hop le!');
                    return false;
                }
                return true;
            }
            
            var today = new Date();
            var nextDay = new Date();
            nextDay.setDate(nextDay.getDate() + 1);
            document.getElementById("check-in").valueAsDate = today;
            document.getElementById("check-out").valueAsDate = nextDay;
        
            window.onload = function () {
                var today = new Date().toISOString().split('T')[0];
                var nextDay = new Date();
                nextDay.setDate(nextDay.getDate() + 1);

                document.getElementsByName("check-in")[0].setAttribute('min', today);
                document.getElementsByName("check-out")[0].setAttribute('min', nextDay.toISOString().split('T')[0]);
            }

            function validDate() {
                var checkIn = document.getElementById('check-in').valueAsDate;
                var checkOut = document.getElementById('check-out').valueAsDate;

                if (checkIn && checkOut) {
                    // Kiểm tra nếu ngày "check-in" lớn hơn ngày "check-out"
                    if (checkIn >= checkOut) {
                        // Đặt giá trị "check-out" là ngày sau ngày "check-in"
                        var nextDay = new Date(checkIn);
                        nextDay.setDate(nextDay.getDate() + 1);
                        document.getElementById('check-out').value = nextDay.toISOString().split('T')[0];
                    }

                    // Cập nhật thuộc tính 'min' của "check-out" để vô hiệu hóa tất cả các ngày trước "check-in"
                    var minDate = new Date(checkIn);
                    minDate.setDate(minDate.getDate() + 1);
                    document.getElementsByName("check-out")[0].setAttribute('min', minDate.toISOString().split('T')[0]);
                }
            }
            
            function formatCurrencyVND(amount) {
                return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
            }

            function converToInt(pricePerNight) {
                var price = 0;
                for(let i = 0; i < pricePerNight.length; ++i) {
                    if(pricePerNight[i] >= '0' && pricePerNight[i] <= '9') {
                        price = price * 10 + (pricePerNight[i] - '0');
                    }
                }
                return price;
            }

            function daysdifference(firstDate, secondDate) {
                var startDay = new Date(firstDate);
                var endDay = new Date(secondDate);
        
                var millisBetween = startDay.getTime() - endDay.getTime();
                var days = millisBetween / (1000 * 3600 * 24);
        
                return Math.round(Math.abs(days));
		    }

            // tinh gia tien
            function totalPrice() {
                var day = daysdifference(document.getElementById("check-in").value, document.getElementById("check-out").value);
                var pricePerNight = converToInt(document.getElementById('price-per-night').value);
                var total = document.getElementById('total-price');
                var price = pricePerNight * day;
                total.value = formatCurrencyVND(price);
            }
        </script>
    </div>
</body>
</html>
