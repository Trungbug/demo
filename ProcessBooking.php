<?php
    require('Booking.php');

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $roomName = isset($_POST['room-name']) ? $_POST['room-name'] : '';
        $roomType = isset($_POST['room-type']) ? $_POST['room-type'] : '';
        $checkIn = isset($_POST['check-in']) ? $_POST['check-in'] : '';
        $checkOut = isset($_POST['check-out']) ? $_POST['check-out'] : '';
        $guests = isset($_POST['guests']) ? $_POST['guests'] : '';
        $specialRequests = isset($_POST['special-requests']) ? $_POST['special-requests'] : '';
        $pricePerNight = isset($_POST['price-per-night']) ? $_POST['price-per-night'] : '';
        $totalPrice = isset($_POST['total-price']) ? $_POST['total-price'] : '';

      
        
        $customer = new Customer($name, $email, $phone, $gender);
        $customer->insert();
     
        $room = new Room();
        $room->setRoomName($roomName);

        $totalPrice = str_replace(",", "", $totalPrice);
        $totalPrice = str_replace(".", "", $totalPrice);

        $i = strlen($totalPrice) - 1;
        while($i >= 0 && ($totalPrice[$i] < '0' || $totalPrice[$i] > '9')) --$i;

        $totalPrice = substr($totalPrice, 0, $i + 1);
       
        $booking = new Booking($customer, $room, $checkIn, $checkOut, $guests, $specialRequests, (int)$totalPrice);
        $result = $booking->insert();

        if($result) {
            header('location: BookingNotice.php');
        }
        else {
            echo 'loi';
        }
    }
?>