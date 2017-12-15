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
$loginUsername = $_POST['username'] ?? "";
$loginPassword = $_POST['password'] ?? "";

$cookieName = "userInfo";
if(!isset($_COOKIE[$cookieName])) {
    echo "Success!";
}
setcookie($cookieName, $loginUsername, time() + (86400 * 30), "/"); // 86400 = 1 day

$hashPassword =  hash('sha256' , "{{$loginUsername}:{$loginPassword}}", false );

$sqlCheck = "SELECT * FROM `SubwayAccount` WHERE password = '$hashPassword' AND Admin = '1'";

$result = $conn->query($sqlCheck);

if ($result->num_rows > 0) {

        echo "Success!";
        $sql = "UPDATE `SubwayAccount` SET clockedIn = '1', startHours = NOW() WHERE userName = '$loginUsername' ";
        $result2 = $conn->query($sql);
    }
    else {
        echo "Sorry, the credentials you provided were unsuccessful in logging you in";


}

?>