<?php
class test
{
    public $print;
    public function __construct($para1 = "")
    {
        if (empty($para1)) {
            $this->print = "This is a test text";
        }
    }

    public function print()
    {
        echo $this->print;
    }
}
