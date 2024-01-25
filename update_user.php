<?php
session_start();
if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}
include('includes/connect.php');
$id=$_GET['updateid'];
$sql="SELECT * FROM `user` WHERE id_user='$id'";
$result=mysqli_query($con,$sql);
$number_update=mysqli_num_rows($result);
if($number_update>0){
    while($row_update=mysqli_fetch_array($result)){
        $name=$row_update['name'];
        $email=$row_update['email'];
        $pass=$row_update['pass'];
        $cpass=$row_update['cpass'];
        $address=$row_update['address'];
        $phone=$row_update['phone'];
        $user_type=$row_update['user_type'];
        $image=$row_update['image'];
    }
}

if(isset($_POST['submit'])&&$_POST['submit']){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $phone=$_POST['phone'];
    $user_type=$_POST['user_type'];
    // Image
    if (!empty($_FILES['image']['name'])) {
    $image=$_FILES['image']['name'];
    $hinh_tmp_name=$_FILES['image']['tmp_name'];
    $hinh_error=$_FILES['image']['error'];
    move_uploaded_file($hinh_tmp_name,"img/user/$image");
    $update_product="UPDATE `user` SET name='$name',email='$email',phone='$phone',address='$address',image='$image',user_type='$user_type'
    WHERE id_user='$id'";
    }else{
      // Insert query
    $update_product="UPDATE `user` SET name='$name',email='$email',phone='$phone',address='$address',user_type='$user_type'
    WHERE id_user='$id'";
    }
    $result_product=mysqli_query($con,$update_product);
    if($result_product){
        echo "<script>alert('Sửa user thành công')</script>";
        header('location:admin.php?user');
    }else{
        die(mysqli_error($con));
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Sửa user</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor_admin/choices.js/public/assets/styles/choices.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor_admin/overlayscrollbars/css/OverlayScrollbars.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css_admin/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css_admin/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <!-- Sidebar Header    -->
      <div class="sidebar-header d-flex align-items-center justify-content-center p-4 mb-4">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3" src="img/avatar-trang.jpg" alt="avatar">
          <h2 class="h5 text-white text-uppercase mb-0">Admin</h2>
          <p class="text-sm mb-0 text-muted">Admin</p>
        </div>
        <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="admin.php">
          <p class="h1 m-0">BD</p></a>
      </div>
      <!-- Sidebar Navigation Menus--><span class="text-uppercase text-white-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">CHỨC NĂNG</span>
      <ul class="list-unstyled">                  
        <li class="sidebar-item"><a class="sidebar-link" href="admin.php?employee"> 
        <i class="fas fa-users"> QUẢN LÝ NHÂN VIÊN</i></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="admin.php?product"> 
        <i class="fas fa-file-signature"> QUẢN LÝ SẢN PHẨM</i></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="admin.php?category"> 
        <i class="fas fa-users"> QUẢN LÝ DANH MỤC</i></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="admin.php?user"> 
        <i class="fas fa-user-check"> QUẢN LÝ KHÁCH HÀNG</i></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="admin.php?order"> 
        <i class="fas fa-th-list"> QUẢN LÝ ĐƠN HÀNG</i></a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="admin.php?post"> 
        <i class="fas fa-file-signature"> QUẢN LÝ BÀI VIẾT</i></a></li>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
              <div class="d-flex align-items-center"><a class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn" href="admin.php">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                    <use xlink:href="#menu-1"> </use>
                  </svg></a><a class="navbar-brand ms-2" href="admin.php">
                  <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span class="text-white fw-normal text-xs">Welcome to </span><strong class="text-primary text-sm"> Vivobook</strong></div></a></div>
              <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Messages dropdown-->
                <li class="nav-item dropdown"> <a class="nav-link text-white position-relative" id="messages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#envelope-1"> </use>
                    </svg><span class="badge bg-info">10</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="messages">
                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="img/avatar-1.jpg" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                          <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2022</p>
                        </div></a></li>
                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="img/avatar-2.jpg" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                          <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2022</p>
                        </div></a></li>
                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="img/avatar-3.jpg" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                          <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2022</p>
                        </div></a></li>
                    <li><a class="dropdown-item text-center" href="#!"> <strong class="text-xs text-gray-600">Read all messages       </strong></a></li>
                  </ul>
                </li>
                <!-- Log out-->
                <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="index.php"> <span class="d-none d-sm-inline-block">Đăng xuất</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#security-1"> </use>
                    </svg></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    <!-- main -->
    <div class="container mt-2">
        <form method="post" enctype="multipart/form-data">
        <div class="form-outline mb-3 w-50 m-auto">
            <label for="user_type" class="form-label">Phân quyền</label>
                <select name="user_type" class="form-select">
                  <option value="<?php echo $user_type; ?>" disabled selected><?php echo $user_type; ?></option>
                      <option value="user">user</option>
                      <option value="admin">admin</option>
                </select>
            </div>
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
                <label for="image" class="form-label">Hình</label>
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
                <input type="submit" class="btn btn-primary mb-3 px-3" id="submit" name="submit" value="Sửa user">
            </div>
        </form>
    </div>

    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
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
  </body>
</html>