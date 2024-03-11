<?php
session_start();
include 'config.php';
echo "Script is running"; // Add this line

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or perform any other action
    header("location:/form/login.php");
    exit; // Stop script execution
}

try {
    $product_name = htmlspecialchars($_POST['Pname']);
    $product_price = floatval($_POST['Pprice']);
    $product_quantity = intval($_POST['Pquantite']);

    if (isset($_POST['addCart'])) {
        $check_query = "SELECT * FROM cart_items WHERE user_id = {$_SESSION['user_id']} AND product_name = '$product_name'";
        $check_result = mysqli_query($conn, $check_query);

        if ($check_result === false) {
            throw new Exception("Query error: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($check_result) > 0) {
            throw new Exception('Product already added to cart');
        } else {
            $insert_query = "INSERT INTO cart_items (user_id, product_name, product_price, product_quantity) VALUES ({$_SESSION['user_id']}, '$product_name', $product_price, $product_quantity)";
            $insert_result = mysqli_query($conn, $insert_query);

            if (!$insert_result) {
                echo "Error: " . mysqli_error($conn);
            } else {
                echo "Insert successful";
            }
            

            header("location:viewCart.php");
        }
    }

    // Remove product
    if (isset($_POST['remove'])) {
        $remove_query = "DELETE FROM cart_items WHERE user_id = {$_SESSION['user_id']} AND product_name = '$product_name'";
        $remove_result = mysqli_query($conn, $remove_query);

        if ($remove_result === false) {
            throw new Exception("Delete error: " . mysqli_error($conn));
        }

        header("location:viewCart.php");
    }

    // Update product
    if (isset($_POST['update'])) {
        $update_query = "UPDATE cart_items SET product_quantity = $product_quantity WHERE user_id = {$_SESSION['user_id']} AND product_name = '$product_name'";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result === false) {
            throw new Exception("Update error: " . mysqli_error($conn));
        }

        header("location:viewCart.php");
    }
} catch (Exception $e) {
    echo "
    <script>
    alert('Error: " . $e->getMessage() . "');
    window.location.href = 'index.php';
    </script>";
}
?>
