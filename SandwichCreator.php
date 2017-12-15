<?php
/**
 * Created by PhpStorm.
 * User: Libst
 * Date: 12/14/2017
 * Time: 11:18 AM
 */

$servername = "localhost";
$username = "W01145640";
$password = "Elizabethcs!";
$dbname = "W01145640";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 22);
// Evaluate the Connection
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}


$empUsername = $_POST['username'] ?? "";
$timeInput = $_POST['timeInput'] ?? "";
$sandwichType = $_POST['sandwichType'] ?? "";
$cheese1 = $_POST['cheese1'] ?? "";
$cheese2 = $_POST['cheese2'] ?? "";
$cheese3 = $_POST['cheese3'] ?? "";


$sqlCheck = "SELECT *  FROM `SubwayAccount` WHERE username = '$empUsername' AND clockedIn = '1' ";


$sqlInsert = "INSERT INTO SubwaySandwich (userName, time, type, cheese1, cheese2, cheese3)
    VALUES ('$empUsername', '$timeInput', '$sandwichType', '$cheese1','$cheese2', '$cheese3')";

$result = $conn->query($sqlCheck);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ;
    }
        if ($conn->query($sqlInsert) === TRUE) {
            echo "New record created!";
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }

} else {
    echo "User is not logged in";
}