<?php
declare(strict_types = 1);

class Account
{
    private PDO $con;
    private array $errorArray = array();


    public function __construct(PDO $con) {
        $this->con  = $con;
    }

    public function signUp(string $firstName, string $lastName, string $phoneNumber, string $email, string $password, string $password2, string $birthday, string $gender): bool
    {
        $this->validateName($firstName);
        $this->validateName($lastName);
        $this->validateEmail($email);
        $this->validatePhoneNumber($phoneNumber);
        $this->validatePasswords($password, $password2);

        if (empty($this->errorArray))
        {
            return $this->insertUserDetails($firstName, $lastName, $phoneNumber, $email, $password, $birthday, $gender);
        }

        return false;
    }

    public function signIn(string $email, string $password)
    {
        $password = hash("sha512", $password);

        $stmt = $this->con->prepare('SELECT COUNT(*) FROM Users WHERE email= :email AND password= :password');
        $stmt->execute([$email, $password]);

        if($stmt->fetchColumn() == 1)
        {
            return true;
        }

        array_push($this->errorArray, Constants::$loginFailedErrorMessage);
        return false;

    }

    private function insertUserDetails(string $firstName, string $lastName, string $phoneNumber, string $email, string $password, string $birthday, string $gender): bool
    {
        $password = hash("sha512", $password);

        $stmt = $this->con->prepare('INSERT INTO Users(firstName, lastName, phoneNumber, email, password, birthdate, gender)
                                                    VALUES (:firstName, :lastName, :phoneNumber, :email, :password, :birthday, :gender)');
        return $stmt->execute([$firstName, $lastName, $phoneNumber, $email, $password, $birthday, $gender]);
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

        $stmt = $this->con->prepare('SELECT COUNT(*) FROM Users WHERE email= :email');
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

        $stmt = $this->con->prepare('SELECT COUNT(*) FROM Users WHERE phoneNumber= :phoneNumber');
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
?>