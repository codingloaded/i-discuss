<?php
session_start();
if(!isset($_SESSION['loggedin'])|| ($_SESSION['loggedin']!=true)){
  header('location: /roni/forum/index.php');
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i-Secure :My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/threads.css">
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_nav.php'; ?>
    
    <?php
    $user_name = $_SESSION['username'];
    $sql = "SELECT * FROM `users` WHERE `user_name` = '$user_name'";
    $result = mysqli_query($conn, $sql);
   
    while($row = mysqli_fetch_assoc($result)){
        $user_email =  $row["email"];
        $user_id = $row["user_id"];
       
    }
   ?>
    <h1>hi this <?php echo $user_name?>'s account</h1>
    <h2>Email id is <?php echo $user_email?>'s account</h2>
    <h2>id is <?php echo $user_id?>'s account</h2>

<?php include 'partials/_footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>
</html>