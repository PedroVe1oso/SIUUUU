<?php
declare(strict_types = 1);

require_once(__DIR__ . '/../includes/classes/Session.php');
$session = new Session();

require_once(__DIR__ . '/../database/config.php');
require_once(__DIR__ . '/../database/classes/User.php');

$con = getDatabaseConnection();


$name = $_POST['name'];
$address = $_POST['address'];


try {

    $stmt = 'INSERT INTO Restaurant (name, address, ownerId) VALUES (?, ?, ?)';
    $result = $con->prepare($stmt);
    $result->execute(array($name, $address, $session->getId()));

} catch (PDOException $exception) {
    if ($exception->getcode() == 23000) {
        $session->addMessage('Integrity Constraint Violation', $exception->getMessage());
    }
    else{
        $session->addMessage('Error occurred inserting restaurant details', $exception->getMessage());
    }
}

header('Location: ../pages/profile.php');
?>