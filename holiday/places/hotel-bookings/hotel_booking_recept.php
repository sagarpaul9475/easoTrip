<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_auth";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_in_date = mysqli_real_escape_string($conn, $_POST['check_in_date']);
    $check_out_date = mysqli_real_escape_string($conn, $_POST['check_out_date']);
    $guests = intval($_POST['guests']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $special_requests = mysqli_real_escape_string($conn, $_POST['special_requests']);

    // Prepare the SQL statement
    $sql = "INSERT INTO hotel_bookings ( email, check_in_date, check_out_date, guests, room_type, special_requests) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisis", $$email, $check_in_date, $check_out_date, $guests, $room_type, $special_requests);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>