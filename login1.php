<?php
$conn = mysqli_connect('localhost','root','','Stage');

$Name = $_POST['name'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM `users` WHERE (UserName = '$Name' OR Email = '$Name') AND Password = '$password' ");

session_start();
if(mysqli_num_rows($result)){

    $_SESSION['user'] = $Name;

    echo"
    <script>
    alert('Successfully Login');
    window.location.href= '../index.php';
    </script>";

}

else {
    echo"
    <script>
    alert('Incorrect Email/UserName/Password');
    window.location.href= 'login.php';
    </script>";

}

?>