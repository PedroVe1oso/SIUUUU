<?php
declare(strict_types = 1);

class User
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
    public string $email;
    public string $birthDate;
    public string $gender;

    public function __construct(int $id, string $firstName, string $lastName, string $phoneNumber, string $email, string $birthDate, string $gender)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
    }

    function name(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    function save($con) {
        $stmt = $con->prepare('
        UPDATE Users SET firstName = ?, lastName = ?
        WHERE id = ?
      ');

        $stmt->execute(array($this->firstName, $this->lastName, $this->id));
    }

    static function getUserWithPassword(PDO $con, string $email, string $password) : ?User {
        $stmt = $con->prepare('
        SELECT id, firstName, lastName, phoneNumber, email, password, birthDate, gender
        FROM Users 
        WHERE lower(email) = ?
      ');

        $stmt->execute(array(strtolower($email)));
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            return new User(
                $user['id'],
                $user['firstName'],
                $user['lastName'],
                $user['phoneNumber'],
                $user['email'],
                $user['birthDate'],
                $user['gender']
            );
        } else return null;
    }

    static function getUser(PDO $con, int $id) : User {
        $stmt = $con->prepare('
        SELECT id, firstName, lastName, phoneNumber, email, birthDate, gender
        FROM Users 
        WHERE id = ?
      ');

        $stmt->execute(array($id));
        $user = $stmt->fetch();

        return new User(
            $user['id'],
            $user['firstName'],
            $user['lastName'],
            $user['phoneNumber'],
            $user['email'],
            $user['birthDate'],
            $user['gender']
        );
    }
}
?>