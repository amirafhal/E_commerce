<?php
session_start();
include 'config.php';

// Retrieve user's cart items from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM cart_items WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary styles and scripts -->
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Display user's cart items from the database -->
    <div class="container">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>{$row['product_name']} - {$row['product_quantity']} - {$row['product_price']}</p>";
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
