<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/Session.php');
$session = new Session();

require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/classes/User.php');

$con = getDatabaseConnection();


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$birthDate = $_POST['birthDate'];
$gender = $_POST['gender'];

if($password1 != $password2) {
    $session->addMessage('passwordsMissMatchError', 'Passwords dont match!');
}
else  {
    try {

        $password = password_hash($password1, PASSWORD_DEFAULT);

        $stmt = 'INSERT INTO Users (firstName, lastName, phoneNumber, email, password, birthDate, gender) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $result = $con->prepare($stmt);
        $result->execute(array($firstName, $lastName, $phoneNumber, $email, $password, $birthDate, $gender));
    } catch (PDOException $exception) {
        if ($exception->getcode() == 23000) {
            $session->addMessage('Integrity Constraint Violation', $exception->getMessage());
        }
        else{
            $session->addMessage('Error occurred inserting user details', $exception->getMessage());
        }
    }
}
header('Location: /website/pages/login.php');
?>