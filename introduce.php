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
      <!-- HERO SECTION-->
        <section class='pt-5'>
        <h2 class='h5 text-uppercase text-center'>GIỚI THIỆU VIVOBOOK</h2>
        <header class='text-left'>
            <p class='small text-muted small mb-1'>
            <strong>Nguồn nhân lực</strong><br>

Để xây dựng Thương hiệu mạnh, một trong những định hướng quan trọng hàng đầu của VIVOBOOK là chiến lược phát triển nguồn nhân lực - mấu chốt của mọi sự thành công.

VIVOBOOK có hơn 2.200 CB-CNV, trình độ chuyên môn giỏi, nhiệt tình, năng động, chuyên nghiệp. Lực lượng quản lý VIVOBOOK có thâm niên công tác, giỏi nghiệp vụ nhiều kinh nghiệm, có khả năng quản lý tốt và điều hành đơn vị hoạt động hiệu quả.

Kết hợp tuyển dụng nguồn nhân lực đầu vào có chất lượng và kế hoạch bồi dưỡng kiến thức, rèn luyện bổ sung các kỹ năng và chuẩn bị đội ngũ kế thừa theo hướng chính qui thông qua các lớp học ngắn hạn, dài hạn; các lớp bồi dưỡng CB-CNV được tổ chức trong nước cũng như ở nước ngoài đều được lãnh đạo VIVOBOOK đặc biệt quan tâm và tạo điều kiện triển khai thực hiện. Chính vì thế, trình độ chuyên môn của đội ngũ CB-CNV ngày càng được nâng cao, đáp ứng nhu cầu ngày càng tăng của công việc cũng như sự phát triển của xã hội đang trên đường hội nhập.

<br><strong>Về hàng hóa</strong><br>

Công ty VIVOBOOK chuyên kinh doanh: sách quốc văn, ngoại văn, văn hóa phẩm, văn phòng phẩm, dụng cụ học tập, quà lưu niệm, đồ chơi dành cho trẻ em… Một số Nhà sách trực thuộc Công ty VIVOBOOK còn kinh doanh các mặt hàng siêu thị như: hàng tiêu dùng, hàng gia dụng, hóa  mỹ phẩm…

Sách quốc văn với nhiều thể loại đa dạng như sách giáo khoa – tham khảo, giáo trình, sách học ngữ, từ điển, sách tham khảo thuộc nhiều chuyên ngành phong phú: văn học, tâm lý – giáo dục, khoa học kỹ thuật, khoa học kinh tế - xã hội, khoa học thường thức, sách phong thủy, nghệ thuật sống, danh ngôn, sách thiếu nhi, truyện tranh, truyện đọc, từ điển, công nghệ thông tin, khoa học – kỹ thuật, nấu ăn, làm đẹp...  của nhiều Nhà xuất bản, nhà cung cấp sách có uy tín như: NXB Trẻ, Giáo Dục, Kim Đồng, Văn hóa -Văn Nghệ, Tổng hợp TP.HCM, Chính Trị Quốc Gia; Công ty Đông A, Nhã Nam, Bách Việt, Alphabook, Thái Hà, Minh Lâm, Đinh Tị, Minh Long, TGM, Sáng Tạo Trí Việt, Khang Việt, Toàn Phúc…

Sách ngoại văn bao gồm: từ điển, giáo trình, tham khảo, truyện tranh thiếu nhi , sách học ngữ, từ vựng, ngữ pháp, luyện thi TOEFL, TOEIC, IELS…được nhập từ các NXB nước ngoài như: Cambridge, Mc Graw-Hill, Pearson Education, Oxford, Macmillan, Cengage Learning…

Văn phòng phẩm, dụng cụ học tập, đồ chơi dành cho trẻ em, hàng lưu niệm… đa dạng, phong phú, mẫu mã đẹp, chất lượng tốt, được cung ứng bởi các công ty, nhà cung cấp uy tín như: Thiên Long, XNK Bình Tây, Hạnh Thuận, Ngô Quang, Việt Văn, Trương Vui, Hương Mi, Phương Nga, Việt Tinh Anh, Chăm sóc trẻ em Việt, Mẹ và em bé…

