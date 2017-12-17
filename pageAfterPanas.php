<?php
session_start();

if(isset($_SESSION['userID'])) {
  $UserID = $_SESSION['userID'];
}

$mitanien_value = "null";
$mutrad_value = "null";
$nirgash_value = "null";
$mezuvrah_value = "null";
$hazak_value = "null";
$merugaz_value = "null";
$daruch_value = "null";
$mevuiash_value = "null";
$baalHashraa_value = "null";
$azbani_value = "null";
$ashma_value = "null";
$mefohad_value = "null";
$oyen_value = "null";
$pail_value = "null";
$gee_value = "null";
$hoshesh_value = "null";
$nahush_value = "null";
$kashuv_value = "null";
$hasarMenuha_value = "null";
$nilhav_value = "null";

if(isset($_POST['mitanien']))
  $mitanien_value = $_POST['mitanien'];
if(isset($_POST['mutrad']))
  $mutrad_value = $_POST['mutrad'];
if(isset($_POST['nirgash']))
  $nirgash_value = $_POST['nirgash'];
if(isset($_POST['mezuvrah']))
  $mezuvrah_value = $_POST['mezuvrah'];
if(isset($_POST['hazak']))
  $hazak_value = $_POST['hazak'];
if(isset($_POST['merugaz']))
  $merugaz_value = $_POST['merugaz'];
if(isset($_POST['daruch']))
  $daruch_value = $_POST['daruch'];
if(isset($_POST['mevuiash']))
  $mevuiash_value = $_POST['mevuiash'];
if(isset($_POST['baalHashraa']))
  $baalHashraa_value = $_POST['baalHashraa'];
if(isset($_POST['azbani']))
  $azbani_value = $_POST['azbani'];
if(isset($_POST['ashma']))
  $ashma_value = $_POST['ashma'];
if(isset($_POST['mefohad']))
  $mefohad_value = $_POST['mefohad'];
if(isset($_POST['oyen']))
  $oyen_value = $_POST['oyen'];
if(isset($_POST['pail']))
  $pail_value = $_POST['pail'];
if(isset($_POST['gee']))
  $gee_value = $_POST['gee'];
if(isset($_POST['hoshesh']))
  $hoshesh_value = $_POST['hoshesh'];
if(isset($_POST['nahush']))
  $nahush_value = $_POST['nahush'];
if(isset($_POST['kashuv']))
  $kashuv_value = $_POST['kashuv'];
if(isset($_POST['hasarMenuha']))
  $hasarMenuha_value = $_POST['hasarMenuha'];
if(isset($_POST['nilhav']))
  $nilhav_value = $_POST['nilhav'];


$servername = "li1415-114.members.linode.com";
$username = "exp";
$password = "y164p13";
$db = "exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

        $sql = "update Data
        set Panas1=$mitanien_value, Panas2=$mutrad_value, Panas3=$nirgash_value, Panas4=$mezuvrah_value, Panas5=$hazak_value,
        Panas6=$merugaz_value, Panas7=$daruch_value, Panas8=$mevuiash_value, Panas9=$baalHashraa_value, Panas10=$azbani_value,
        Panas11=$ashma_value, Panas12=$mefohad_value, Panas13=$oyen_value, Panas14=$pail_value,Panas15=$gee_value,
        Panas16=$hoshesh_value, Panas17=$nahush_value, Panas18=$kashuv_value, Panas19=$hasarMenuha_value, Panas20=$nilhav_value
        where UserID = $UserID";
        echo $UserID;


$ExpNumber = $conn->query("SELECT ExpNumber FROM Groups WHERE GroupNumber = (SELECT GroupNum FROM Manager WHERE UserID = $UserID)");// uses group numer to get experiment number

if ($ExpNumber->num_rows > 0) {
  while($row = $ExpNumber->fetch_assoc()) {
        echo "ExpNumber: " . $row["ExpNumber"]."<br>";
        $expNum = $row["ExpNumber"];
  }
}

//execute query
    if ($conn->query($sql)) {
      if ($expNum == 1)
      header("Location: game/game.php");
      if ($expNum == 2)
      header("Location: questionnaireExperiment/Preferences11.php");
      if ($expNum == 3)
      header("Location: questionnaireExperiment/Preferences21.php");
      if ($expNum == 4)
        header("Location: questionnaireExperiment/feeling1.php");
      if ($expNum == 5)
        header("Location: questionnaireExperiment/helpTask.php");
      if ($expNum == 6)
      header("Location: game/game.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

$conn->close();

 ?>
