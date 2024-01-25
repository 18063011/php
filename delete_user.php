<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
include('includes/connect.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `user` WHERE id_user='$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('Xóa user thành công')</script>";
        header('location:admin.php?user');
    }else{
        die(mysqli_error($con));
    }
}
?>