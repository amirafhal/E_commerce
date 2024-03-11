<?php
$conn = mysqli_connect('localhost','root','','Stage');


if(isset($_POST['submit'])){
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Number = $_POST['number'];
    $Password = $_POST['password'];

    $Dup_Email = mysqli_query($conn, "SELECT * FROM `users` WHERE  Email = '$Email'");
    $Dup_username = mysqli_query($conn, "SELECT * FROM `users` WHERE  UserName = '$Name'");
    
    if(mysqli_num_rows($Dup_Email)){
        echo"
        <script>
        alert('this Email is already taken');
        window.location.href= 'register.php';
        </script>";
    }

    if(mysqli_num_rows($Dup_username)){
        echo"
        <script>
        alert('this username is already taken');
        window.location.href= 'register.php';
        </script>";
    }

    else{
        mysqli_query($conn,"INSERT INTO `users`(`UserName`, `Email`, `Number`, `Password`)
                 VALUES ('$Name','$Email','$Number','$Password') ");
            
            echo"
            <script>
            alert('Register successfully');
            window.location.href= 'login.php';
            </script>";

    }

}


?>