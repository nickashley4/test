<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$userID = $_POST['userID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$school = $_POST['school'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$about = $_POST['about'];

$sql = "UPDATE user
SET fname = '$fname', lname = '$lname', school = '$school', email = '$email', phone = '$phone', about = '$about'
WHERE userID = '$userID'";

if (mysqli_query($conn, $sql)) {
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}

mysqli_close($conn);

?>