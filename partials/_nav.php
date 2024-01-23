<?php
session_start();


echo '
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">i-Discuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Topics
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="mx-2 d-flex align-items-center justify-content-between ">';
      if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        echo '<p class = "text-white my-0 mx-1 ">  Welcome '.$_SESSION['username'].'</p>
        <button type="button" class="btn btn-primary mx-1">Primary</button>';

      }else{
        echo'<button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#loginModalLabel">Login</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
      }
      
     echo' </div>
    </div>
  </div>
</nav>';

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';

if(isset($_GET['signup']) && $_GET['signup']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Hello!</strong> You are registered, Now you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if(isset($_GET['login']) && $_GET['login']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Hello!</strong> You are loggedin now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}



?>