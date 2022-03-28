<?php
include('connect.php');
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email== ''){
        $msg = "email is required";
        header('Location:../login.php?errmsg='.$msg);
    }
    if($password== ''){
        $msg = "password is required";
        header('Location:../login.php?errmsg='.$msg);
    }
    $encryptedpass = md5($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$encryptedpass'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);
    if($row==1){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['login']=1;
        $_SESSION['user_id']= $data['id'];
        header('Location:../home.php');
    }else{
        header('Location:../login.php?errmsg=email and password doesnot match');
    }
}
?>