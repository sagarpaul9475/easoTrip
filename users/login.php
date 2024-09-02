<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_auth";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $response = ['success' => false, 'message' => 'Invalid username or password.'];

    if (mysqli_num_rows($result) == 1) {
        if ($row = mysqli_fetch_assoc($result)) {
            $full_name = $row['firstname'] . ' ' . $row['lastname'];
            $response = ['success' => true, 'message' => $full_name];
        } else {
            $response['message'] = "No user found with these credentials.";
        }
    } else {
        $response['message'] = "Invalid email or password.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
// Output the JSON data
header('Content-Type: application/json');
echo json_encode($response);