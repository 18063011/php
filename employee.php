<?php
include('includes/connect.php');
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
?>
    <!-- main -->
    <div class="container">
    <button class="btn btn-primary my-3"><a href="insert_user.php" class="text-light">Thêm user</a></button>
    </div>
    <table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tên user</th>
      <th scope="col">Email</th>
      <th scope="col">Phân quyền</th>
      <th scope="col">Hình</th>
      <th scope="col">IP lúc tạo account</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Điện thoại</th>
      <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $select_query="SELECT * FROM `user` WHERE user_type='admin'";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($result_query)){
      $id_user=$row['id_user'];
      $name=$row['name'];
      $email=$row['email'];
      $user_type=$row['user_type'];
      $image=$row['image'];
      $ip_user=$row['ip_user'];
      $address=$row['address'];
      $phone=$row['phone'];
      echo " <tr>
        <th scope='row'>$id_user</th>
        <td>$name</td>
        <td>$email</td>
        <td>$user_type</td>
        <td><img src='img/user/$image' alt='$image' width='110' height '110'></td>
        <td>$ip_user</td>
        <td>$address</td>
        <td>$phone</td>
        <td>
          <button class='btn btn-primary'><a href='update_user.php?updateid=$id_user' class='text-light'>Sửa</a></button>
          <button class='btn btn-danger'><a href='delete_user.php?deleteid=$id_user' class='text-light'>Xóa</a></button>
        </td>
      </tr>";
    }
    ?>
    </tbody>
    </table>