<?php

include 'File.php';
class User{
    public $username;
    public $admin;
    public function Access(){
        if($this->username=='nhan')
        {
            $this->admin=true;
        }
        else $this->admin=false;
    }
}
if (isset($_GET['name'])) {    
    $obj=unserialize($_GET['name']);
    $obj->Access();
}
?>