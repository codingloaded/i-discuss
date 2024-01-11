<?php
$showError = "false";
$showAlert = false;
//  echo "i am _handelsignup.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php'; 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];
    

    //checking:-
    $existNamesql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
    $result = mysqli_query($conn, $existNamesql);
    $namerows = mysqli_num_rows($result);
    if($namerows>0){
        $showError = "This name already exist!!!";
       
    }else{
        
        $existNamesql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $existNamesql);
        $emailrows = mysqli_num_rows($result);
        if($emailrows>0){
            $showError = "This email already used!!!";
           
        }else{
            
            if($password == $cpassword){         
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` ( `user_name`, `email`, `password`, `date`) VALUES ('$username','$email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("Location:/roni/forum/index.php?signup=true");
                    // header("Location:/roni/forum/myaccount.php?name=${username}");
                }
            }else{
                $showError = "Password do not matched!!!";
                

            }
            
        }
    }
    
}
?>