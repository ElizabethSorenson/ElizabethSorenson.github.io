<?php
/**
 * Created by PhpStorm.
 * User: Libst
 * Date: 12/12/2017
 * Time: 4:34 PM
 */


$username = "W01145640";
$password = "Elizabethcs!";
$host = "localhost";
$dbname = "W01145640";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
}catch(PDOException $err){
    echo "problem occurred";
    die("Error:". $err->getMessage());
}
echo "I'm connected!";
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//$sqltest = $dbh->prepare("INSERT INTO ")



/*
class DatabaseConnection
{
    private static $instance = null;
    private static $host = "localhost";
    private static $dbname = "SubwayAccount";
    private static $user = "W01145640";
    private static $pass = "Elizabethcs!";

    private function __construct()
    {

    }

    public static function getInstance(): \PDO{
        if (!static::$instance === null) {
            return static::$instance;
        } else {
            try {
                $connectionString = "mysql:host=".static::$host.";dbname=".static::$dbname;
                static::$instance = new \PDO($connectionString, static::$user, static::$pass);
                static::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return static::$instance;
            } catch (PDOException $e) {
                echo "Unable to connect to the database: " . $e->getMessage();
                die();
            }
        }
    }

}//end DatabaseConnection

*/