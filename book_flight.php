<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $passengerName = $_POST['passengerName'];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Change if necessary
    $password = ""; // Change if necessary
    $dbname = "user_auth"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // API key and API endpoint
    $apiKey = '59ffdd6a54mshb238fa77e12df9dp1bf278jsn84408e937c86'; // Replace with your actual AviationStack key
    $apiUrl = "https://sky-scanner3.p.rapidapi.com/flights/search-everywhere?fromEntityId=NYCA&type=oneway";

    // Initialize cURL
    $ch = curl_init();

    // Set the options
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and capture the response
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $responseData = json_decode($response, true);

        // Handle the API response
        if (isset($responseData['data'][0])) {
            $flightData = $responseData['data'][0];

            // Extracting required flight information
            $flightNumber = $flightData['flight']['number'];
            $airline = $flightData['airline']['name'];
            $departureAirport = $flightData['departure']['airport'];
            $arrivalAirport = $flightData['arrival']['airport'];
            $flightStatus = $flightData['flight_status'];

            // Store data in the database
            $stmt = $conn->prepare("INSERT INTO bookings (origin, destination, date_of_travel, passenger_name, flight_number, airline, departure_airport, arrival_airport, flight_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $origin, $destination, $date, $passengerName, $flightNumber, $airline, $departureAirport, $arrivalAirport, $flightStatus);

            if ($stmt->execute()) {
                echo "Flight booked successfully! Flight Number: " . $flightNumber;
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Failed to find flight: " . $responseData['error']['message'];
        }
    }

    // Close the cURL session
    curl_close($ch);

    // Close the database connection
    $conn->close();
}
?>
