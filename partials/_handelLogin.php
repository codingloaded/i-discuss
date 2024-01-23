<?php
$showError = "false";
$showAlert = false;
 echo "i am _handelLogin.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php'; 
    $username = $_POST['loginusername'];
    // $email = $_POST['email'];
    $password = $_POST['loginpassword'];
    // $cpassword = $_POST['signupcPassword'];

    $existNamesql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
    $result = mysqli_query($conn, $existNamesql);
    $namerows = mysqli_num_rows($result);

    if($namerows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            $showAlert = true;
            session_start();
            $_SESSION['loggidin'] = true;
            $_SESSION['username'] = $username;
            header("Location:/roni/forum/index.php?login=true");
        }else{
            $showError = "password do not match";
        }

    }else{
        $showError = "Username do not exist";
    }
}
?>