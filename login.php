<?php
include('includes/connect.php');
include('includes/function.php');
session_start();
// check login
if(isset($_SESSION['user_id'])){
    header('location:index.php');
}elseif(isset($_SESSION['admin_id'])){
    header('location:admin.php');
}
// register
if(isset($_POST['signup'])){
    $name=$_POST['name_register'];
    $name= filter_var($name,FILTER_SANITIZE_STRING);
    $email=$_POST['email_register'];
    $email= filter_var($email,FILTER_SANITIZE_STRING);
    $pass=$_POST['pass_register'];
    $pass= filter_var($pass,FILTER_SANITIZE_STRING);
    $cpass=$_POST['cpass_register'];
    $cpass= filter_var($cpass,FILTER_SANITIZE_STRING);
    $address=$_POST['address_register'];
    $address= filter_var($address,FILTER_SANITIZE_STRING);
    $phone=$_POST['phone_register'];
    $phone= filter_var($phone,FILTER_SANITIZE_STRING);
    $email=$_POST['email_register'];
    $email= filter_var($email,FILTER_SANITIZE_STRING);
    $ip=getIPAddress();

    $image=$_FILES['image']['name'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_size=$_FILES['image']['size'];
    $image_folder='img/user/'.$image;

    $select_query_email="SELECT * FROM `user` WHERE 'email'='$email'";
    $result_query_email=mysqli_query($con,$select_query_email);
    $number=mysqli_num_rows($result_query_email);
    if($number>0){
        $message[]='Email đã được sử dụng';
    }elseif($pass!=$cpass){
        $message[]='Mật khẩu nhập lại không chính xác';
    }elseif(strlen($_POST['pass_register'])<8){
        $message[]='Mật khẩu phải chứa ít nhất 8 ký tự';
    }elseif(!preg_match("#[0-9]+#",$_POST['pass_register'])){
        $message[]='Mật khẩu phải chứa ít nhất 1 số';
    }elseif(!preg_match("#[A-Z]+#",$_POST['pass_register'])){
        $message[]='Mật khẩu phải chứa ít nhất 1 ký tự hoa';
    }elseif(!preg_match("#[a-z]+#",$_POST['pass_register'])){
        $message[]='Mật khẩu phải chứa ít nhất 1 ký tự thường';
    }elseif($image_size>2000000){
        $message[]='Kích cỡ file ảnh quá lớn';
    }else{
        $insert_query="INSERT INTO `user` (name,email,password,image,ip_user,address,phone)
        VALUES ('$name','$email','$pass','$image','$ip','$address','$phone')";
        $result_query=mysqli_query($con,$insert_query);
        if($result_query){
            move_uploaded_file($image_tmp_name,$image_folder);
            echo "<script>alert('Đăng ký tài khoản thành công')</script>";
        }else{
            die(mysqli_error($con)); 
        }
    }
}
// login
if(isset($_POST['login'])){
    $ip=getIPAddress();
    $select_cart="SELECT * FROM `cart` WHERE id_user='$ip'";
    $result_cart=mysqli_query($con,$select_cart);
    $row_count=mysqli_num_rows($result_cart);

    $name=$_POST['user'];
    $name= filter_var($name,FILTER_SANITIZE_STRING);
    $pass=$_POST['pass'];
    $pass= filter_var($pass,FILTER_SANITIZE_STRING);

    $select_query="SELECT * FROM `user` WHERE email = '$name' AND password = '$pass'";
    $result_query=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_query);
    if($number>0){
        while($row=mysqli_fetch_array($result_query)){
            if($row['user_type']=='admin'){
                $_SESSION['admin_id']=$row['id_user'];
                header('location:admin.php');
            }elseif($row['user_type']=='user'){
                $_SESSION['user_id']=$row['id_user'];
                if($row_count>0){
                    //$update_cart="UPDATE `cart` SET id_user="$_SESSION['user_id']" WHERE id_user='$ip'";
                    //$update_result=mysqli_query($con,$update_cart);
                    header('location:index.php');
                }else{
                    header('location:index.php');
                }
            }else{
                $message[]='Tài khoản không tồn tại';
            }
        }
    }else{
        $message[]='Sai tên đăng nhập hoặc mật khẩu';
    }
}
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="/js/login.js"></script>
    <link rel="stylesheet" href="/css/login.css">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>    
/* sign in FORM */
#logreg-forms{
    width:412px;
    margin:10vh auto;
    background-color:#f3f3f3;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}
#logreg-forms form {
    width: 100%;
    max-width: 410px;
    padding: 15px;
    margin: auto;
}
#logreg-forms .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
}
#logreg-forms .form-control:focus { z-index: 2; }
#logreg-forms .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
#logreg-forms .form-signin input[type="password"] {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

#logreg-forms .social-login{
    width:390px;
    margin:0 auto;
    margin-bottom: 14px;
}
#logreg-forms .social-btn{
    font-weight: 100;
    color:white;
    width:190px;
    font-size: 0.9rem;
}

