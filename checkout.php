<?php
include('includes/connect.php');
include('includes/function.php');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thanh toán</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="fw-bold text-uppercase text-dark"><img src="img/Logo.png" alt="logo" style="width:100px"></span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="index.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="shop.php">CỬA HÀNG</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="introduce.php">GIỚI THIỆU</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">               
                <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>GIỎ HÀNG<small class="text-gray fw-normal">(<?php cart_number() ?>)</small></a></li>
                <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small class="text-gray fw-normal"> (0)</small></a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#!"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li> -->
              </ul>
            </div>
          </nav>
        </div>
      <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
          <ul class="navbar-nav me-auto">
            <?php
            if(isset($_SESSION['admin_id'])){
              echo "<script>alert('Bạn là admin. Vui lòng đăng nhập bằng tài khoản user để đặt hàng')</script>";
              echo "<script>window.location.href ='admin.php'</script>";
            }elseif(isset($_SESSION['user_id'])){
              $id_user=$_SESSION['user_id'];
              $select_query="SELECT * FROM `user` WHERE id_user = '$id_user'";
              $result_query=mysqli_query($con,$select_query);
              $number=mysqli_num_rows($result_query);
              if($number>0){
                while($row_user=mysqli_fetch_array($result_query)){
                  $id_user=$row_user['id_user'];
                  $name=$row_user['name'];
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='profile.php?id_user=$id_user'>Welcome $name</a>
                  </li>
                  <li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Logout</a>
                  </li>";
                }
              }
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link'>Welcome Guest</a>
              </li>
              <li class='nav-item'>
              <a class='nav-link' href='login.php'>Login</a>
              </li>";
            }
            ?>
          </ul>
        </nav>
        <form class="d-flex" action="search_product.php" method="get">
          <input type="search" name="search_data" placeholder="Tìm kiếm" class="form-control me-2" aria-label="Tìm kiếm">
          <input type="submit" name="search_data_product" value="Tìm kiếm" class="btn btn-outline-light">
        </form>
        </div>
      </header>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="cart.php">Giỏ hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Chi tiết thanh toán</h2>
          <div class="row">
            <div class="col-lg-8">
              <form action="" method="post">
          <?php
          if(!isset($_SESSION['user_id'])){
          ?>
                <div class="row gy-3">
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="firstName">Họ và Tên</label>
                    <input class="form-control form-control-lg" required name="name" type="text" id="firstName" placeholder="Nhập Tên">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="email">Địa chỉ email</label>
                    <input class="form-control form-control-lg" required name="email" type="email" id="email" placeholder="nguyenvana@example.com">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="phone">Số điện thoại</label>
                    <input class="form-control form-control-lg" required name="phone" type="tel" pattern="[0-9]{10}" id="phone" placeholder="Nhập số điện thoại">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="form-label text-sm text-uppercase" for="country">Hình thức thanh toán</label>
                    <select id="country" required name="method" data-customclass="form-control form-control-lg rounded-0">
                      <option value="" disabled selected>Chọn hình thức thanh toán</option>
                      <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                      <option value="Thẻ ngân hàng">Thẻ ngân hàng</option>
                      <option value="Momo">Momo</option>
                    </select>
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="address">Địa chỉ</label>
                    <input class="form-control form-control-lg" required name="address" type="text" id="address" placeholder="Nhập địa chỉ">
                  </div>
            <?php
          }else{
            if(isset($_SESSION['user_id'])){
              $select_query="SELECT * FROM `user` WHERE id_user = '$id_user'";
              $result_query=mysqli_query($con,$select_query);
              $number=mysqli_num_rows($result_query);
              if($number>0){
                while($row_user=mysqli_fetch_array($result_query)){
                  $name=$row_user['name'];
                  $email=$row_user['email'];
                  $phone=$row_user['phone'];
                  $address=$row_user['address'];
            ?>
                <div class="row gy-3">
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="firstName">Họ và Tên</label>
                    <input class="form-control form-control-lg" required name="name" type="text" id="firstName" value="<?php echo $name; ?>" placeholder="Nhập Tên">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="email">Địa chỉ email</label>
                    <input class="form-control form-control-lg" required name="email" type="email" id="email" value="<?php echo $email; ?>" placeholder="nguyenvana@example.com">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="phone">Số điện thoại</label>
                    <input class="form-control form-control-lg" required name="phone" pattern="[0-9]{10}" type="tel" id="phone" value="<?php echo $phone; ?>" placeholder="Nhập số điện thoại">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="form-label text-sm text-uppercase" for="country">Hình thức thanh toán</label>
                    <select id="country" required name="method" data-customclass="form-control form-control-lg rounded-0">
                      <option value="" disabled selected>Chọn hình thức thanh toán</option>
                      <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                      <option value="Thẻ ngân hàng">Thẻ ngân hàng</option>
                      <option value="Momo">Momo</option>
                    </select>
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="address">Địa chỉ</label>
                    <input class="form-control form-control-lg" required name="address" type="text" id="address"value="<?php echo $address; ?>" placeholder="Nhập địa chỉ">
                  </div>
            <?php
                }
              }
            }
          }
            ?>
                  <div class="col-lg-12 form-group">
                    <button class="btn btn-dark" name="order" type="submit">Đặt hàng</button>
                  </div>
                </div>
              </form>
            </div>
            <?php
            if(isset($_POST['order'])){
              $name_order=$_POST['name'];
              $name_order=filter_var($name_order,FILTER_SANITIZE_STRING);
              $email_order=$_POST['email'];
              $email_order=filter_var($email_order,FILTER_SANITIZE_STRING);
              $phone_order=$_POST['phone'];
              $phone_order=filter_var($phone_order,FILTER_SANITIZE_STRING);
              $address_order=$_POST['address'];
              $address_order=filter_var($address_order,FILTER_SANITIZE_STRING);
              $method=$_POST['method'];
              $ip=getIPAddress();
              if(isset($_SESSION['user_id'])){
                $id_user=$_SESSION['user_id'];
              }else{
                $id_user=$ip;
              }
              $cart_query="SELECT * FROM `cart` WHERE id_user='$id_user'";
              $result=mysqli_query($con,$cart_query);
              $number_cart=mysqli_num_rows($result);
              if($number_cart>0){
                while($row=mysqli_fetch_array($result)){
                  $soluong=$row['soluong'];
                  $tensach=$row['tensach'];
                  $table_gia=$row['gia'];
                  $cart_item[]=$tensach.' ('.$table_gia.' x '.$soluong.') - ';
                  $total_sach=implode($cart_item);
                  $total+=($table_gia*$soluong);
                }
                if($name_order!=''&&$email_order!=''&&$phone_order!=''&&$address_order!=''&&$method!=''){
                  $insert_order="INSERT INTO `order` (id_user,name,email,address,phone,method,total_sach,total_gia)
                  VALUES ('$id_user','$name_order','$email_order','$address_order','$phone_order','$method','$total_sach','$total')";
                  $result_order=mysqli_query($con,$insert_order);
                  $delete_cart="DELETE FROM `cart` WHERE id_user='$id_user'";
                  $result_delete=mysqli_query($con,$delete_cart);
                  echo "<script>alert('Đặt hàng thành công')</script>";
                  echo "<script>window.location.href='index.php'</script>";
                }else{
                  echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                }
              }else{
                echo "<script>alert('Bạn không có hàng trong giỏ')</script>";
              }
            }
            ?>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Đơn hàng của bạn</h5>
                  <ul class="list-unstyled mb-0">
          <!-- Checkout -->
          <?php
          global $con;
          $ip=getIPAddress();
          if(isset($_SESSION['user_id'])){
            $id_user=$_SESSION['user_id'];
          }else{
            $id_user=$ip;
          }
          $total=0;
          $cart_query="SELECT * FROM `cart` WHERE id_user='$id_user'";
          $result=mysqli_query($con,$cart_query);
          $number_cart=mysqli_num_rows($result);
          if($number_cart>0){
            while($row=mysqli_fetch_array($result)){
              $id_cart=$row['id_cart'];
              $id_sach=$row['id_sach'];
              $soluong=$row['soluong'];
              $tensach=$row['tensach'];
              $table_gia=$row['gia'];
              $hinh=$row['hinh'];
              $cart_item[]=$tensach.' ('.$table_gia.' x '.$soluong.')';
              $total_sach=implode($cart_item);
              $total+=($table_gia*$soluong);
          ?>
                    <li class="d-flex align-items-center justify-content-between"><strong class="small fw-bold"><?php echo $tensach.' x '.$soluong;?></strong><span class="text-muted small"><?php echo $table_gia*$soluong?> VNĐ</span></li>
                    <li class="border-bottom my-2"></li>
        <?php
            }
          }else{
            echo "<h2>Không có hàng trong giỏ</h2>";
          }
        ?>
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small fw-bold">Tổng tiền</strong><span><?php echo $total; ?> VNĐ</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>        
      </div>
      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                <li><a class="footer-link" href="#!">Online Stores</a></li>
                <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">What We Do</a></li>
                <li><a class="footer-link" href="#!">Available Services</a></li>
                <li><a class="footer-link" href="#!">Latest Posts</a></li>
                <li><a class="footer-link" href="#!">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Twitter</a></li>
                <li><a class="footer-link" href="#!">Instagram</a></li>
                <li><a class="footer-link" href="#!">Tumblr</a></li>
                <li><a class="footer-link" href="#!">Pinterest</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-md-6 text-center text-md-start">
                <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
              </div>
              <div class="col-md-6 text-center text-md-end">
                <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
                <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- JavaScript files-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>