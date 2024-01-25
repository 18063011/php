<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
include('includes/connect.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `order` WHERE id_order=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('Xóa đơn hàng thành công')</script>";
        header('location:admin.php?order');
    }else{
        die(mysqli_error($con));
    }
}
?>