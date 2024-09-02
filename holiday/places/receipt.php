<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "travel_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the form submission
$attendees = (int)$_POST['attendees'];
$children = isset($_POST['children']) ? (int)$_POST['children'] : 'None';
$pets = isset($_POST['pets-toggle']) ? 'Yes' : 'No';

// Additional services (use "None" instead of 0 when not selected)
$wheelchair = isset($_POST['wheelchair']) ? $_POST['wheelchair'] : 'None';
$stroller = isset($_POST['stroller']) ? $_POST['stroller'] : 'None';
$babysitter = isset($_POST['babysitter']) ? $_POST['babysitter'] : 'None';
$translator = isset($_POST['translator']) ? $_POST['translator'] : 'None';
$chef = isset($_POST['chef']) ? $_POST['chef'] : 'None';
$tourGuide = isset($_POST['tourguide']) ? $_POST['tourguide'] : 'None';

// Selected coupon discount
$appliedDiscount = isset($_POST['apply_coupon_grandoff']) ? (int)$_POST['apply_coupon_grandoff'] : 0;

// Prices (these would typically be calculated based on business logic)
$currentPrice = 46417;
$originalPrice = 68499;
$basePricePerAttendee = 46417; // Example base price per attendee
$currentPrice = $basePricePerAttendee * $attendees;
$discountAmount = $originalPrice - $currentPrice;
$saving = $discountAmount + $appliedDiscount;
$finalPrice = $currentPrice - $appliedDiscount;


// Insert the data into the database
$sql = "INSERT INTO bookings (attendees, children, pets, wheelchair, stroller, babysitter, translator, chef, tour_guide, original_price, current_price, discount_amount, applied_discount, final_price)
        VALUES ('$attendees', '$children', '$pets', '$wheelchair', '$stroller', '$babysitter', '$translator', '$chef', '$tourGuide', '$originalPrice', '$currentPrice', '$discountAmount', '$appliedDiscount', '$finalPrice')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "<center>";
    echo "Booking record created successfully. Booking ID is: " . $last_id."<br><br>";
    echo "</center>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .receipt-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .receipt-item label {
            font-weight: bold;
        }
        .total {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <h1>Receipt</h1>

    <div class="receipt-item">
        <label>Number of Adults:</label>
        <span><?= htmlspecialchars($attendees); ?></span>
    </div>

    <div class="receipt-item">
        <label>Number of Children (0-7yrs):</label>
        <span><?= htmlspecialchars($children); ?></span>
    </div>

    <div class="receipt-item">
        <label>Pets:</label>
        <span><?= htmlspecialchars($pets); ?></span>
    </div>

    <h2>Additional Services</h2>
    <div class="receipt-item">
        <label>Wheelchair:</label>
        <span><?= htmlspecialchars($wheelchair); ?></span>
    </div>
    <div class="receipt-item">
        <label>Stroller:</label>
        <span><?= htmlspecialchars($stroller); ?></span>
    </div>
    <div class="receipt-item">
        <label>Babysitter:</label>
        <span><?= htmlspecialchars($babysitter); ?></span>
    </div>
    <div class="receipt-item">
        <label>Translator:</label>
        <span><?= htmlspecialchars($translator); ?></span>
    </div>
    <div class="receipt-item">
        <label>Personal Chef:</label>
        <span><?= htmlspecialchars($chef); ?></span>
    </div>
    <div class="receipt-item">
        <label>Tour Guide:</label>
        <span><?= htmlspecialchars($tourGuide); ?></span>
    </div>

    <h2>Pricing</h2>
    <div class="receipt-item">
        <label>Original Price:</label>
        <span>₹<?= number_format($originalPrice); ?></span>
    </div>
    <div class="receipt-item">
        <label>Current Price:</label>
        <span>₹<?= number_format($currentPrice); ?></span>
    </div>
    <div class="receipt-item">
        <label>Discount:</label>
        <span>₹<?= number_format($discountAmount); ?> (28% OFF)</span>
    </div>
    <div class="receipt-item">
        <label>Coupon Applied:</label>
        <span>₹<?= number_format($appliedDiscount); ?></span>
    </div>

    <div class="total">
        Total: <span id="finalPrice">₹<?= number_format($finalPrice); ?></span>
    </div>
</div>
<script>
document.getElementById('attendees').addEventListener('input', updatePrice);
document.getElementById('apply_coupon_grandoff').addEventListener('input', updatePrice);

function updatePrice() {
    let attendees = parseInt(document.getElementById('attendees').value) || 0;
    let couponValue = parseInt(document.getElementById('apply_coupon_grandoff').value) || 0;
    let basePricePerAttendee = 46417; // Example base price per attendee

    let currentPrice = basePricePerAttendee * attendees;
    let finalPrice = currentPrice - couponValue;

    document.getElementById('finalPrice').innerText = '₹' + finalPrice;
}
</script>

</body>
</html>
