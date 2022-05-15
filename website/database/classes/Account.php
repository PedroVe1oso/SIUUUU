<?php

class Account
{
    private $con;
    private $errorArray = array();


    public function __construct($con) {
        $this->con  = $con;
    }

    public function validateFirstName($firstName) {
        if(strlen($firstName) < 2 || strlen($firstName) > 25)
        {
            array_push($this->errorArray, "First name has wrong length");
        }
    }

    public function getError($error) {
        if(in_array($error, $this->errorArray))
        {
            return $error;
        }
    }
}