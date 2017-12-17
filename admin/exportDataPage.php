
<?php

$servername = "li1415-114.members.linode.com";
$username = "exp";
$password = "y164p13";
$db="exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query('SELECT * FROM Data');
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="dataTable.csv"');
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}
?>
