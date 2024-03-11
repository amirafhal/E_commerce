<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $product_name = $_POST['Name'];
    $product_price = $_POST['Price'];
    $product_Category = $_POST['Pages'];

    include 'config.php';

    // Obtenez le nom de l'image existante depuis le champ caché
    $old_image = $_POST['old_image'];

    // Traitement de l'image seulement si un fichier a été téléchargé
    if ($_FILES['Image']['size'] > 0) {
        $image_name = $_FILES['Image']['name'];
        move_uploaded_file($_FILES['Image']['tmp_name'], "image/" . $image_name);
    } else {
        // Si aucune nouvelle image n'est téléchargée, conservez l'image existante
        $image_name = $old_image;
    }

    mysqli_query($conn, "UPDATE `product` SET `Name`='$product_name',`Price`='$product_price',`Image`='$image_name',`Category`='$product_Category' WHERE id = '$id'");

    header("location:index.php");
}
?>
