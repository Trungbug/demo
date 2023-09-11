<?php 
require_once('Modify.php');

class Account{
    private $userName;
    private $password;
    private $customer;

    public function __construct($userName, $password, $customer)
    {   
        $this->userName = $userName;
        $this->password = $password;
        $this->customer = $customer;
    }

    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     */
    public function setUserName($userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
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

    public function insert() {
        if(!$this->isExist()) {
            $id = DBHelper::execute("select max(customerid) as customerid from customer")->fetch_array(MYSQLI_ASSOC)['customerid'];
            $query = "insert into account(username, password, customerid) values('$this->userName', '$this->password', $id)";
            $result = DBHelper::execute($query);
            return $result;
        }
        return false;
    }

    public function edit() {

    }

    public function delete() {

    }

    public function getAllData() {

    }

    public function filterData() {

    }

    public function isExist() {
        $query = "select * from account where username = '$this->userName' and password = '$this->password'";
        $result = DBHelper::execute($query);
        return $result->num_rows > 0;
    }
}
?>