#logreg-forms a{
    display: block;
    padding-top:10px;
    color:lightseagreen;
}

#logreg-form .lines{
    width:200px;
    border:1px solid red;
}


#logreg-forms button[type="submit"]{ margin-top:10px; }

#logreg-forms .facebook-btn{  background-color:#3C589C; }

#logreg-forms .google-btn{ background-color: #DF4B3B; }

#logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }

#logreg-forms .form-signup .social-btn{ width:210px; }

#logreg-forms .form-signup input { margin-bottom: 2px;}

.form-signup .social-login{
    width:210px !important;
    margin: 0 auto;
}

/* Mobile */

@media screen and (max-width:500px){
    #logreg-forms{
        width:300px;
    }
    
    #logreg-forms  .social-login{
        width:200px;
        margin:0 auto;
        margin-bottom: 10px;
    }
    #logreg-forms  .social-btn{
        font-size: 1.3rem;
        font-weight: 100;
        color:white;
        width:200px;
        height: 56px;
        
    }
    #logreg-forms .social-btn:nth-child(1){
        margin-bottom: 5px;
    }
    #logreg-forms .social-btn span{
        display: none;
    }
    #logreg-forms  .facebook-btn:after{
        content:'Facebook';
    }
  
    #logreg-forms  .google-btn:after{
        content:'Google+';
    }
    
}
body{
    background-image: url(/img/background_login.jpg);
}
.message{
    position: sticky;
    top:0;
    max-width:1200px;
    padding:1rem 1rem;
    display: flex;
    align-items:center;
    justify-content: space-between;
    gap:1.5rem;
    z-index:1000;
    background-color:#f3f3f3;
    margin:0 auto;
}
.message span{
    color:black;
    font-size:1rem;
    cursor:pointer;
}
.message i{
    color:red;
    font-size:1rem;
}
.message i:hover{
    color:white;
}
    </style>

    <script>
        function toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})
    </script>

</head>
<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span><i class="fas fa-times" onclick="this.parentElement.remove()"></i></div>';
    }
}
?>

    <div id="logreg-forms">
        <form action="" method="post" enctype="multipart/form-data" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng Nhập</h1>
            <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i>Đăng nhập bằng Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i>Đăng nhập bằng Google+</span> </button>
            </div>
            <p style="text-align:center"> Hoặc  </p>
            <input type="email" id="inputAccount" name="user" class="form-control" placeholder="Email" required="" autofocus=""><br>
            <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Mật khẩu" required="">
            
            <button class="btn btn-success btn-block" name="login" type="submit" id="button" value="Đăng nhập"><i class="fas fa-sign-in-alt"></i>Đăng nhập</button>


            <a href="#" id="forgot_pswd">Quên mật khẩu?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" name="register" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Tạo tài khoản</button>
            </form>

            <form action="/reset/password/" method="post" enctype="multipart/form-data" class="form-reset">
                <input type="text" id="resetEmail" class="form-control" placeholder="Địa chỉ Email" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Đặt lại mật khẩu</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i>Quay lại</a>
            </form>
            
            <form action="" method="post" enctype="multipart/form-data" class="form-signup">
                <div class="social-login">
                    <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i>Đăng nhập bằng Facebook</span> </button>
                </div>
                <div class="social-login">
                    <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i>Đăng nhập bằng Google+</span> </button>
                </div>
                
                <p style="text-align:center">Hoặc</p>

                <input type="text" name="name_register" id="user-name" class="form-control" placeholder="Tên người dùng" required="" autofocus="">
                <input type="email" name="email_register" id="user-email" class="form-control" placeholder="Email" required autofocus="">
                <input type="password" name="pass_register" id="user-pass" class="form-control" placeholder="Mật khẩu" required autofocus="">
                <input type="password" name="cpass_register" id="user-repeatpass" class="form-control" placeholder="Nhập lại mật khẩu" required autofocus="">
                <input type="text" name="address_register" id="user-address" class="form-control" placeholder="Địa chỉ" required autofocus="">
                <input type="tel" name="phone_register" id="user-phone" pattern="[0-9]{10}" class="form-control" placeholder="Điện thoại" required autofocus="">
                <input type="file" name="image" id="user-file" accept="image/jpg, image/png, image/jpeg" class="form-control">

                <button class="btn btn-primary btn-block" name="signup" type="submit"><i class="fas fa-user-plus"></i> Đăng ký</button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i>Đã có tài khoản? Đăng nhập</a>
            </form>
            <a href="index.php" id="back_homepage" style="text-align: center;">Quay lại trang chủ</a>
            <br>
            
    </div>
    <p style="text-align:center">
        <a href="http://bit.ly/2RjWFMfunction toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})g" target="_blank" style="color:black"></a>
    </p>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>     
</html>