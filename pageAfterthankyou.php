<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if(isset($_SESSION['userID'])) {
  $UserID = $_SESSION['userID'];
}

$MailTitle = $_POST['MailTitle'];
$comment = $_POST['comment'];
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
        set Comment = '$comment', PhoneNumber = '$phone', Mail = '$mail'
        where UserID = $UserID";

//execute query
    if ($conn->query($sql)){
      session_unset($_SESSION['userID']);
      session_destroy();
      header("Location: thankyouagain.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    require_once('PHPMailer/PHPMailerAutoLoad.php');

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port ='465';
    $mail->isHTML();
    $mail->Username = 'studyHaifa@gmail.com';
    $mail->Password = 'study2017';
    $mail->SetFrom('no-reply@gmail.com');
    $mail->Subject = $MailTitle;
    $mail->Body = $comment;
    $mail->AddAddress('studyHaifa@gmail.com');

    $mail->Send();

$conn->close();

 ?>
