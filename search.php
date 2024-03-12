<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i-Secure :Forum for coding </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_nav.php'; ?>


    <!-- search results starts here  -->
    <div class="container my-3">
        <?php
        $noresults = true;
        $query = $_GET["search"];
         $sql =  $sql = "SELECT * FROM `threads` WHERE MATCH(`threads_name`,`threads_desc`) against ('$query')";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
            $noresults = false;
             $threads_name =  $row["threads_name"];
             $threads_desc =  $row["threads_desc"];
             $threads_id = $row["threads_id"];
            //  $threads_cat_id = $row["threads_cat_id"];
            //  $threads_user_id =  $row["threads_user_id"];
            //  $sql2 ="SELECT * FROM `users` WHERE `user_id` = $threads_user_id";
            //  $result2 = mysqli_query($conn, $sql2);
            //  $row2 = mysqli_fetch_assoc($result2);
            //  $tusername = $row2['user_name'];
            echo '<h3 class="my-3 text-center">Search results for:- "<em>'.$query.'</em>"</h3>
            <div class="results">
            <h5 class = ""><a class = "text-primary" href = "thread.php?tid='.$threads_id.'">'.$threads_name.'</a></h5>
            <p>'. $threads_desc .'</p>
            </div>';
        }
        if($noresults){
            echo'<h3 class="my-3 text-center">Search results for:- "<em>'.$query.'</em>"</h3>
            
                    <div class="container my-3">
                        <div class="alert alert-success" role="alert">
                            <h6> No results found</h6>
                            <p>Make sure you spell the word correctly</P>
                        </div>
                    </div>';
    }
    ?>


    </div>
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>