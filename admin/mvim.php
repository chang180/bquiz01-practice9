<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動畫圖片管理</p>
	<form method="post" action="api/edit.php" enctype="multipart/form-data">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="65%">動畫圖片</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td></td>
				</tr>
				<?php

				$table = $do;
				$db = new DB($table);
				$rows = $db->all();
				foreach ($rows as $row) {
				?>
					<tr>
						<td><img src="img/<?= $row['name']; ?>" style="height:68px;width=100px;"></td>
						<td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
						<td><input type="button" onclick="op('#cover','#cvr','modal/upload_<?= $table; ?>.php?do=<?= $table; ?>&id=<?= $row['id']; ?>')" value="更換動畫"></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<input type="hidden" name="table" value="<?= $table; ?>">
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?= $table; ?>.php?do=<?= $table; ?>')" value="新增動畫圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>