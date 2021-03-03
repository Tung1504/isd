<?php
  include('../includes/connection.php');
  include('../includes/adminheader.php');
  include('../repositories/danhmucRepo.php');
  include('../repositories/sanphamRepo.php');
  session_start();

  // chưa đăng nhập
  if (!isset($_SESSION['username'])) {
    // chuyển hướng sang trang login
    header('Location: login.php');
  } else {
    // đã đăng nhập
?>
<div id="container">
  <?php 
    include('../includes/adminsidemenu.php');
  ?>
  <div class="main" style="border: solid; height: 225px">
    <h2>Thống kê</h2><hr>
    <p>Danh mục: 
      <?php 
        echo count(getDanhMuc($conn,"")); // số lượng danh mục 
      ?>
    </p>
    <p>Sản phẩm: 
      <?php 
        echo count(getSanPham($conn,"")); // số lượng sản phẩm
      ?>
    </p>
  </div>
</div>
<?php
  }
  include('../includes/adminfooter.php');
  // session_destroy();
?>