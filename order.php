<?php
include('includes/connect.php');
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
?>
    <!-- main -->
    <div class="container">
    <button class="btn btn-primary my-3"><a href="insert_order.php" class="text-light">Thêm đơn hàng</a></button>
    </div>
    <table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">id_order</th>
      <th scope="col">id_user</th>
      <th scope="col">Tên user</th>
      <th scope="col">Email</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">SĐT</th>
      <th scope="col">Phương thức thanh toán</th>
      <th scope="col">Chi tiết</th>
      <th scope="col">Tổng giá</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Tình trạng đơn</th>
      <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $select_query="SELECT * FROM `order`";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($result_query)){
      $id_order=$row['id_order'];
      $id_user=$row['id_user'];
      $name=$row['name'];
      $email=$row['email'];
      $address=$row['address'];
      $phone=$row['phone'];
      $method=$row['method'];
      $total_sach=$row['total_sach'];
      $total_gia=$row['total_gia'];
      $order_date=$row['order_date'];
      $status=$row['status'];
      echo " <tr>
        <th scope='row'>$id_order</th>
        <th scope='row'>$id_user</th>
        <td>$name</td>
        <td>$email</td>
        <td>$address</td>
        <td>$phone</td>
        <td>$method</td>
        <td>$total_sach</td>
        <td>$total_gia VNĐ</td>
        <td>$order_date</td>
        <td>$status</td>
        <td>
          <button class='btn btn-primary'><a href='update_order.php?updateid=$id_order' class='text-light'>Sửa</a></button>
          <button class='btn btn-danger'><a href='delete_order.php?deleteid=$id_order' class='text-light'>Xóa</a></button>
        </td>
      </tr>";
    }
    ?>
    </tbody>
    </table>