<?php
include('connect.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM goal WHERE id = '$id'";
    if(mysqli_query($conn, $query)){
        header('Location:../goal.php?msg=successfully delete');
    }else{
        header('Location:../goal.php?arrmsg='.mysqli_error($conn));
    }
    
}
header('Location:../goal.php');
?>