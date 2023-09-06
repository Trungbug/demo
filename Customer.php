<?php 
require_once('Account.php');

class Customer{
    private $name;
    private $phoneNumber;
    private $email;
    private $gender;

    public function __construct($name, $email, $phoneNumber, $gender) {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->gender = $gender;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     */
    public function setPhoneNumber($phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     */
    public function setGender($gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getID() {
        $query = "select customerid from customer where name = '$this->name' and email = '$this->email' and phonenumber = '$this->phoneNumber' and gender = '$this->gender'";
        $result = DBHelper::execute($query);
        return $result->fetch_array(MYSQLI_ASSOC)['customerid'];
    }

    
    public function insert() {
        if(!$this->isExits()) {
            $query = "insert into customer (name, email, phonenumber, gender) values ('$this->name', '$this->email', '$this->phoneNumber', '$this->gender')";
            $result = DBHelper::execute($query);
            return $result;
        }
    }

    public function isExits() {
        $query = "select * from customer where name = '$this->name' and email = '$this->email' and phonenumber = '$this->phoneNumber' and gender = '$this->gender'";
        $result = DBHelper::execute($query);
        return $result->num_rows > 0;
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