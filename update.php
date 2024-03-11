<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php
    $id = $_GET['ID'];
    include 'config.php';
    $record = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");
    $data = mysqli_fetch_array($record);
    
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-3">

                <form action="update1.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning">Product Update</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" value="<?php echo $data['Name'] ?>" name="Name" class="form-control" placeholder="Enter product name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="text" value="<?php echo $data['Price'] ?>" name="Price" class="form-control" placeholder="Enter product price">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Add Product Image</label>
                        <input type="file" name="Image" class="form-control"><br>
                        <!-- Ajoutez ce champ caché à votre formulaire -->
<input type="hidden" name="old_image" value="<?php echo $data['Image']; ?>">

                        <?php
    if (!empty($data['Image']) && file_exists("image/".$data['Image'])) {
        echo "<img src='image/{$data['Image']}' alt='Product Image'>";
    } else {
        echo '<p>No image available</p>';
    }
    ?>                 
                        </div>

                    

                    <div class="mb-3">
                        <label class="form-label">Select Page Category</label>
                        <select class="form-select" name="Pages">
                            <option value="Home" <?php if ($data['Category'] == 'Home') echo 'selected'; ?>>Home</option>
                            <option value="Deodorant" <?php if ($data['Category'] == 'Deodorant') echo 'selected'; ?>>Deodorant</option>
                            <option value="Parfum" <?php if ($data['Category'] == 'Parfum') echo 'selected'; ?>>Parfum</option>
                            <option value="accessoire" <?php if ($data['Category'] == 'accessoire') echo 'selected'; ?>>Accessoire</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                    <button name="update" class="bg-danger fs-4 fw-bold my-3 form-control text-white">Update</button>

                </form>
            </div>
        </div>
    </div>

  
</body>

</html>
