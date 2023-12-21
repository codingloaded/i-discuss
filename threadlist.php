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
     $id = $_GET['catid'];
     $sql = "SELECT * FROM `category` WHERE category_id = $id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $catname =  $row["category_name"];
                $catid =  $row["category_id"];
                $catdes =  $row["category_description"];
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

    <div class="container my-3">
        <h3 class="my-3 text-center">Browse Question</h3>

        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE `threads_cat_id` = $id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $threads_name =  $row["threads_name"];
                $threads_id = $row["threads_id"];
                $threads_desc =  $row["threads_desc"];
           
    

               echo '<div class="question">
                    <img src="partials/user.png" alt="">
                    <div>
                        <h6><a class = "text-dark" href = "thread.php?tid='.$threads_id.'">'.$threads_name.'</a></h6>
                        <p>'.$threads_desc.'</p>
                    </div>
                </div>';
            }
        ?>
        <!-- will delete later  -->
        <div class="question">
            <img src="partials/user.png" alt="">
            <div>
                <h6>Media Heading</h6>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit, aliquam.</p>
            </div>
        </div>
        


    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>