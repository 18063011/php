<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
include('includes/connect.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `sach` WHERE id_sach=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('Xóa thông tin thành công')</script>";
        header('location:admin.php?product');
    }else{
        die(mysqli_error($con));
    }
}
?>