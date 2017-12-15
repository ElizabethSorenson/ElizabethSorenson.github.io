<html>
<head>
    <title>Subway Main</title>

    <style>
        #username
        {
            float: left;
        }
        #score
        {
            padding-left: 100px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<h1>Currently clocked in:</h1>
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

$userInfo = array();
//$scoreInfo = array();

$query = 'SELECT * FROM SubwayAccount WHERE clockedIn = 1 ORDER BY userName';

$result = $conn->query($query);
$count = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clockedInfo[] = $row["clockedIn"];
        $userInfo[] = $row["userName"];
        $count++;
    }
} else {
    echo "0 results";
}

?>

<?php

echo '<a href="Login.html"><button>Clock In/Out</button></a><br/>

<div class="hsDisplay" id="username">';

for ($i = 0; $i < $count ; $i++) {
    echo "<br/>" . $userInfo[$i] ?? "";

}
?>

 <h2>Top Makers:</h2>
<?php

$query2 = 'SELECT DISTINCT userName time FROM `SubwaySandwich`ORDER BY time DESC';
$result = $conn->query($query2);



?>

</body>
</html>
