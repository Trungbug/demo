<style>
    body {
        margin: 0;
        padding: 0;
    }

    .nav-item {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Add shadow to the background */
    }

    .nav-item:after {
        content: "";
        display: table;
        clear: both;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        padding: 16px;
        text-decoration: none;
        color: black;
    }

    li a:hover {
        background-color: gray;
    }

    .h-font {
        font-family: 'Merienda', cursive;
    }

    /* CSS for user information */
    .user-info {
        float: right;
        text-align: center;
        display: flex;
    }
</style>

<?php
   session_start();
   $username_booking = $_SESSION['username']; 
?>
<body>
<div class="navigation">
    <ul class="nav-item">
    <li><a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">HOTEL</a> </li>
      <li><a href="booking_service.php">Hội Họp Sự Kiện</a></li>
      <li><a href="booking_bars.php">Nhà Hàng & Bars</a></li>
      <li><a href="user_booking_service.php?username=<?php echo $username_booking; ?>">Xem Thông Tin Dịch Vụ Đã Đặt</a></li>
      <li class="user-info"><a>Tài Khoản: <?php echo $username_booking; ?></a></li>
    </ul>
</div>
