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
    <title>VIVOBOOK</title>
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
    <style>
      .btnn{
   background-color: var(--blue);
}
  .containerr{
   min-height: 50vh;
   background-color: var(--light-bg);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
}
.containerr .profile{
   padding:20px;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   text-align: center;
   width: 400px;
   border-radius: 5px;
}

.containerr .profile img{
   height: 150px;
   width: 150px;
   border-radius: 50%;
   object-fit: cover;
   margin-bottom: 5px;
}

.containerr .profile h3{
   margin:5px 0;
   font-size: 20px;
   color:var(--black);
}

.containerr .profile p{
   margin-top: 20px;
   color:var(--black);
   font-size: 20px;
}

.containerr .profile p a{
   color:var(--red);
}

.containerr .profile p a:hover{
   text-decoration: underline;
}

    </style>
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
              header('location:admin.php');
            }elseif(isset($_SESSION['user_id'])){
              $id_user=$_SESSION['user_id'];
              $select_query="SELECT * FROM `user` WHERE id_user = '$id_user'";
              $result_query=mysqli_query($con,$select_query);
              $number=mysqli_num_rows($result_query);
              if($number>0){
                while($row_user=mysqli_fetch_array($result_query)){
                  $id_user=$row_user['id_user'];
                  $name=$row_user['name'];
                  $hinh=$row_user['image'];
                  $email=$row_user['email'];
                  $pass=$row_user['password'];
                  $cpass=$pass;
                  $address=$row_user['address'];
                  $phone=$row_user['phone'];
                  $user_type=$row_user['user_type'];
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
      <div class="containerr">

   <div class="profile">
      <?php
      if($hinh == ''){
          echo "<img src='img/user/avatar-trang.jpg'>";
       }else{
          echo "<img src='img/user/$hinh'>";
       }
      ?>
      <h3><?php echo $name; ?></h3>
      <?php
      echo "<a class='nav-link' href='profile_order.php?id_user=$id_user'>Xem đơn hàng</a>"
      ?>
      <?php
      if(isset($_POST['submit'])&&$_POST['submit']){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $phone=$_POST['phone'];
    // Image
    if (!empty($_FILES['image']['name'])) {
    $image=$_FILES['image']['name'];
    $hinh_tmp_name=$_FILES['image']['tmp_name'];
    $hinh_error=$_FILES['image']['error'];
    move_uploaded_file($hinh_tmp_name,"img/user/$image");
    $update_product="UPDATE `user` SET name='$name',email='$email',phone='$phone',address='$address',image='$image',user_type='$user_type'
    WHERE id_user='$id_user'";
    }else{
      // Insert query
    $update_product="UPDATE `user` SET name='$name',email='$email',phone='$phone',address='$address',user_type='$user_type'
    WHERE id_user='$id_user'";
    }
    $result_product=mysqli_query($con,$update_product);
    if($result_product){
        echo "<script>alert('Sửa thông tin thành công')</script>";
        echo "<script>window.location.href ='profile.php?id_user=$id_user'</script>";
    }else{
        die(mysqli_error($con));
    }
}
?>
   </div>
</div>
<h3 style="text-align: center;">Thông tin cá nhân</h3>
<form method="post" enctype="multipart/form-data">
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="name" class="form-label">Tên user</label>
                <input type="text" class="form-control" placeholder="Nhập tên user" 
                name="name" required="required" autocomplete="off"
                value="<?php echo $name; ?>">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Nhập email user" 
                name="email" required="required" autocomplete="off"
                value="<?php echo $email; ?>">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="image" class="form-label">Ảnh đại diện</label>
                <input type="file" class="form-control" id="image" name="image"
                accept="image/*">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="pass" class="form-label">Mật khẩu</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Mật khẩu" required autofocus=""
                value="<?php echo $pass; ?>">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="cpass" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Nhập lại mật khẩu" required autofocus=""
                value="<?php echo $cpass; ?>">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ user" 
                name="address" required="required" autocomplete="off"
                value="<?php echo $address; ?>">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" placeholder="Nhập SĐT user" 
                name="phone" required="required" autocomplete="off" pattern="[0-9]{10}"
                value="<?php echo $phone; ?>">
            <div class="form-outline mb-3 w-50 m-auto">
            <label for="submit" class="form-label"></label>
                <input type="submit" class="btn btn-primary mb-3 px-3" id="submit" name="submit" value="Sửa thông tin">
            </div>
        </form>
        <!-- NEWSLETTER-->
      </div>
      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Dịch vụ khách hàng</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Hỗ trợ &amp; Về chúng tôi</a></li>
                <li><a class="footer-link" href="#!">Trả hàng &amp; Hoàn tiền</a></li>
                <li><a class="footer-link" href="#!">Cửa hàng online</a></li>
                <li><a class="footer-link" href="#!">Điều khoản &amp; Điều kiện</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Công ty</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Chúng tôi làm gì</a></li>
                <li><a class="footer-link" href="#!">Các dịch vụ có sẵn</a></li>
                <li><a class="footer-link" href="#!">Bài viết mới nhất</a></li>
                <li><a class="footer-link" href="#!">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Mạng xã hội</h6>
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
                <p class="small text-muted mb-0">&copy; 2022 Đã đăng ký bản quyền.</p>
              </div>
              <div class="col-md-6 text-center text-md-end">
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