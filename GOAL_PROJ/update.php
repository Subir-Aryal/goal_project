<?php
if(!isset($_GET['id'])){
    die("you can not update");
}
$cid = $_GET['id'];
session_start();
if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
    header('Location:login.php');
}
$id = $_SESSION['user_id'];
include('db/connect.php');
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$goalQuery = "SELECT * FROM goal WHERE id='$cid'";
$goalResult = mysqli_query($conn, $goalQuery);
if(mysqli_num_rows($goalResult)==0){
    die("No record found with this id");
}else{
    $row = mysqli_fetch_assoc($goalResult);
}
?>

<html>
  <head>
      <title>update-goal</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
<body style="background:#808080">
    <h1 class="row justify-content-center" style="color:#00BFFF"><-- UPLOADS --></h1>
 
<div class="container">
  <div class="row">
    <?php include('include/left-nav.php');?>
   <div class="col-8">
        <form  style="margin-top:50px; background:#A9A9A9"method="POST" action="db/insert.php">
            <input type="hidden" name="id" value="<?php echo $cid;?>">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Descriptions</span>
                <input type="text" name="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Accomlish_date</span>
                <input type="date" name="testdate" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <br/>
            <button type="submit" style="margin-left:20px;" class="btn btn-success">Save</button>
        </form>
      <?php include('include/message.php'); ?>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/18e7e11ee0.js" crossorigin="anonymous"></script>
<script src="js/bootbox.min.js"></script>

</body>
</html>