<?php
class Cart {
	private $cartID;
	private $sanpham = array();	// có dạng array( $masp1 => $soluong1, $masp2 => $soluong2, ...)
	
	/**
	 * Khởi tạo giỏ hàng
	 */
	public function __construct($cartID = '') {
		if (!session_id())
			session_start();

		if (!empty($cartID))
			$this->cartID = $cartID;
		else
			$this->cartID = '_cart';
		
		$this->read();
	}

	/**
	 * Lấy mảng các sản phẩm trong giỏ
	 */
	public function getSanPham() {
		return $this->sanpham;
	}

	/**
	 * Lấy tổng số sản phẩm trong giỏ
	 */
	public function getTongSo() {
		$this->read();
		$tong = 0;
		foreach ($this->sanpham as $masp => $soluong)
			$tong += $soluong;
		
		return $tong;
	}

	/**
	 * Thêm vào giỏ
	 */
	public function add($masp, $soluong = 1) {
		if (isset($this->sanpham[$masp]))
			$this->sanpham[$masp] += $soluong;
		else
			$this->sanpham[$masp] = $soluong;
		
		$this->write();
	}

	/**
	 * Xóa khỏi giỏ
	 */
	public function remove($masp) {
		unset($this->sanpham[$masp]);
		$this->write();
	}

	/**
	 * Xóa tất cả khỏi giỏ
	 */
	public function clear() {
		$this->sanpham = array();
		$this->write();
	}

	/**
	 * Xóa session và cookie của giỏ
	 */
	public function destroy() {
		unset($_SESSION[$this->cartID]);
		setcookie($this->cartID, '', time()-86400);
		$this->sanpham = array();
	}

	/**
	 * Lưu thông tin giỏ hàng vào session/cookie
	 */
	private function write() {
		$_SESSION[$this->cartID] = '';
		foreach ($this->sanpham as $masp => $soluong) 
			$_SESSION[$this->cartID] .= $masp.','.$soluong.';';
		// $_SESSION[$this->cartID] = '$masp1,$soluong1;$masp2,$soluong2;'

		$_SESSION[$this->cartID] = rtrim($_SESSION[$this->cartID], ';');
		// $_SESSION[$this->cartID] = '$masp1,$soluong1;$masp2,$soluong2'
		setcookie($this->cartID, $_SESSION[$this->cartID], time() + 604800);
	}

	/**
	 * Lấy thông tin giỏ hàng từ session/cookie
	 */
	private function read() {
		$listItem = '';
		if (isset($_COOKIE[$this->cartID]))			// dung cookie
			$listItem = $_COOKIE[$this->cartID];
		if (isset($_SESSION[$this->cartID]))		// dung session
			$listItem = $_SESSION[$this->cartID];
		// $listItem = '$masp1,$soluong1;$masp2,$soluong2;...'
		
		$sanpham = explode(';', $listItem);
		// $sanpham = array( '$masp1,$soluong1', '$masp2,$soluong2', ... )
		foreach ($sanpham as $item) {
			// $item = '$masp1,$soluong1'
			if (empty($item))
				continue;		// chuyển tới item tiếp theo
			else {
				$array = explode(',', $item);
				// $array = array( '$masp1', '$soluong1')
				list($masp, $soluong) = $array;
				$this->sanpham[$masp] = $soluong;
			}
		}
	}
}
?>
