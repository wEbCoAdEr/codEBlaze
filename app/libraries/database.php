<?php
class database
{
    public $user;
    public $pass;
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }
    public function printInfo()
    {
        echo "The username is " . $this->user . "<br>";
        echo "The password is " . $this->pass . "<br>";
    }
    public function test()
    {
        echo "This is a test text";
    }
}
