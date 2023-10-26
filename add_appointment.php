<?php
include 'connect.php';

$patient_id = $_POST['patient_id'];
$appointment_date = $_POST['appointment_date'];
$notes = $_POST['notes'];

$sql = "INSERT INTO appointments (patient_id, appointment_date, notes)
        VALUES ('$patient_id', '$appointment_date', '$notes')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

