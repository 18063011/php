<?php
include('connect.php');

// display index product
function getproduct(){
    global $con;
    $select_product="SELECT * FROM `sach` ORDER BY rand() LIMIT 0,6";
          $result_product=mysqli_query($con,$select_product);
          $number_product=mysqli_num_rows($result_product);
          if($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='col-sm-3 col-md-6 col-lg-4'>
                <div class='product text-center'>
                  <div class='position-relative mb-3'>
                    <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' width='100' height='100' alt='...'></a>
                    <div class='product-overlay'>
                      <ul class='mb-0 list-inline'>
                        <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                        <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='index.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                        <li class='list-inline-item me-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                  <p class='small text-muted'>$gia VNĐ</p>
                </div>
                </div>";
            }
          }
}

// display shop product by category
function displayshop_bycategory(){
    if(isset($_GET['category'])){
    global $con;
    $id_category=$_GET['category'];
    $select_product="SELECT * FROM `sach` WHERE id_danhmuc=$id_category";
          $result_product=mysqli_query($con,$select_product);
          $number_product=mysqli_num_rows($result_product);
          if($number_product==0){
            echo "<h2 class='text-center text-danger'>Không có sản phẩm danh mục này</h2>";
          }elseif($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='col-lg-4 col-sm-6'>
              <div class='product text-center'>
                <div class='mb-3 position-relative'>
                  <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                  <div class='product-overlay'>
                    <ul class='mb-0 list-inline'>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                      <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                <p class='small text-muted'>$gia VNĐ</p>
              </div>
            </div>";
            }
          }
    }
}

// display shop product list by category
function get_shopcategory(){
    global $con;
    $select_category="SELECT * FROM `danhmuc`";
          $result_category=mysqli_query($con,$select_category);
          $number_category=mysqli_num_rows($result_category);
          if($number_category>0){
            while($row_category=mysqli_fetch_array($result_category)){
              $id_danhmuc=$row_category['id_danhmuc'];
              $tendanhmuc=$row_category['tendanhmuc'];
              echo "<li class='mb-2'><a class='reset-anchor' href='shop.php?category=$id_danhmuc'>$tendanhmuc</a></li>";
            }
          } 
}

// display shop
function displayshop(){
  if(!isset($_GET['sortlow'])&&!isset($_GET['sorthigh'])&&!isset($_GET['popular'])&&!isset($_GET['new'])){
        global $con;
        $select_product="SELECT * FROM `sach` ORDER BY tensach ASC LIMIT 0,40";
              $result_product=mysqli_query($con,$select_product);
              $number_product=mysqli_num_rows($result_product);
              if($number_product>0){
                while($row_product=mysqli_fetch_array($result_product)){
                  $id_sach=$row_product['id_sach'];
                  $tensach=$row_product['tensach'];
                  $tacgia=$row_product['tacgia'];
                  $danhmuc=$row_product['id_danhmuc'];
                  $gia=$row_product['gia'];
                  $hinh=$row_product['hinh'];
                  echo "
                  <div class='col-lg-4 col-sm-6'>
                  <div class='product text-center'>
                    <div class='mb-3 position-relative'>
                      <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                      <div class='product-overlay'>
                        <ul class='mb-0 list-inline'>
                          <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                          <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                          <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                    <p class='small text-muted'>$gia VNĐ</p>
                  </div>
                </div>";
                }
              }
        }
}
// display shop in order
function displayshoporder(){
  global $con;
  if(isset($_GET['sortlow'])){
        $select_product="SELECT * FROM `sach` ORDER BY gia ASC LIMIT 0,40";
              $result_product=mysqli_query($con,$select_product);
              $number_product=mysqli_num_rows($result_product);
              if($number_product>0){
                while($row_product=mysqli_fetch_array($result_product)){
                  $id_sach=$row_product['id_sach'];
                  $tensach=$row_product['tensach'];
                  $tacgia=$row_product['tacgia'];
                  $danhmuc=$row_product['id_danhmuc'];
                  $gia=$row_product['gia'];
                  $hinh=$row_product['hinh'];
                  echo "
                  <div class='col-lg-4 col-sm-6'>
                  <div class='product text-center'>
                    <div class='mb-3 position-relative'>
                      <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                      <div class='product-overlay'>
                        <ul class='mb-0 list-inline'>
                          <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                          <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                          <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                    <p class='small text-muted'>$gia VNĐ</p>
                  </div>
                </div>";
                }
              }
  }
  if(isset($_GET['sorthigh'])){
    $select_product="SELECT * FROM `sach` ORDER BY gia DESC LIMIT 0,40";
          $result_product=mysqli_query($con,$select_product);
          $number_product=mysqli_num_rows($result_product);
          if($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='col-lg-4 col-sm-6'>
              <div class='product text-center'>
                <div class='mb-3 position-relative'>
                  <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                  <div class='product-overlay'>
                    <ul class='mb-0 list-inline'>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                      <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                <p class='small text-muted'>$gia VNĐ</p>
              </div>
            </div>";
            }
          }
  }
  if(isset($_GET['popular'])){
    $select_product="SELECT * FROM `sach` ORDER BY rand() LIMIT 0,40";
          $result_product=mysqli_query($con,$select_product);
          $number_product=mysqli_num_rows($result_product);
          if($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='col-lg-4 col-sm-6'>
              <div class='product text-center'>
                <div class='mb-3 position-relative'>
                  <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                  <div class='product-overlay'>
                    <ul class='mb-0 list-inline'>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                      <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                <p class='small text-muted'>$gia VNĐ</p>
              </div>
            </div>";
            }
          }
  }
  if(isset($_GET['new'])){
    $select_product="SELECT * FROM `sach` ORDER BY id_sach DESC LIMIT 0,40";
          $result_product=mysqli_query($con,$select_product);
          $number_product=mysqli_num_rows($result_product);
          if($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='col-lg-4 col-sm-6'>
              <div class='product text-center'>
                <div class='mb-3 position-relative'>
                  <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                  <div class='product-overlay'>
                    <ul class='mb-0 list-inline'>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                      <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                <p class='small text-muted'>$gia VNĐ</p>
              </div>
            </div>";
            }
          }
  }
}

