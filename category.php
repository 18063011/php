<?php
include('includes/connect.php');
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
?>
     <!-- main -->
     <div class="container">
    <button class="btn btn-primary my-3"><a href="insert_category.php" class="text-light">Thêm danh mục</a></button>
    </div>
    <table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $select_query="SELECT * FROM `danhmuc`";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($result_query)){
      $id_danhmuc=$row['id_danhmuc'];
      $danhmuc=$row['tendanhmuc'];
      echo " <tr>
        <th scope='row'>$id_danhmuc</th>
        <td>$danhmuc</td>
        <td>
          <button class='btn btn-primary'><a href='update_category.php?updateid=$id_danhmuc' class='text-light'>Sửa</a></button>
          <button class='btn btn-danger'><a href='delete_category.php?deleteid=$id_danhmuc' class='text-light'>Xóa</a></button>
        </td>
      </tr>";
    }
    ?>
    </tbody>
    </table>