Cùng với việc phát hành độc quyền nhiều ấn bản các loại của các Nhà xuất bản là năng lực in ấn, sản xuất cung ứng nguồn hàng của Xí nghiệp in VIVOBOOK, đã giúp Công ty luôn chủ động được nguồn hàng, nhất là các mặt hàng độc quyền như: lịch bloc, tập học sinh, sổ tay cao cấp, agenda, văn phòng phẩm, dụng cụ học tập…

<br><strong>Hệ thống Nhà sách chuyên nghiệp</strong><br>

Mạng lưới phát hành của Công ty VIVOBOOK rộng khắp trên toàn quốc, gồm 5 Trung tâm sách, 1 Xí nghiệp in và với gần 60 Nhà sách trải dọc khắp các tỉnh thành từ TP.HCM đến Thủ Đô Hà Nội, miền Trung, Tây Nguyên, miền Đông và Tây Nam Bộ như: Hà Nội, Vĩnh Phúc, Hải Phòng, Thanh Hóa, Hà Tĩnh, Huế, Đà Nẵng, Quảng Nam, Quảng Ngãi, Quy Nhơn, Nha Trang, Gia Lai, Đăklăk, Bảo Lộc - Lâm Đồng, Ninh Thuận, Bình Thuận, Bình Phước, Bình Dương, Đồng Nai, Vũng Tàu, Long An, Tiền Giang, Bến Tre, Vĩnh Long, Cần Thơ, Hậu Giang, An Giang, Kiên Giang, Sóc Trăng, Cà Mau.

Năm 2004 Công ty đã được Cục Sở hữu Trí tuệ Việt Nam công nhận sở hữu độc quyền tên thương hiệu VIVOBOOK.

Năm 2005, Công ty VIVOBOOK được Trung tâm sách kỷ lục Việt Nam công nhận là đơn vị có hệ thống Nhà sách nhiều nhất Việt Nam; được Tạp chí The Guide công nhận Nhà sách Xuân Thu - đơn vị trực thuộc Công ty VIVOBOOK là Nhà sách Ngoại văn đẹp nhất, lớn nhất, quy mô nhất, nhiều sách nhất ở Thành phố Hồ Chí Minh và cả nước.

Năm 2012 VIVOBOOK là Doanh nghiệp nằm trong Top 10 nhà bán lẻ hàng đầu Việt Nam. Đặc biệt năm 2006, 2009, 2012 VIVOBOOK đạt danh hiệu Top 500 Nhà bán lẻ hàng đầu Châu Á Thái Bình Dương, giải thưởng được tạp chí Retail Asia (Singapore) bình chọn.

<br><strong>Kinh nghiệm hoạt động</strong><br>

Là đơn vị có gần 40 năm kinh doanh và phục vụ xã hội, nên VIVOBOOK đã tích lũy được nhiều kinh nghiệm trong việc nghiên cứu thị trường, phân tích tài chính, định hướng phát triển, hoạch định chiến lược kinh doanh và khả năng tiếp thị giỏi… Đồng thời VIVOBOOK còn có nhiều kinh nghiệm trong việc tổ chức các cuộc Hội thảo, Triển lãm và giới thiệu sách quốc văn, ngoại văn với qui mô lớn, ấn tượng.

VIVOBOOK luôn là đơn vị đi tiên phong trong nhiều hoạt động xã hội, điển hình là việc tham gia tổ chức các Hội sách ở TP.HCM như: Hội sách Thành Phố Hồ Chí Minh, Hội sách Thiếu nhi ngoại thành, Hội sách Mùa khai trường, Hội sách Học đường, Hội sách Trường Quốc tế… Nổi bật nhất là Hội sách Thành Phố Hồ Chí Minh, được định kỳ tổ chức 2 năm một lần. Đây là Hội sách có qui mô lớn, tầm ảnh hưởng rộng, đã để lại ý nghĩa kinh tế, văn hóa và xã hội sâu sắc. Hội sách không chỉ là nơi hội tụ văn hóa lý tưởng đối với người dân TP.HCM mà còn là một thông điệp văn hóa tôn vinh cho các hoạt động Xuất bản – Phát hành sách cả nước, nâng tầm cho việc giao lưu, trao đổi văn hóa với bạn bè thế giới, đồng thời góp phần đem sách - tri thức đến gần hơn với mọi tầng lớp nhân dân, phục vụ tốt hơn nhu cầu văn hóa tinh thần của xã hội

