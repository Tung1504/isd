<?php 
	/**
	 * cung cấp hàm truy xuất/cập nhật dữ liệu sản phẩm
	 */

	/**
	 * nếu $masp empty
	 *   lấy thông tin tất cả sản phẩm
	 * nếu ko
	 *   lấy thông tin sản phẩm tương ứng
	 */
	function getSanPham($conn, $masp) {
		if (empty($masp))
			$sql = "SELECT * FROM `sanpham`";
		else
			$sql = "SELECT * FROM `sanpham` 
							WHERE `masp` = $masp";
		return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/** 
	 * lấy sản phẩm của 1 danh mục
	 */
	function getSanPhamDanhMuc($conn, $madm) {
		$sql = "SELECT * FROM `sanpham` 
						WHERE `madm` = $madm ";
		return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/** 
	 * homepage: lấy sách mới
	 */
	function getSachMoi($conn) {
		$sql = "SELECT * FROM `sanpham` 
						ORDER BY `ngaydang` DESC 
						LIMIT 6";
		return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * thêm sản phẩm $tensp vào db
	 */
	function themSanPham($conn, $tensp, $madm, $giaban, $tentg, $namxb, $soluong, $mota, $ngaydang, $hinhanh) {
		$sql = "INSERT INTO `sanpham`(
								`madm`, `tensp`, `giaban`, 
								`hinhanh`, `tentg`, `namxb`, 
								`soluong`, `mota`, `ngaydang`) 
						VALUES (
								:madm, :tensp, :giaban,
								:hinhanh, :tentg, :namxb,
								:soluong, :mota, :ngaydang)";
		// đưa ảnh được upload vào folder images
		move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/".$hinhanh);
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':madm', $madm);
		$stmt->bindParam(':tensp', $tensp);
		$stmt->bindParam(':giaban', $giaban);
		$stmt->bindParam(':hinhanh', $hinhanh);
		$stmt->bindParam(':tentg', $tentg);
		$stmt->bindParam(':namxb', $namxb);
		$stmt->bindParam(':soluong', $soluong);
		$stmt->bindParam(':mota', $mota);
		$stmt->bindParam(':ngaydang', $ngaydang);
		$stmt->execute();
	}

	/**
	 * sửa thông tin sản phẩm $masp
	 */
	function suaSanPham($conn, $masp, $tensp, $madm, $giaban, $tentg, $namxb, $soluong, $mota, $ngaydang, $hinhanh) {
		$sql = "UPDATE `sanpham`
						SET `madm` = :madm, `tensp` = :tensp, `giaban` = :giaban,
								`hinhanh` = :hinhanh, `tentg` = :tentg, `namxb` = :namxb,
								`soluong` = :soluong, `mota` = :mota, `ngaydang` = :ngaydang
						WHERE `masp` = :masp";
		// đưa ảnh được upload vào folder images
		move_uploaded_file($_FILES['hinhanh']['tmp_name'], "../images/".$hinhanh);
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':madm', $madm);
		$stmt->bindParam(':tensp', $tensp);
		$stmt->bindParam(':giaban', $giaban);
		$stmt->bindParam(':hinhanh', $hinhanh);
		$stmt->bindParam(':tentg', $tentg);
		$stmt->bindParam(':namxb', $namxb);
		$stmt->bindParam(':soluong', $soluong);
		$stmt->bindParam(':mota', $mota);
		$stmt->bindParam(':ngaydang', $ngaydang);
		$stmt->bindParam(':masp', $masp);
		$stmt->execute();
	}

	/**
	 * xóa sản phẩm $tensp khỏi db
	 */
	function xoaSanPham($conn, $tensp) {
		$stmt = $conn->query("SELECT * FROM `sanpham` WHERE `tensp` = '$tensp'");
		foreach ($stmt as $row) 
			unlink("../images/".$row[4]);		// xóa ảnh của sản phẩm
		
		$sql = "DELETE FROM `sanpham`
						WHERE `tensp` = '$tensp'";
		$conn->query($sql);
	}

?>