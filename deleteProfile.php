<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$userID = mysqli_real_escape_string($conn, $_POST['userID']);

$sql = "DELETE FROM user WHERE userID='$userID'";
echo $sql;
if (mysqli_query($conn, $sql)) {
    header('Location: home.php');
    exit();
} else {
    echo "Error deleting profile: " . mysqli_error($conn);
}

mysqli_close();
?>