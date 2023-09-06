<?php
require('Room.php');
require('Customer.php');

class Booking {
    private $customer;
    private $room;
    private $checkin;
    private $checkout;
    private $numberOfPeople;
    private $requiredSpecial;
    private $totalAmount;

    public function __construct($customer, $room, $checkin, $checkout, $numberOfPeople, $requiredSpecial, $totalAmount)
    {
        $this->customer = $customer;
        $this->room = $room;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->numberOfPeople = $numberOfPeople;
        $this->requiredSpecial = $requiredSpecial;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Get the value of customer
     */
    public function getCustomer() {
        return $this->customer;
    }

    /**
     * Set the value of customer
     */
    public function setCustomer($customer): self {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Get the value of room
     */
    public function getRoom() {
        return $this->room;
    }

    /**
     * Set the value of room
     */
    public function setRoom($room): self {
        $this->room = $room;
        return $this;
    }

    /**
     * Get the value of checkin
     */
    public function getCheckin() {
        return $this->checkin;
    }

    /**
     * Set the value of checkin
     */
    public function setCheckin($checkin): self {
        $this->checkin = $checkin;
        return $this;
    }

    /**
     * Get the value of checkout
     */
    public function getCheckout() {
        return $this->checkout;
    }

    /**
     * Set the value of checkout
     */
    public function setCheckout($checkout): self {
        $this->checkout = $checkout;
        return $this;
    }

    /**
     * Get the value of numberOfPeople
     */
    public function getNumberOfPeople() {
        return $this->numberOfPeople;
    }

    /**
     * Set the value of numberOfPeople
     */
    public function setNumberOfPeople($numberOfPeople): self {
        $this->numberOfPeople = $numberOfPeople;
        return $this;
    }

    /**
     * Get the value of requiredSpecial
     */
    public function getRequiredSpecial() {
        return $this->requiredSpecial;
    }

    /**
     * Set the value of requiredSpecial
     */
    public function setRequiredSpecial($requiredSpecial): self {
        $this->requiredSpecial = $requiredSpecial;
        return $this;
    }

    /**
     * Get the value of totalAmount
     */
    public function getTotalAmount() {
        return $this->totalAmount;
    }

    /**
     * Set the value of totalAmount
     */
    public function setTotalAmount($totalAmount): self {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    public function insert() {
        $customerID = $this->customer->getID();
        $roomID = $this->room->getRoomID();
        $query = "insert into booking(customerid, roomid, checkindate, checkoutdate, numberofpeople, requiredspecial, totalamount) 
                values ($customerID, $roomID, '$this->checkin', '$this->checkout', $this->numberOfPeople, '$this->requiredSpecial', $this->totalAmount)";
        $result = DBHelper::execute($query);
        return $result;
    }

    public function edit() {

    }

    public function delete() {

    }

    public function getAllData() {

    }

    public function filterData() {

    }

}
?>