<?php 
	include('../includes/connection.php');
  include('../includes/adminheader.php');
  include('../repositories/adminRepo.php');
  session_start();
  $error = "";

  // chưa đăng nhập
  if (!isset($_SESSION['username'])) {
  	// đã submit form
    if (isset($_POST['submit'])) {
      $user = $_POST['username'];
      $pass = $_POST['password'];

      if (empty($user) || empty($pass)) {
      	// chưa điền username và password
        $error = 'Nhập tên và mật khẩu để tiếp tục.';
      } else {
      	// đã điền username và password
        $admin = getAdmin($conn, $user, $pass);
        if (count($admin) != 1) {
        	// đăng nhập không thành công
          $error = 'Tên hoặc mật khẩu không chính xác.';
        } else {
        	// đăng nhập thành công
          // tạo session và cookies cho user
          $row = $admin[0];
          $_SESSION['username'] = $row['username'];
          setcookie('username', $row['username'], time() + (60*60));  // 1 tieng
          // chuyển hướng sang homepage
          header('Location: index.php');
        }
      }
    }
  }

  // đã đăng nhập
  if (!empty($_SESSION['username'])) {
    // chuyển hướng sang homepage
    header('Location: index.php');
  } else {
    // session của username empty
    // in form login
?>
<div id="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset style="text-align: center;">
			<legend>&nbsp;&nbsp;Đăng nhập trang quản lý&nbsp;&nbsp;</legend>
				<table>
					<tr>
            <td><input type="text" class="field" name="username" placeholder="Username"></td>
          </tr>
					<tr>
            <td><input type="password" class="field" name="password" placeholder="Password"></td>
          </tr>
				</table>
				<p style="text-align: left"><input type="checkbox">Nhớ mật khẩu</p>
				<p style="text-align: right"><input type="submit" value="Đăng nhập" name="submit"></p>
		</fieldset>
	</form>
  <p class="error"><?php echo $error ?></p>
</div>
<?php
  }
  include('../includes/adminfooter.php');
  // session_destroy();
?>