Xí nghiệp in VIVOBOOK

Gồm Phân xưởng in và Phân xưởng thành phẩm: với nhiều máy in hiện đại của Đức và Nhật: Heidelberg, Komori, Akiyama, Lithrone, Mitsubishi… cùng nhiều máy móc, thiết bị khác như: máy cắt, máy vô bìa sách, máy bế hộp…  Đội ngũ công nhân tay nghề cao, đã cho ra những sản phẩm có chất lượng tốt, nhờ đó, VIVOBOOK luôn chủ động được nguồn hàng, sản xuất theo đúng nhu cầu - thị hiếu của khách hàng và hình thành được quy trình in & phát hành; phương thức này không chỉ cho ra những sản phẩm đảm bảo chất lượng mà còn giúp cho việc giảm giá thành, tăng hiệu quả cạnh tranh và kinh doanh cao hơn.

Những sản phẩm chủ yếu do Xí nghiệp In VIVOBOOK sản xuất như: tập học sinh, sổ tay cao cấp, lịch, bao bì, sổ notebook, agenda, catalogue, brochure quảng cáo, văn phòng phẩm…

<br><strong>VIVOBOOK NHÀ PHÂN PHỐI SÁCH NGOẠI VĂN CHUYÊN NGHIỆP</strong><br>

Dù là những bạn đọc nhỏ tuổi hay những bậc cao niên, dù là bạn đọc ở TP.HCM hay ở các tỉnh thành khác trên cả nước thì tên VIVOBOOK đã trở nên thân quen và tin cậy với họ trong những năm qua. Có thể nói, hệ thống gần 60 Nhà sách của VIVOBOOK là những điểm sinh hoạt văn hóa thân quen dành cho mọi đối tượng bạn đọc. Trong số đó, nhà sách Xuân Thu ở địa chỉ cũ số 185, Đồng Khởi, Quận 1, TP.HCM, nay chuyển về 391-391A Trần Hưng Đạo, Quận 1, TP.HCM tọa lạc tại một địa điểm khá lý tưởng nằm ở trung tâm Thành phố, từ lâu đã là địa chỉ quen thuộc của đông đảo bạn đọc trong và ngoài nước và nơi đây được xem là địa điểm phát hành sách ngoại văn được xếp vào loại bậc nhất ở TP.HCM và của cả nước.

Cùng với xu thế hội nhập quốc tế đang ngày càng mở rộng, nhu cầu tìm hiểu và giao lưu văn hoá giữa các nước đang ngày càng phát triển, Công ty VIVOBOOK ngày càng xứng đáng với tầm vóc là nhà phát hành đáng tin cậy của hơn 200 NXB trên Thế giới như Oxford, Cambridge, Pearson, McGraw-Hill, MacMillan, Cengage Learning, Reed Elsevier, Taylor & Francis, Heinemann, Hachette édition, Larousse, Clé International, Bắc Kinh, Thượng Hải, Hồng Kông… Thế mạnh của Công ty VIVOBOOK trong lĩnh vực phân phối sách ngoại văn bao gồm cả hai mảng chính: sách học ngữ English language teaching (ELT) và mảng sách chuyên ngành (Academic).

Về lĩnh vực sách ELT, hiện nay VIVOBOOK đã và đang là nhà phân phối tất cả các loại sách học ngữ, từ điển, các giáo trình tiếng Anh với đủ mọi cấp độ cho các Trung tâm Anh ngữ, các trường Đại học ở TP.HCM nói riêng và cả nước nói chung thông qua các loại sách từ những NXB danh tiếng trên thế giới như Oxford, Cambridge, Pearson Education, Cengage Learning, McGraw-Hill… Đặc biệt, ở lĩnh vực này VIVOBOOK là nhà phát hành độc quyền các ấn phẩm của NXB Oxford tại thị trường Việt Nam bộ sách Let’s Go; hợp tác với NXB Cambridge in ấn và phát hành tại Việt Nam một số bộ giáo trình Anh ngữ New Interchange, Connect, American Primary Colors; Vocabulary in use; Grammar in use… nhằm giảm bớt giá thành so với giá sách nhập khẩu, phục vụ nhu cầu tìm hiểu nâng cao vốn tiếng Anh của đông đảo độc giả.

