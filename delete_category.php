<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
include('includes/connect.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `danhmuc` WHERE id_danhmuc=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('Xóa danh mục thành công')</script>";
        header('location:admin.php?category');
    }else{
        die(mysqli_error($con));
    }
}
?>