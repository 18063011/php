<?php
include('includes/connect.php');
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
?>
    <!-- main -->
    <div class="container">
    <button class="btn btn-primary my-3"><a href="insert_product.php" class="text-light">Thêm sản phẩm</a></button>
    </div>
    <table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tên sách</th>
      <th scope="col">Tác giả</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Giá</th>
      <th scope="col">Hình</th>
      <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $select_query="SELECT * FROM `sach`";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($result_query)){
      $id_sach=$row['id_sach'];
      $tensach=$row['tensach'];
      $tacgia=$row['tacgia'];
      $id_danhmuc=$row['id_danhmuc'];
      $select_query1="SELECT * FROM `danhmuc` WHERE id_danhmuc='$id_danhmuc'";
      $result_query1=mysqli_query($con,$select_query1);
      $row1=mysqli_fetch_array($result_query1);
      $tendanhmuc=$row1['tendanhmuc'];
      $gia=$row['gia'];
      $hinh=$row['hinh'];
      echo " <tr>
        <th scope='row'>$id_sach</th>
        <td>$tensach</td>
        <td>$tacgia</td>
        <td>$tendanhmuc</td>
        <td>$gia VNĐ</td>
        <td><img src='img/sanpham/$hinh' alt='$hinh' width='110' height '110'></td>
        <td>
          <button class='btn btn-primary'><a href='update_product.php?updateid=$id_sach' class='text-light'>Sửa</a></button>
          <button class='btn btn-danger'><a href='delete_product.php?deleteid=$id_sach' class='text-light'>Xóa</a></button>
        </td>
      </tr>";
    }
    ?>
    </tbody>
    </table>