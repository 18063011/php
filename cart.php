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
    <title>Giỏ hàng</title>
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
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="fw-bold text-uppercase text-dark">VivoBook</span></a>
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
            if(isset($_SESSION['user_id'])){
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
                <h1 class="h2 text-uppercase mb-0">Giỏ hàng</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Giỏ hàng</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <form action="" method="post">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Sản phẩm</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Giá</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Số lượng</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Tổng tiền</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
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
                      
                  ?>
                          <tr>
                            <th class='ps-0 py-3 border-light' scope='row'>
                              <div class='d-flex align-items-center'><a class='reset-anchor d-block animsition-link' href="<?php echo "detail.php?id_sach=$id_sach" ?>"><img src="<?php echo "img/sanpham/$hinh" ?>" alt='...' width='70'/></a>
                                <div class='ms-3'><strong class='h6'><a class='reset-anchor animsition-link' href="<?php echo "detail.php?id_sach=$id_sach" ?>"><?php echo $tensach ?></a></strong></div>
                              </div>
                            </th>
                            <td class='p-3 align-middle border-light'>
                              <p class='mb-0 small'><?php echo $table_gia ?> VNĐ</p>
                            </td>
                            <td class='p-3 align-middle border-light'>
                              <form action="" method="post">
                              <input type="hidden" name="id_cart" value="<?php echo $id_cart ?>">
                              <div class='border d-flex align-items-center justify-content-between px-3'><span><input type='submit' name='update' value='Cập nhật' class='small text-uppercase text-gray headings-font-family'></span>
                                <div class='quantity'>
                                  <input class='form-input form-input-sm border-0 shadow-0 p-0' name='qty' type="number" min="1" value="<?php echo $soluong;?>"/>
                                </div>
                              </div>
                              </form>
                            </td>
                            <?php
                                  if(isset($_POST['update'])){
                                    $soluong_update=$_POST['qty'];
                                    $id_update=$_POST['id_cart'];
                                    $update_cart="UPDATE `cart` SET soluong='$soluong_update' WHERE id_cart='$id_update'";
                                    $result_update=mysqli_query($con,$update_cart);
                                    if($result_update){
                                      echo "<script>window.location.href ='cart.php'</script>";
                                    }
                                  }
                                  ?>
                            <td class='p-3 align-middle border-light'>
                              <p class='mb-0 small'><?php echo $table_gia_soluong=$table_gia*$soluong; ?> VNĐ</p>
                            </td>
                            <td class='p-3 align-middle border-light'><a href="cart.php?remove=<?php echo $id_cart;?>" class="reset-anchor" onclick="return confirm('Bỏ sản phẩm khỏi giỏ?')"><i class='fas fa-trash-alt small text-muted'></i></a></td>
                            <?php
                            if(isset($_GET['remove'])){
                              $id_remove=$_GET['remove'];
                              $delete_cart="DELETE FROM `cart` WHERE id_cart='$id_remove'";
                              $result_delete=mysqli_query($con,$delete_cart);
                              if($result_delete){
                                echo "<script>window.location.href ='cart.php'</script>";
                              }
                            }
                            if(isset($_GET['delete_all'])){
                              $delete_cart_all="DELETE FROM `cart` WHERE id_user='$id_user'";
                              $result_delete=mysqli_query($con,$delete_cart_all);
                              if($result_delete){
                                echo "<script>window.location.href ='cart.php'</script>";
                              }
                            }
                            ?>
                          </tr>
                  <?php
                  $total+=$table_gia_soluong;
                      }
                  }else{
                    echo "<h2>Không có hàng trong giỏ</h2>";
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left me-2"> </i>Tiếp tục mua hàng</a></div>
                  <div class="col-md-6 text-md"><a class="btn btn-outline-dark btn-sm" href="cart.php?delete_all" onclick="return confirm('Xóa tất cả khỏi giỏ?');">Xóa toàn bộ giỏ hàng</a></div>
                  <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="checkout.php">Tiếp tục thanh toán<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Tổng tiền giỏ hàng</h5>
                  <ul class="list-unstyled mb-0">
                    <!-- <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li>
                    <li class="border-bottom my-2"></li> -->
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Tổng</strong><span><?php echo $total ?> VNĐ</span></li>
                    <li>
                      <form action="#">
                        <div class="input-group mb-0">
                          <input class="form-control" type="text" placeholder="Enter your coupon">
                          <button class="btn btn-dark btn-sm w-100" type="submit"> <i class="fas fa-gift me-2"></i>Sử dụng coupon</button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            </form>
          </div>
        </section>
      </div>
      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Chăm sóc khách hàng</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Trợ giúp &amp; Liên hệ</a></li>
                <li><a class="footer-link" href="#!">Hoàn hàng &amp; Hoàn tiền</a></li>
                <li><a class="footer-link" href="#!">Mua sắm Online</a></li>
                <li><a class="footer-link" href="#!">Điều khoản &amp; Điều kiện</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Công ty</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Về chúng tôi</a></li>
                <li><a class="footer-link" href="#!">Những dịch vụ hiện có</a></li>
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
                <p class="small text-muted mb-0">&copy; 2022 All rights reserved.</p>
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