<?php
include 'connect.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

$sql = "INSERT INTO patients (first_name, last_name, dob, gender, phone, email, address)
        VALUES ('$first_name', '$last_name', '$dob', '$gender', '$phone', '$email', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "Patient added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

