<?php

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

$taken = 1;
$newUsername = $_POST['username'] ?? "";
$newPassword = $_POST['password'] ?? "";

$hashPassword =  hash ( 'sha256' , "{{$newUsername}:{$newPassword}}", false );

$sqlCheck = "SELECT COUNT(*) as exist FROM `SubwayAccount` WHERE username = '$newUsername'";

$sqlInsert = "INSERT INTO SubwayAccount (userName, password, startHours, clockedIn, numSandwich, endHours, Admin)
    VALUES ('$newUsername', '$hashPassword', '0', '0', '0', '0','0')";

$result = $conn->query($sqlCheck);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $taken = $row["exist"];
    }
    if($taken > 0 || $newUsername === ""){
        echo "Sorry, but that username has been taken. Please insert another username.";
    } else {
        if ($conn->query($sqlInsert) === TRUE) {
            echo "New record created!";
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    }
} else {
    echo "Something went wrong! Please try again!";
}

?>