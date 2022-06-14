<?php
    declare(strict_types = 1);

    ob_start(); // turn on output buffering
    session_start();

    date_default_timezone_set("Europe/Lisbon"); // used to insert date and time to the database

    try
    {
        $con = new PDO('sqlite:' . __DIR__ . '/database.db');
        $con -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $exception)
    {
        exit("Connection to database failed: " . $exception -> getMessage());
    }

    /*
    function getDatabaseConnection() : PDO {
        try
        {
            $con = new PDO('sqlite:' . __DIR__ . '/database.db');
            $con -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception)
        {
            exit("Connection to database failed: " . $exception -> getMessage());
        }

        return $con;
    }
    */
?>
