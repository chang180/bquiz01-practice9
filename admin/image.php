<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">校園映像資料管理</p>
	<form method="post" action="api/edit.php" enctype="multipart/form-data">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="65%">校園映像資料圖片</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td></td>
				</tr>
				<?php

				$table = $do;
				$db = new DB($table);

				$rows = $db->all();
				$total = count($rows);
				$div = 3;
				$pages = ceil($total / $div);
				$now = $_GET['p'] ?? "1";
				$start = ($now - 1) * $div;
				$prev = (($now - 1) > 0) ? ($now - 1) : 1;
				$next = (($now + 1) <= $pages) ? ($now + 1) : $pages;
				$rows = $db->all([], " LIMIT $start,$div ");
				foreach ($rows as $row) {
				?>
					<tr>
						<td><img src="img/<?= $row['name']; ?>" style="width=100px;height:68px;"></td>
						<td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
						<td><input type="button" onclick="op('#cover','#cvr','modal/upload_<?= $table; ?>.php?do=<?= $table; ?>&id=<?= $row['id']; ?>')" value="更換動畫"></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="cent">
			<?php
			echo "<a href='?do=$table&p=$prev'> < </a>";
			for ($i = 1; $i <= $pages; $i++) {
				$font = ($now == $i) ? "30px" : "20px";
				echo "<a href='?do=$table&p=$i' style='font-size:$font'>$i</a>";
			}
			echo "<a href='?do=$table&p=$next'> > </a>";
			?>
		</div>
		<input type="hidden" name="table" value="<?= $table; ?>">
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?= $table; ?>.php?do=<?= $table; ?>')" value="新增校園映像資料"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>