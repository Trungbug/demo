<?php 
require_once('DBHelper.php');

interface Modify {
    public function insert();

    public function edit();

    public function delete();

    public function getAllData();

    public function filterData();
}
?>