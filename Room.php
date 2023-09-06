<?php 
require_once('RoomType.php');

class Room {
    private $roomName;
    private $roomTypeId;
    private $image;
    private $pricePerNight;
    private $area;
    private $quantity;
    private $description;

    public function __construct() {
       
    }

    // Getter and Setter for $roomName
    public function getRoomName() {
        return $this->roomName;
    }
    
    public function setRoomName($roomName) {
        $this->roomName = $roomName;
    }

    // Getter and Setter for $roomTypeId
    public function getRoomTypeId() {
        return $this->roomTypeId;
    }
    
    public function setRoomTypeId($roomTypeId) {
        $this->roomTypeId = $roomTypeId;
    }

    // Getter and Setter for $image
    public function getImage() {
        return $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }

    // Getter and Setter for $pricePerNight
    public function getPricePerNight() {
        return $this->pricePerNight;
    }
    
    public function setPricePerNight($pricePerNight) {
        $this->pricePerNight = $pricePerNight;
    }

    // Getter and Setter for $area
    public function getArea() {
        return $this->area;
    }
    
    public function setArea($area) {
        $this->area = $area;
    }

    // Getter and Setter for $quantity
    public function getQuantity($roomName) {
        $query = "select quantity
                from room
                where room.roomname = '$roomName'
                limit 1";
        $result = DBHelper::execute($query);
        if($result != null) {
            $quantity = $result->fetch_array(MYSQLI_ASSOC)['quantity'];
            return $quantity;
        }
        return 1;
    }
    
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Getter and Setter for $description
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    public static function getRoom() {
        $query = "select roomname, roomtypeid, image, pricepernight, area, quantity, description from room";
        $result = DBHelper::execute($query);
        return $result;
    }

    public function getTypeRoom($roomName) {
        $query = "select typename
            from roomtype
            inner join room
            on roomtype.roomtypeid = room.roomtypeid
            where room.roomname = '$roomName'
            limit 1";
        $result = DBHelper::execute($query);
        if($result != null) {
            $typeRoom = $result->fetch_array(MYSQLI_ASSOC)['typename'];
            return $typeRoom;
        }
        return 'None';
    }

    public function getRoomID() {
        $query = "select roomid from room
            where room.roomname = '$this->roomName'
            limit 1";
        $result = DBHelper::execute($query);
        if($result != null) {
            $typeRoom = $result->fetch_array(MYSQLI_ASSOC)['roomid'];
            return $typeRoom;
        }
        return 1;
    }

    public function getPriceRoom($roomName) {
        $query = "select pricepernight
            from room
            where room.roomname = '$roomName'
            limit 1";
        $result = DBHelper::execute($query);
        if($result != null) {
            $price = $result->fetch_array(MYSQLI_ASSOC)['pricepernight'];
            return $price;
        }
        return 0;
    }
}
?>