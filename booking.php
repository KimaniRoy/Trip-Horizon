<?php
// Include database connection
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['names'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $wildlife_destination = $_POST['wildlife-destination'];
    $beach_resort = $_POST['beach-destination'];
    $museum_destination = $_POST['museum-destination'];
    $mode_of_payment = $_POST['paymentMode'];

    // Prevent SQL Injection
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $age = (int)$conn->real_escape_string($age);
    $sex = $conn->real_escape_string($sex);
    $wildlife_destination = $conn->real_escape_string($wildlife_destination);
    $beach_resort = $conn->real_escape_string($beach_resort);
    $museum_destination = $conn->real_escape_string($museum_destination);
    $mode_of_payment = $conn->real_escape_string($mode_of_payment);

    // Insert into bookings table
    $sql = "INSERT INTO bookings (name, email, age, sex, wildlife_destination, beach_resort, museum_destination, mode_of_payment) 
            VALUES ('$name', '$email', '$age', '$sex', '$wildlife_destination', '$beach_resort', '$museum_destination', '$mode_of_payment')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
