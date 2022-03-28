<?php
session_start();
$id = $_SESSION['user_id'];
include('connect.php');
    $goal = $_POST['title'];
    $description = $_POST['description'];
    $date=date('y-m-d');
     if($goal!=''){
        $query = "INSERT INTO goal(title, description, accomplish_date, user_id) VALUE('$goal', '$description', '$accomplish_date', '$id')";
        if(mysqli_query($conn, $query)){
            $img = "successfully inserted";
        }else{
            $msg = "some error occured:".mysqli_error($conn);
        }
        header('Location:../goal.php?msg='.$msg);
    }else{
        $msg = "goal_title is required..";
        header('Location:../goal.php?errmsg='.$msg);
    }

?>