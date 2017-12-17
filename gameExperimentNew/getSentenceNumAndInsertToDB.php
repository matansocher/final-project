<?php
  session_start();

  if(isset($_SESSION['userID'])) {
    $UserID = $_SESSION['userID'];
  }

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

///get current user TypeNum and GroupNum
  $queryForTypeNum = $conn->query("SELECT TypeNum, GroupNum FROM Manager WHERE UserID = $UserID");
  if ($queryForTypeNum->num_rows > 0) {
   while($row = $queryForTypeNum->fetch_assoc()) {
         $TypeNum= $row["TypeNum"];
         $GroupNum= $row["GroupNum"];
     }
   }

   $sentence=0;// initialize

   //get Highest ID for current user's TypeNum and GroupNum:
 $queryLastId = $conn->query("SELECT MAX(ID) AS HighestID FROM Manager WHERE TypeNum = $TypeNum AND GroupNum=$GroupNum And ID not in (SELECT ID FROM Manager WHERE UserID=$UserID)");

   if ($queryLastId->num_rows >= 0) {
     while($row = $queryLastId->fetch_assoc()) {
           $HighestID= $row["HighestID"];
           if($HighestID!= NULL){
            $querysentenceNumOfLastId = $conn->query("SELECT sentenceNum FROM Manager WHERE ID = $HighestID");
            if ($querysentenceNumOfLastId->num_rows > 0) {
             while($row1 = $querysentenceNumOfLastId->fetch_assoc()) {
                 $sentence= $row1["sentenceNum"];
                 if($sentence >= 3 && $sentence<=6)
                   $sentence=$sentence+1;
                   if($sentence < 3)
                     $sentence=$sentence+1;
           }
         }
        }
      }
     }


     if($sentence==0)  // not exist yet in Manager table
       $sentence=1;
     if($sentence==7)  // not exsits sentence 7
       $sentence=4;
     if(($GroupNum==1||$GroupNum==9||$GroupNum==11) && $sentence==4 )  // change to sentence 1  if it is Group 1 (not exsists sentence 4 in this group)
       $sentence=1;
     if(($GroupNum==2||$GroupNum==10||$GroupNum==12) and $sentence==1)// change to sentence 4  if it is Group 2 ( not exsists sentence 1 in this group)
        $sentence=4;


     $sql1 = "update Manager
     set sentenceNum=$sentence
     where UserID = $UserID";

     $sql2 = "update Data
     set Sentence=$sentence
     where UserID = $UserID";

     $conn->query($sql1);
     $conn->query($sql2);

      $array=array();

      $queryGetDetails1 = $conn->query("SELECT * FROM Sentence WHERE SentenceNum=$sentence");

        if ($queryGetDetails1->num_rows >= 0) {
          while($row = $queryGetDetails1->fetch_assoc()) {
            $word1=$row["word1"];
            $word2=$row["word2"];
            $word3=$row["word3"];
            $word4=$row["word4"];
            $word5=$row["word5"];
            array_push($array,$word1,$word2,$word3,$word4,$word5);
           }
          }

      $queryGetDetails2 = $conn->query("SELECT * FROM Page WHERE Name='Sentence Completion'");

        if ($queryGetDetails2->num_rows >= 0) {
          while($row = $queryGetDetails2->fetch_assoc()) {
            $header=$row["Header"];
            $description=$row["Description"];
            $error=$row["ErrorMessage"];
            array_push($array,$header,$description,$error);
           }
          }

          echo json_encode($array);

  $conn->close();
   ?>
