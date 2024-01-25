<?php
session_start();
echo "logging you our please wait....";
session_unset();
session_destroy();
header("Location:/roni/forum/index.php");
?>