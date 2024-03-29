<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i-Secure :Forum for coding </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/threads.css">
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_nav.php'; ?>
    <?php
     $id = $_GET['catid'];
     $sql = "SELECT * FROM `category` WHERE category_id = $id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $catname =  $row["category_name"];
                
                $catdes =  $row["category_description"];
            }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "POST"){
        $threads_name = $_POST["threads_name"];
        $threads_desc = $_POST["threads_desc"];
        //changed threads_name for xss
        $threads_name = str_replace("<", "&lt;","$threads_name");
        $threads_name = str_replace(">","&gt;", "$threads_name");
        //changed treads_desc for xss
        $threads_desc = str_replace("<", "&lt;","$threads_desc");
        $threads_desc = str_replace(">","&gt;", "$threads_desc");
        
        $threads_user_id = $_POST["user_id"];
        //running querry
        $sql = "INSERT INTO `threads` (`threads_name`, `threads_desc`, `threads_cat_id`, `threads_user_id`, `time`) VALUES ('$threads_name', '$threads_desc', '$id', '$threads_user_id ', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Your querry is successfully registerd</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>


    <div class="container my-3">
        <div class="alert alert-success" role="alert">
            <h1>Welcome to i discuss <?php echo $catname; ?> forum</h1>
            <p><?php echo $catdes; ?></p>
            <hr>
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <button class="btn btn-primary">Learn More</button>
        </div>
    </div>

<!--  Question form     -->
<?php
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    $userid= $_SESSION["user_id"];
    echo'   <div class="container">
    <h3 class="text-center">Ask a question</h3>
    <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
        <!-- Here 46 $id can not be used as for is in html so request_uri has been used  -->
        <div class="form-group my-3">
            <div class="mb-3">
                <label for="threads_name" class="form-label">Question</label>
                <input type="text" class="form-control" id="threads_name" name="threads_name"
                    placeholder="Write your question">
            </div>
            <div class="mb-3">
                <label for="threads_desc" class="form-label">Elaborate your question</label>
                <textarea class="form-control" id="threads_desc" name="threads_desc" rows="3"></textarea>
            </div>
            <input type="hidden" name="user_id" value="'.$userid.'" readonly>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>';   
}
else{
 echo' <div class="container d-flex flex-column align-items-center justify-content-center">
 <h3 class="text-center">Ask a question</h3>
 <div>Please <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModalLabel">Login</button> to ask any question</div>
 <div>If you do not have a account then please <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button> to create an account</div>
 </div>';
}

?>
    <!-- Asked question  -->
    <div class="container my-3">
        <h3 class="my-3 text-center">Browse Question</h3>

        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE `threads_cat_id` = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $threads_name =  $row["threads_name"];
                $threads_id = $row["threads_id"];
                $threads_desc =  $row["threads_desc"];
                $threads_time =  $row["time"];
                $threads_user_id = $row["threads_user_id"];
                $noResult = false;
                $sql2 ="SELECT * FROM `users` WHERE `user_id` = $threads_user_id";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $username = $row2['user_name'];
                
           
             echo '<div class="question">
                    <img src="partials/user.png" alt="">
                    <div>
                        
                        <h6><a class = "text-primary" href = "thread.php?tid='.$threads_id.'">'.$threads_name.'</a></h6>
                        <p>'.$threads_desc.'</p>
                        <p class = "mb-0"> :-<i> Asked by <b>'.$username.'</b> at <b> '.$threads_time.'</b></i></p>
                    </div>
                </div>';
            }

            if($noResult){
                echo '<p class ="question center">No question till now, be the first one to ask</P';
            }


        ?>





        <?php include 'partials/_footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

</body>

</html>
<!-- in line 46 $id can not be used as for is in html so request_uri has been used  -->