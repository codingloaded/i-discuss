<?php
session_start();
?>
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
    <?php include 'partials/_nav.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>

    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="partials/1.jpg" class="d-block w-100" alt="..."
                    style="height :65vh; width:100vw; object-fit: cover;  object-position: center center ">
            </div>
            <div class="carousel-item">
                <img src="partials/2.jpg" class="d-block w-100" alt="..." style="height :65vh; width:100vw; object-fit: cover; ;
                object-position: 15% 100% ">
            </div>
            <div class="carousel-item">
                <img src="partials/3.jpg" class="d-block w-100" alt="..." style="height :65vh; width:100vw; object-fit: cover; ;
                  object-position: 15% 100% ">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- main body  -->
    <div class="container my-3">
        <h2 class="text-center">Welcome to i-Discuss - Categoties</h2>
        <div class="row">
            <!-- fetch all the categories  -->
            <?php 
            $sql = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              $name =  $row["category_name"];
              $id =  $row["category_id"];
              $des =  $row["category_description"];
              echo '  <div class="col md-4 my-2">
                          <div class="card" style="width: 18rem;">
                              <img src="partials/coding-'.$id.'.jpg" class="card-img-top" alt="..." style="height :9rem; width:18rem">
                              <div class="card-body">
                                  <h5 class="card-title">'.$name.'</h5>
                                  <p class="card-text">'.substr($des, 0,50).'...</p>
                                  <a href="threadlist.php?catid='.$id.'" class="btn btn-sm btn-primary">See thread</a>
                              </div>
                          </div>
                      </div> ';

            }
          ?>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>