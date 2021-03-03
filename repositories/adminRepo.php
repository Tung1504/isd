<?php 
	/**
	 * cung cap ham truy xuat du lieu admin
	 */
	
	/**
	 * lay ra tai khoan voi username va password
	 */
	function getAdmin($conn, $user, $pass) {
		$sql = "SELECT `username` FROM admin 
						WHERE `username` = '$user' 
						AND `password` = '$pass'";
		return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
	
?>