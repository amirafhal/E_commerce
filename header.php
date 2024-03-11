<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <?php
  session_start();
  
  $count = 0;
if(isset($_SESSION['cart'])){
$count = count($_SESSION['cart']);
}

?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid font-monospace">
   <a class="navbar-brand"><img  src="logo.png" alt=""  width="150px" height="110px"></a>
  <div class="d-flex">
   <a href="index.php" class="text-warning text-decoration-none pe-2"><i class="fa-solid fa-house-chimney"></i> Home</a>
   <a href="viewCart.php" class="text-warning text-decoration-none pe-2"><i class="fa-solid fa-cart-shopping"></i> Cart (<?php echo $count ?>) | </a> 
  <span class="text-warning pe-2">
  <i class="fa-solid fa-user-shield"></i> Hello, 
  <?php

  if(isset($_SESSION['user'])){
    echo $_SESSION['user'] ;
    echo"
    | <a href='form/logout.php' class='text-warning text-decoration-none pe-2'><i class='fa-solid fa-right-to-bracket'></i> Logout</a>
";
  }
  else{
    echo"
   | <a href='form/login.php' class='text-warning text-decoration-none pe-2'><i class='fa-solid fa-right-to-bracket'></i> Login</a>
";
  }


?>
|
  <a href="../admin/mystore.php" class="text-warning text-decoration-none pe-2"> Admin</a>
  </span>
</nav>
</div>
  </div>


  <div class="bg-danger  font-monospace">
    <ul class="list-unstyled d-flex justify-content-center">
        <li><a href="parfum.php" class="text-decoration-none text-white fw-bold fs-4 px-5">PARFUMS</a></li>
        <li><a href="deoderant.php" class="text-decoration-none text-white fw-bold  fs-4 px-5">DEODORANTS</a></li>
        <li><a href="accessoire.php" class="text-decoration-none text-white fw-bold  fs-4 px-5">ACCESSOIRES</a></li>

    </ul>
  </div>
    
</body>
</html>