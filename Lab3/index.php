<?php
session_start();
require_once "vendor/autoload.php";

// Check if the user is logged in
if (isset($_SESSION["username"])) {
    die("Not allowed");
}

// Check if the unique visitor id cookie exists
if (!isset($_COOKIE['visitor_id'])) {
    // Set a cookie for the visitor with a unique id
    $visitor_id = uniqid(); // Generate a unique id
    setcookie('visitor_id', $visitor_id, time() + (86400 * 30), "/"); // Set the cookie to expire in 30 days
    $counter = new Counter(COUNTER_FILE);
    $counter->increment_visit_count();
}

// Retrieve the visit count
$counter = new Counter(COUNTER_FILE);
$visitsCount = $counter->get_visit_number();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> Counted Unique Visitors: <br> <?php echo $visitsCount ?> </h1>
</body>

</html>