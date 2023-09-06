<?php 
require('Modify.php');

class RoomType {
    private $typeName;
    private $description;


    public function __constructor($typeName, $description)
    {
        $this->typeName = $typeName;
        $this->description = $description;
    }

    public function getTypeName() {
        return $this->typeName;
    }

    public function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        return $this->description = $description;
    }
    
}
?>