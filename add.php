<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());}

$userID = $_POST['userID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO contact(fname, lname, email, phone, userID) VALUES ('$fname','$lname','$email','$phone','$userID')";

if (mysqli_query($conn, $sql)) {
    header('Location: contacts.php');
    exit();
} else {
    echo "Error deleting contact: " . mysqli_error($conn);
}

?>