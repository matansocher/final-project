<?php
session_start();
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
$flag=false;

if(!empty($_POST['usernameInput']) || !empty($_POST['passwordInput'])){
  $result = $conn->query("SELECT * FROM user");
  while($row = $result->fetch_assoc()){
    $uName= $row["userName"];
    $password= $row["password"];
    if($_POST['usernameInput']==$uName && $_POST['passwordInput']==$password){ //if userName  exists
    $_SESSION['currentUser']=$uName;
    $flag=true;
    header("Location: ../adminMain.php");
     }
  }

}
if($flag==false) // if it's wrong user name or password
 header("Location: login.php?errorMsg=true");


$conn->close();
 ?>
