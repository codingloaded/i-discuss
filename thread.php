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
    <?php include 'partials/_nav.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
     $tid = $_GET['tid'];
     echo $tid;
     $sql =  $sql = "SELECT * FROM `threads` WHERE `threads_id` = $tid";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $threads_name =  $row["threads_name"];
                $threads_cat_id = $row["threads_cat_id"];
                $threads_desc =  $row["threads_desc"];
            }
    ?>

    <div class="container my-3">
        <div class="alert alert-primary" role="alert">
            <h1><?php echo $threads_name; ?> </h1>
            <h4><?php echo $threads_desc; ?></h4>
            <hr>
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <span>Posted by :- </span><button class="btn btn-primary">Anirban Ghosal</button>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center">Post your answer</h3>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
            <!-- Here 46 $id can not be used as for is in html so request_uri has been used  -->
            <div class="form-group my-3">
                
                <div class="mb-3">
                    <label for="comment_content" class="form-label">Write your answer</label>
                    <textarea class="form-control" id="comment_content" name="comment_content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>


    <div class="container my-3">
        <h3 class="my-3 text-center">Discussion</h3>

       <?php
           $tid = $_GET['tid'];
            $sql = "SELECT * FROM `comments` WHERE `thread_id` = $tid";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $comment_content =  $row["comment_content"];
                $comment_id = $row["comment_id"];
                $user_id =  $row["user_id"];
                $noResult = false;
           
             echo '<div class="question">
             <img src="partials/user.png" alt="">
             <div>
                 <h6> Posted by:- Anirban Ghosal </h6>
                 <p>'.$comment_content.'</p>
             </div>
         </div>';;
            }

            if($noResult){
                echo '<p class ="question center">No question till now, be the first one to ask</P';
            }


        ?>
    </div>
        


    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>