<?php
declare(strict_types = 1);

class Account
{
    private PDO $con;
    private array $errorArray = array();


    public function __construct(PDO $con) {
        $this->con  = $con;
    }

    public function register(string $firstName, string $lastName, string $email, string $phoneNumber, string $password, string $password2)//, $birthday, $gender)
    {
        $this->validateName($firstName);
        $this->validateName($lastName);
        $this->validateEmail($email);
        $this->validateName($phoneNumber);
        $this->validatePasswords($password, $password2);
//        $this->validateName($birthday);
//        $this->validateName($gender);
    }


    private function validateName(string $name) {
        if(strlen($name) < 2 || strlen($name) > 25)
        {
            array_push($this->errorArray, Constants::$nameLengthErrorMessage);
        }
    }

    private function validateEmail(string $email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            array_push($this->errorArray, Constants::$emailInvalidErrorMessage);
            return;
        }

        $stmt = $this->con->prepare('SELECT COUNT(*) FROM Users WHERE email=:email');
        $stmt->execute([$email]);

        if($stmt->fetchColumn())
        {
            array_push($this->errorArray, Constants::$emailTakenErrorMessage);
        }
    }

    private function validatePhoneNumber(string $phoneNumber) {
        if(!filter_var($phoneNumber, FILTER_SANITIZE_NUMBER_INT))
        {
            array_push($this->errorArray, Constants::$phoneNumberInvalidErrorMessage);
            return;
        }

        $stmt = $this->con->prepare('SELECT COUNT(*) FROM Users WHERE phoneNumber=:phoneNumber');
        $stmt->execute([$phoneNumber]);

        if($stmt->fetchColumn())
        {
            array_push($this->errorArray, Constants::$phoneNumberTakenErrorMessage);
        }
    }

    private function validatePasswords(string $password, string $password2) {
        if($password != $password2)
        {
            array_push($this->errorArray, Constants::$passwordsMissMatchErrorMessage);
        }
    }

    public function getError(string $error) {
        if(in_array($error, $this->errorArray))
        {
            return $error;
        }
    }
}