<?php  
	/**
	 * cung cấp hàm truy xuất/cập nhật dữ liệu danh mục
	 */

	/**
	 * nếu $madm empty
	 *   lấy thông tin tất cả danh mục
	 * nếu ko
	 *   lấy thông tin danh mục tương ứng
	 */
	function getDanhMuc($conn, $madm) {
		if (empty($madm))
			$sql = "SELECT * FROM `danhmuc`";
		else
			$sql = "SELECT * FROM `danhmuc` 
							WHERE `madm` = $madm";
		return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * thêm danh mục $tendm vào db
	 */
	function themDanhMuc($conn, $tendm) {
		$sql = "INSERT INTO `danhmuc`(`tendm`)
						VALUES('$tendm')";
		$conn->query($sql);
	}

	/**
	 * sửa tên danh mục $madm
	 */
	function suaDanhMuc($conn, $madm, $tenmoi) {
		$sql = "UPDATE `danhmuc`
						SET `tendm` = '$tenmoi'
						WHERE `madm` = '$madm'";
		$conn->query($sql);
	}

	/**
	 * xóa danh mục $tendm khỏi db
	 */
	function xoaDanhMuc($conn, $tendm) {
		$sql = "DELETE FROM `danhmuc`
						WHERE `tendm` = '$tendm'";
		$conn->query($sql);
	}

?>