Về lĩnh vực sách chuyên ngành (Academic), VIVOBOOK vẫn được xem là nhà phân phối lớn nhất các loại sách chuyên ngành phục vụ nhu cầu học tập, nghiên cứu cho các bạn sinh viên, các giáo viên, giáo sư, những người làm công tác nghiên cứu và hầu hết mọi đối tượng bạn đọc. VIVOBOOK luôn năng động và nhạy bén trong việc nắm bắt nhu cầu của khách hàng, khai thác tối đa và phục vụ kịp thời nhu cầu của bạn đọc gần xa. Hiện nay, VIVOBOOK đang là nhà phát hành cho các tập đoàn xuất bản lớn của Anh, Mỹ như NXB McGraw-Hill, Pearson Education, Cengage Learning, John Wiley…. Đến với cửa hàng sách ngoại văn của VIVOBOOK bạn đọc sẽ tìm thấy hàng loạt các loại sách chuyên ngành bao gồm các thể loại đa dạng thuộc các lĩnh vực Kinh tế, Tin học, Y học, Kiến trúc, Hội họa, Khoa học kỹ thuật và các loại sách tham khảo khác.

Với phương châm phục vụ quý khách ngày càng tốt hơn, Công ty VIVOBOOK sẽ nỗ lực và phấn đấu hơn nữa để mang đến cho bạn đọc nhiều sách hay, sách tốt nên không chỉ ở Nhà sách Xuân Thu, Tân Định, Sài Gòn là nơi phát hành sách đầy đủ sách ngoại văn mà trong một tương lai không xa, bạn đọc có thể tìm mua bất kỳ các tựa sách nước ngoài nào ở hầu hết các cửa hàng trực thuộc VIVOBOOK.

<br><strong>TẦM NHÌN VÀ PHƯƠNG HƯỚNG PHÁT TRIỂN CỦA THƯƠNG HIỆU VIVOBOOK TRONG TƯƠNG LAI</strong><br>

Từ 2005 đến nay, VIVOBOOK đã nhất quán và thực hiện thành công chiến lược xuyên suốt là xây dựng, phát triển Hệ thống Nhà sách chuyên nghiệp trên toàn quốc.Tính đến nay, sau hơn 6 năm thực hiện chiến lược, bên cạnh hệ thống gần 20 Nhà sách được hình thành từ năm 1976 và được phân bổ rộng khắp trên phạm vi TP.HCM, VIVOBOOK đã cơ bản hoàn thiện giai đoạn 1 trong kế hoạch phát triển mạng lưới ở khắp các tỉnh thành trên toàn quốc với thành tựu: gần 80% các tỉnh thành miền Nam và miền Trung đều có mặt ít nhất một Nhà sách VIVOBOOK. Một số tỉnh thành lớn đã có mặt Nhà sách thứ 2, thứ 3 của VIVOBOOK như: Bình Dương, Đồng Nai, Cần Thơ, Đà Nẵng, Hà Nội…

Tiếp tục định hướng hoạt động chuyên ngành và thực hiện chiến lược phát triển mạng lưới, từ năm 2013 – 2020 VIVOBOOK sẽ phát triển mạnh hệ thống Nhà sách tại các tỉnh thành phía Bắc. Hiện nay, Nhà sách VIVOBOOK đã có mặt tại Hà Nội, Hà Tĩnh, Vĩnh Phúc, Hải Phòng, Thanh Hóa.

Dự kiến 2020, Hệ thống Nhà sách VIVOBOOK sẽ có khoảng 100 Nhà sách trên toàn quốc. Tiếp tục giữ vững vị thế là hệ thống Nhà sách hàng đầu Việt Nam và nằm trong Top 10 nhà bán lẻ hàng đầu Việt Nam (tính cho tất cả các ngành hàng).

