<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if(isset($_SESSION['userID'])) {
  $UserID = $_SESSION['userID'];
}

$phone = $_POST['phone'];
$mail = $_POST['mail'];


$servername = "li1415-114.members.linode.com";
$username = "exp";
$password = "y164p13";
$db = "exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query("set names 'utf8'");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

    $sql = "update Data
    set PhoneNumber = '$phone', Mail = '$mail'
    where UserID = $UserID";

//execute query
    if ($conn->query($sql)){
      session_unset($_SESSION['userID']);
      session_destroy();
      header("Location: thankyouagain.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

$conn->close();

 ?>
