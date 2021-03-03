<?php 
	include('../includes/connection.php');
  include('../repositories/danhmucRepo.php');
  include('../repositories/sanphamRepo.php');

  if (isset($_POST['tendm'])) {
  	themDanhMuc($conn, $_POST['tendm']);
    $target = '/quanlidm.php';  // lưu trang trước đó
  } elseif (isset($_POST['tensp'])) {
  	themSanPham($conn, $_POST['tensp'], $_POST['madm'], $_POST['giaban'], 
      $_POST['tentg'], $_POST['namxb'], $_POST['soluong'], 
      $_POST['mota'], $_POST['ngaydang'], $_FILES['hinhanh']['name']);
    $target = '/quanlisp.php';  // lưu trang trước đó
  }
  // quay về trang trước
  header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).$target);
	
?>