Dự án xây dựng Trung tâm sách tại TP.HCM với diện tích 5.000m² đến 10.000m², gồm đầy đủ các loại hình hoạt động về sách, phấn đấu xây dựng phong cách kinh doanh hiện đại, ngang tầm với các nước trong khu vực. VIVOBOOK sẽ là kênh tiêu thụ chính của các Nhà xuất bản, các Công ty Truyền thông Văn hóa và là đối tác tin cậy của các Nhà cung cấp trong và ngoài nước. Đồng thời VIVOBOOK giữ vũng vị trí Nhà nhập khẩu và kinh doanh sách ngoại văn hàng đầu Việt Nam.

SỨ MỆNH CỦA VIVOBOOK: “MANG TRI THỨC, VĂN HÓA ĐỌC ĐẾN VỚI MỌI NHÀ”!

VIVOBOOK là thương hiệu hàng đầu trong ngành Phát hành sách Việt Nam, ngay từ thời bao cấp cho đến thời kỳ kinh tế thị trường, đổi mới, hội nhập quốc tế, Công ty VIVOBOOK luôn khẳng định vị thế đầu ngành và được đánh giá cao trong quá trình xây dựng đời sống văn hóa, trước hết là văn hóa đọc của nước nhà. Là doanh nghiệp kinh doanh trên lĩnh vực văn hóa, Công ty VIVOBOOK có vai trò và vị thế trong việc giữ vững định hướng tư tưởng văn hóa của Nhà nước, góp phần tích cực vào việc đáp ứng nhu cầu đọc sách của Nhân dân Thành phố Hồ Chí Minh và cả nước; thể hiện toàn diện các chức năng kinh tế - văn hóa - xã hội. Thông qua các chủ trương và hoạt động như: duy trì một số Nhà sách ở các tỉnh có nền kinh tế chưa phát triển, công trình Xe sách Lưu động VIVOBOOK phục vụ bạn đọc ngoại thành tại các huyện vùng sâu, vùng xa, định kỳ tổ chức các Hội sách với nhiều quy mô lớn nhỏ khác nhau… chứng minh rằng VIVOBOOK không chỉ quan tâm đến việc kinh doanh mà còn mang đến mọi người nguồn tri thức quý báu, góp phần không ngừng nâng cao dân trí cho người dân ở mọi miền đất nước, thể hiện sự hài hòa giữa các mục tiêu kinh doanh và hoạt động phục vụ xã hội của VIVOBOOK.

Hiện nay, Công ty VIVOBOOK đã và đang ngày càng nỗ lực hơn trong hoạt động sản xuất kinh doanh, tiếp tục góp phần vào sự nghiệp phát triển “văn hóa đọc”, làm cho những giá trị vĩnh hằng của sách ngày càng thấm sâu vào đời sống văn hóa tinh thần của xã hội, nhằm góp phần tích cực, đáp ứng yêu cầu nâng cao dân trí, bồi dưỡng nhân tài và nguồn nhân lực cho sự nghiệp công nghiệp hóa, hiện đại hóa đất nước, trong bối cảnh Thành phố Hồ Chí Minh và xã hội Việt Nam đang ngày càng hội nhập sâu rộng vào nền văn hóa, kinh tế tri thức của thế giới.

<br><strong>BẢNG VÀNG THÀNH TÍCH VIVOBOOK ĐÃ ĐẠT ĐƯỢC TỪ NĂM 2008 - 2012 TRONG HOẠT ĐỘNG SẢN XUẤT KINH DOANH VÀ CÔNG TÁC XÃ HỘI</strong><br>

 Cờ Thi đua của Chính phủ – Thủ tướng Chính phủ – ngày 28/4/2008.
