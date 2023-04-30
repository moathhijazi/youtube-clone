<?php 

include('../../backend/config.php')  ;

$youtube = new Youtube ; 
$youtube->like_video($_POST['vid']);