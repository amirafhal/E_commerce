<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .product:hover {
            transform: scale(1.1);
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Page</title>
    <?php
    include 'header.php';
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <h1 class="text-warning font-monospace text-center my-3">Parfums</h1>

            <?php
          

            include 'config.php';
            $record = mysqli_query($conn, "SELECT * FROM product");

            while ($row = mysqli_fetch_array($record)) {
                $check = $row['Category'];
                if ($check === 'Parfum') {
                    echo "
                    <div class='col-md-6 col-lg-4 m-auto mb-3'>
                    <form action = '' method = 'post' class='product'>
                        <div class='card m-auto' style='width: 18rem;'>
                            <img src='/stage/admin/product/image/$row[Image]' class='card-img-top product-image' data-details='" . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . "'>
                            <div class='card-body text-center'>
                                <h5 class='card-title text-danger fs-4 fw-bold'>$row[Name]</h5>
                                <p class='card-text text-danger fs-4 fw-bold'>$row[Price] DT</p>
                                <input type='hidden' name='Pname' value='$row[Name]'>
                                <input type='hidden' name='Pprice' value='$row[Price]'>
                                <input type='hidden' name='Description' value='$row[Description]'>
                                <input type='number' name='Pquantite' value='1' min='1' max='20' placeholder='Quantity'>
                                <br><br>
                                <input type='button' class='btn btn-warning text-white w-100 product-details-btn' value='View Details'>
                               <br><br>
                           
                                </div>
                        </div>
                        </form>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="productDetails">
                <!-- Product details will be displayed here -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.product-details-btn').click(function () {
            var details = JSON.parse($(this).closest('.card').find('.product-image').attr('data-details'));
            var modalBody = $('#productDetails');

            // Construct the HTML for the product details
            var html = "<h5>Name: " + details['Name'] + "</h5>";
            html += "<p>Price: " + details['Price'] + " DT</p>";
            html += details['Description'];

            // Set the HTML content and show the modal
            modalBody.html(html);
            $('#productModal').modal('show');
        });
    });
</script>

<?php
include 'footer.php';
?>

</body>
</html>