// display index category
function getcategory(){
    global $con;
    $select_category="SELECT * FROM `danhmuc` LIMIT 0,4";
          $result_category=mysqli_query($con,$select_category);
          $number_category=mysqli_num_rows($result_category);
          if($number_category>0){
            while($row_category=mysqli_fetch_array($result_category)){
              $id_danhmuc=$row_category['id_danhmuc'];
              $tendanhmuc=$row_category['tendanhmuc'];
              echo "<div class='row'>
                    <div class='row-md-4 my-3'><a class='category-item my-3 md-4' href='shop.php?category=$id_danhmuc'>
                    <strong class='category-item-title'>$tendanhmuc</strong></a>
                    </div>
                    </div>";
            }
          }   
}

// search product function
function searchproduct(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_product="SELECT * FROM `sach` WHERE tensach LIKE '%$search_data_value%'";
        $result_product=mysqli_query($con,$search_product);
        $number_product=mysqli_num_rows($result_product);
        if($number_product==0){
            echo "<h2 class='text-center text-danger'>Không có sản phẩm bạn cần tìm</h2>";
        }elseif($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
                <div class='col-lg-4 col-sm-6'>
                <div class='product text-center'>
                  <div class='mb-3 position-relative'>
                    <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                    <div class='product-overlay'>
                      <ul class='mb-0 list-inline'>
                        <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                        <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                        <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                  <p class='small text-muted'>$gia VNĐ</p>
                </div>
              </div>";
            }
          }
    }else{
      echo "<h2 class='text-center text-danger'>Không có sản phẩm bạn cần tìm</h2>";
    }
}

