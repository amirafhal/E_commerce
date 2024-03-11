<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<?php
include 'mystore.php';
$conn = mysqli_connect('localhost','root','','Stage');
$record = mysqli_query($conn,"SELECT * FROM users");
$row_count = mysqli_num_rows($record);

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
             
<table class="table table-secondary table-bordered">
    <thead class="text-center">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Delete</th>
    </thead>

    
    <tbody class="text-center text-danger">
        <?php
        $i = 0;
           
           while($row = mysqli_fetch_array($record)){

             $i=$i+1;
            echo "
            <tr>
                <td>$i</td>
                <td>$row[UserName]</td>
                <td>$row[Email]</td>
                <td>$row[Number]</td>
                <td><a href='delete.php?ID=$row[id]' class = 'btn btn-outline-danger'>Delete</td>
            </tr>";
           }
?>

    </tbody>

</table>
</div>

<div class="col-md-2 pr-5 text-center">
    <h3 class="text-danger">Total</h3>
    <h1 class="bg-danger text-white"><?php  echo $row_count;   ?></h1>
</div>
</div>
</div>

    
</body>
</html>