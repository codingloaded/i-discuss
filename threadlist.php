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

    <div class="container">
        <h3 class="text-center">Ask a question</h3>
        <form action=" ">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>

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
                $noResult = false;
           
             echo '<div class="question">
                    <img src="partials/user.png" alt="">
                    <div>
                        <h6><a class = "text-primary" href = "thread.php?tid='.$threads_id.'">'.$threads_name.'</a></h6>
                        <p>'.$threads_desc.'</p>
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