// display detail page
function viewdetail(){
    global $con;
    if(isset($_GET['id_sach'])){
        $id_sach=$_GET['id_sach'];
        $select_product="SELECT * FROM `sach` WHERE id_sach=$id_sach";
        $result_product=mysqli_query($con,$select_product);
        $number_product=mysqli_num_rows($result_product);
          if($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='row m-sm-0'>
              <div class='col-sm-10 order-1 order-sm-2'>
                <div class='swiper product-slider'>
                  <div class='swiper-wrapper'>
                    <div class='swiper-slide h-auto'><a class='glightbox product-view' data-gallery='gallery2' data-glightbox='Product item 1'><img class='img-fluid' src='img/sanpham/$hinh' alt='...'></a></div>
                  </div>
                </div>
              </div>
              </div>
              </div>
              <div class='col-lg-6'>
              <h1>$tensach</h1>
              <div class='text-dark p-0 mb-4 d-inline-block'>$tacgia</div>
              <p class='text-muted lead'>$gia VNĐ</p>
              <div class='row align-items-stretch mb-4'>
              <div class='col-sm-5 pr-sm-0'>
                <div class='border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white'><span class='small text-uppercase text-gray mr-4 no-select'>Số lượng</span>
                  <div class='quantity'>
                    <button class='dec-btn p-0'><i class='fas fa-caret-left'></i></button>
                    <input class='form-control border-0 shadow-0 p-0' type='text' value='1'>
                    <button class='inc-btn p-0'><i class='fas fa-caret-right'></i></button>
                  </div>
                </div>
              </div>
            <div class='col-sm-3 pl-sm-0'><a class='btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></div>";
            }
          }
    }
}

// display related product
function getrelatedproduct(){
    if(!isset($_GET['category'])){
    global $con;
    $select_product="SELECT * FROM `sach` ORDER BY rand() LIMIT 0,4";
          $result_product=mysqli_query($con,$select_product);
          $number_product=mysqli_num_rows($result_product);
          if($number_product>0){
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $tacgia=$row_product['tacgia'];
              $danhmuc=$row_product['id_danhmuc'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              echo "
              <div class='col-lg-3 col-sm-6'>
              <div class='product text-center skel-loader'>
                <div class='d-block mb-3 position-relative'><a class='d-block' href='detail.php?id_sach=$id_sach'><img class='img-fluid w-100' src='img/sanpham/$hinh' alt='...'></a>
                  <div class='product-overlay'>
                    <ul class='mb-0 list-inline'>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#'><i class='far fa-heart'></i></a></li>
                      <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='shop.php?add_to_cart=$id_sach'>Thêm vào giỏ</a></li>
                      <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='detail.php?id_sach=$id_sach' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class='reset-anchor' href='detail.php?id_sach=$id_sach'>$tensach</a></h6>
                <p class='small text-muted'>$gia VNĐ</p>
              </div>
            </div>";
            }
          }
    }
}

// get ip address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;    
}

// cart
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip=getIPAddress();
        $id_sach=$_GET['add_to_cart'];
        if(isset($_SESSION['user_id'])){
          $id_user=$_SESSION['user_id'];
        }else{
          $id_user=$ip;
        }
        $select_query="SELECT * FROM `cart` WHERE id_sach='$id_sach' AND id_user='$id_user'";
        $result_query=mysqli_query($con,$select_query);
        $number_query=mysqli_num_rows($result_query);
        if($number_query>0){
            echo "<script>alert('Bạn đã có sản phẩm này trong giỏ hàng. Vui lòng vào giỏ cập nhật số lượng')</script>";
            // echo "<script>window.location.href('cart.php')</script>";     
        }else{
            $select_product="SELECT * FROM `sach` WHERE id_sach='$id_sach'";
            $result_product=mysqli_query($con,$select_product);
            while($row_product=mysqli_fetch_array($result_product)){
              $id_sach=$row_product['id_sach'];
              $tensach=$row_product['tensach'];
              $gia=$row_product['gia'];
              $hinh=$row_product['hinh'];
              $insert_query="INSERT INTO `cart` (id_sach,tensach,hinh,gia,soluong,id_user)
              VALUES ($id_sach,'$tensach','$hinh','$gia',1,'$id_user')";
              $result_query=mysqli_query($con,$insert_query);
              echo "<script>alert('Đã thêm sản phẩm vào giỏ')</script>";
            }
        }
    }
}

// get cart item numbers
function cart_number(){
    $ip=getIPAddress();
    if(isset($_SESSION['user_id'])){
      $id_user=$_SESSION['user_id'];
    }else{
      $id_user=$ip;
    }
    if(isset($_GET['add_to_cart'])){
        global $con;
        $select_query="SELECT * FROM `cart` WHERE id_user='$id_user'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);
    }else{
        global $con;
        $select_query="SELECT * FROM `cart` WHERE id_user='$id_user'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);
    }
    echo $count_cart_item;
}

?>