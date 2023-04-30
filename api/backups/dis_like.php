<?php 

include('../../backend/config.php')  ;

$youtube = new Youtube ; 
$youtube->unlike_video($_POST['vid']);