<aside class="side-menu">
	<p class="side-menu-bar">Danh mục sách</p>
	<ul style="margin-top: 0px">
		<?php 
			$danhmuc = getDanhMuc($conn,"");
			foreach ($danhmuc as $row) {
		?>
		<li><a href="danhmuc.php?dm=<?php echo $row['madm'] ?>"><?php echo $row['tendm'] ?></a></li>
		<?php
			}
		?>	
	</ul>
</aside>