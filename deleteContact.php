<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$contact_id = mysqli_real_escape_string($conn, $_POST['contact_id']);
$userID = mysqli_real_escape_string($conn, $_POST['userID']);

$sql = "DELETE FROM contact WHERE contact_id='$contact_id' AND userID='$userID'";
echo $sql;
if (mysqli_query($conn, $sql)) {
    header('Location: contacts.php');
    exit();
} else {
    echo "Error deleting contact: " . mysqli_error($conn);
}

mysqli_close();
?>