Cờ thi đua Đơn vị xuất sắc năm 2008 của UBND TP.HCM.
Đạt giải thưởng « Sao vàng Phương Nam » và giải thưởng “Top 100 Sao vàng Đất Việt” của Ủy ban Trung ương Hội các nhà  doanh nghiệp Trẻ Việt Nam năm 2008.
Bằng khen của Bộ trưởng Bộ Thông tin & truyền thông hoàn thành tốt nhiệm vụ phát hành xuất bản phẩm năm 2008.
Top 500 nhà bán lẻ hàng đầu Châu Á – Thái Bình Dương do Tạp chí Bán lẻ Châu Á (Singapore) bình chọn năm 2009.
Top 10 Doanh nghiệp bán lẻ hàng đầu Việt Nam do tạp chí Retail Asia 2008 bình chọn.
Top Trade Services 2008 do Bộ Công Thương trao tặng.
Là doanh nghiệp phát hành sách duy nhất trong 10 doanh nghiệp bán lẻ hàng đầu Việt Nam được bình chọn nằm trong Top 500 nhà bán lẻ hàng đầu khu vực Châu Á - Thái Bình Dương do tạp chí Retail Asia năm 2009.
Top 500 doanh nghiệp lớn nhất Việt Nam VNR500 do Vietnamnet xếp hạng.
Giải thưởng Sao vàng đất Việt 2009  - Top 200 thương hiệu Việt Nam do TW Đoàn TNCS TP.HCM & Hội các Nhà Doanh Nghiệp Trẻ trao tặng.
Tổng Giám Đốc Phạm Minh Thuận được tặng Danh hiệu Doanh nhân Sài Gòn tiêu biểu năm 2009.
Cờ thi đua Đơn vị xuất sắc năm 2009 của UBND TP.HCM.
Cờ thi đua Đơn vị xuất sắc dẫn đầu phong trào thi đua năm 2009 của Bộ Thông tin – Truyền thông.
Thương hiệu Việt yêu thích nhất 2010 (do bạn đọc báo Sài Gòn Giải Phóng bình chọn).
Giải thưởng Sao vàng đất Việt 2010 – Top 200 thương hiệu Việt Nam do TW Đoàn TNCS TP.HCM & Hội các Nhà Doanh Nghiệp Trẻ trao tặng.
Cờ thi đua Đơn vị Xuất Sắc Năm 2010 của Bộ Thông Tin Truyền Thông trao tặng.
Cờ thi đua Đơn vị Xuất Sắc Năm 2010 của Uy Ban Nhân Dân TP.HCM trao tặng.
Top 100 Doanh Nghiệp Thương mại – Dịch Vụ Tiêu Biểu 2010 – VietNam Top Trade Service Award 2010.
Giải thưởng sao vàng đất Việt 4 năm liền từ 2008 đến 2011.
Giải thưởng Thương hiệu Việt được yêu thích nhất 2010, 2011.
Xe sách lưu động: Bằng khen của Ban Tuyên Giáo Trung ương năm 2011.
Top 50 Nhãn hiệu nổi tiếng, Top 500 doanh nghiệp lớn nhất Việt nam 2011.
Doanh nhân Sài Gòn tiêu biểu 2011.
Danh hiệu Hàng Việt Nam chất lượng cao 12 liền từ 2000 đến 2012.
Năm 2012, VIVOBOOK được Thủ tướng chính phủ tặng bằng khen vì đã có thành tích trong công tác tổ chức Hội sách TP.Hồ Chí Minh liên tục nhiều năm qua.
Top 500 nhà bán lẻ hàng đầu Châu Á – Thái Bình Dương, Top 10 Nhà bán lẻ hàng đầu Việt Nam do Tạp chí Bán lẻ Châu Á (Singapore) bình chọn.
            </p>
        </header>
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-sm mb-0 text-muted">Miễn phí giao hàng toàn quốc</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Hỗ trợ 24/7</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">KHUYẾN MÃI</h6>
                      <p class="text-sm mb-0 text-muted">Giảm giá các sản phẩm</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Làm bạn nhé</h5>
                <p class="text-sm text-muted mb-0">Hãy trở thành viên của chúng tôi</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group">
                    <input class="form-control form-control-lg" type="email" placeholder="Nhập vào email của bạn" aria-describedby="button-addon2">
                    <button class="btn btn-dark" id="button-addon2" type="submit">ĐĂNG KÝ</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
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