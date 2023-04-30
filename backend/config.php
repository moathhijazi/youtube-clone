<?php 

class Youtube

{
    public function connect() {
        $env        =       parse_ini_file('../.env') ; 
        $host       =       $env['DB_HOST'];
        $user       =       $env['DB_USER'];
        $pass       =       $env['DB_PASS'];
        $db         =       $env['DB_NAME'];



        $conn = mysqli_connect($host , $user , $pass , $db) ;

        if($conn) {
            return $conn ;
        }else{
            header('location:error.php');
        }
        
        

    }
   
    public function register($username , $email , $password) {
        $conn = $this->connect() ; 
        $check_email = mysqli_query($conn  , "SELECT * FROM `users` WHERE email = '$email' ");
        if(mysqli_num_rows($check_email) > 0 ){
            echo 'This email is already exist' ;
        }else{
            $password_hash = md5($password);

            $check_username = mysqli_query($conn  , "SELECT * FROM `users` WHERE username = '$username' ");
            if(mysqli_num_rows($check_username) > 0) {
                echo 'This username is already exist';
            }else{
                $new_user = mysqli_query($conn , "INSERT INTO `users` (username , email , password) VALUES ('$username','$email','$password_hash') ");
                echo '<script>location.href = "../" </script>' ;
            }

        }

    }

    public function login($username , $password) {
        $conn = $this->connect() ; 
        $password_hash = md5($password) ; 
        $check_auth = mysqli_query($conn , "SELECT * FROM `users` WHERE username = '$username' AND password = '$password_hash' ");
        if(mysqli_num_rows($check_auth) > 0 ){
            $row = mysqli_fetch_assoc($check_auth) ; 
            session_start() ;
            $_SESSION['user-id']        =   $row['id'];
            $_SESSION['user-email']     =   $row['email'];
            $_SESSION['user-name']      =   $row['username'];
            echo '<script>location.href = "../" </script>';
        }else{
            echo 'Incorrect username or password!' ;
        }
    }

    public function videos() {
        $conn = $this->connect() ; 
        $select = mysqli_query($conn , "SELECT * FROM `videos` ");
        if(mysqli_num_rows($select) > 0 ){
            return $select ; 
        }else{
            return false; 
        }
    }

    public function comments($query , $data = null , $vid = null) {
        $conn = $this->connect() ; 

        if($query === 'get'){
            $select =  mysqli_query($conn , "SELECT * FROM `comments` WHERE vid = '$vid' ");
            if(mysqli_num_rows($select) > 0 ){
                return $select ; 
            }else{
                return false ; 
            }
        }else if ($query === 'post') {
            session_start() ;
            $user   = $_SESSION['user-name'];
            $insert = mysqli_query($conn , "INSERT INTO `comments` (username , comment , vid) VALUES ('$user','$data' , '$vid') ");
            return true ; 
        }else{
            echo 'incorrect query for comments [GET , POST] only support' ;
        }
    }

    public function like_video($vid) {
        $conn = $this->connect() ; 
        session_start() ;
        $user   = $_SESSION['user-name'];
        $check = mysqli_query($conn , "SELECT * FROM `likes` WHERE vid = '$vid' AND username = '$user' ");
        if(mysqli_num_rows($check) > 0 ){
            // already added like 
            $remove_like = mysqli_query($conn , "DELETE FROM `likes` WHERE vid = '$vid' AND username = '$user' ") ; 
        }else{
            $remove_dis_like = mysqli_query($conn , "DELETE FROM `dis_like` WHERE vid = '$vid' AND username = '$user' ") ;
            $add_like = mysqli_query($conn , "INSERT INTO `likes` (vid , username) VALUES ('$vid','$user') ");
        }
    }

    public function unlike_video($vid) {
        $conn = $this->connect() ; 
        session_start() ;
        $user   = $_SESSION['user-name'];
        $check = mysqli_query($conn , "SELECT * FROM `dis_like` WHERE vid = '$vid' AND username = '$user' ");
        if(mysqli_num_rows($check) > 0 ){
            // already added dislike 
            $remove_dis_like = mysqli_query($conn , "DELETE FROM `dis_like` WHERE vid = '$vid' AND username = '$user' ") ; 
        }else{
            $remove_like = mysqli_query($conn , "DELETE FROM `likes` WHERE vid = '$vid' AND username = '$user' ") ; 
            $add_dis_like = mysqli_query($conn , "INSERT INTO `dis_like` (vid , username) VALUES ('$vid','$user') ");
        }
    }

    public function save_video($vid) {
        $conn = $this->connect() ; 
        session_start() ;
        $user   = $_SESSION['user-name'];
        $check = mysqli_query($conn , "SELECT * FROM `watch_later` WHERE vid = '$vid' AND username = '$user' ");
        if(mysqli_num_rows($check) > 0 ){
            // already saved video
            $remove_save = mysqli_query($conn , "DELETE FROM `watch_later` WHERE vid = '$vid' AND username = '$user' ") ; 
        }else{
            $add_save = mysqli_query($conn , "INSERT INTO `watch_later` (vid , username) VALUES ('$vid','$user') ");
        }
    }

    public function sub($channel_id) {
        $conn = $this->connect() ; 
        session_start() ;
        $user   = $_SESSION['user-name'];
        $check = mysqli_query($conn , "SELECT * FROM `sub` WHERE channel_id = '$channel_id' AND username = '$user' ");
        if(mysqli_num_rows($check) > 0 ){
            // already subed
            $remove_sub = mysqli_query($conn , "DELETE FROM `sub` WHERE channel_id = '$channel_id' AND username = '$user' ") ; 
        }else{
            $add_save = mysqli_query($conn , "INSERT INTO `sub` (channel_id , username) VALUES ('$channel_id','$user') ");
        }

    }

    public function sub_count($id) {
        $conn = $this->connect() ; 
        $check = mysqli_query($conn , "SELECT * FROM `sub` WHERE channel_id = '$id' ");
        return mysqli_num_rows($check) ;
    }

    public function comments_count($vid) {
        $conn = $this->connect() ; 
        $check = mysqli_query($conn , "SELECT * FROM `comments` WHERE vid = '$vid' ");
        return mysqli_num_rows($check) ;
    }

    public function likes_count($vid) {
        $conn = $this->connect() ; 
        $check = mysqli_query($conn , "SELECT * FROM `like` WHERE vid = '$vid' ");
        return mysqli_num_rows($check) ;
    }

}

