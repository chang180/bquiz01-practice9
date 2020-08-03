<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="css.css" rel="stylesheet" type="text/css">
	<script src="jquery-1.9.1.min.js"></script>
	<script src="js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
		<a title="<?= $title['text']; ?>" href="index.php">
			<div class="ti" style="background:url('img/<?= $title['name']; ?>'); background-size:cover;"></div>
			<!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<?php
					$menus = $Menu->all(['parent' => 0]);
					foreach ($menus as $m) {
					?>
						<div class="mainmu"><a href="<?= $m['text']; ?>"><?= $m['name']; ?></a>
						<div class="mw">

							<?php
						$subs = $Menu->all(['parent' => $m['id']]);
						foreach ($subs as $s) {
							?>
							<div class="mainmu2"><a href="<?= $s['text']; ?>"><?= $s['name']; ?></a></div>
							<?php
						}
						?>
						</div>
						</div>
					<?php
					}
					?>

				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :
						<?= $total['total']; ?> </span>
				</div>
			</div>

			<?php
			$do = $_GET['do'] ?? "main";
			$file = "front/" . $do . ".php";
			include file_exists($file) ? $file : "front/main.php";
			?>
			<script>
// $(".mainmu").hover(function(){
// 	$(this).find(".mainmu2").toggle();
// });

				var lin = new Array();
				<?php
				$rows = $Mvim->all(['sh' => 1]);
				foreach ($rows as $row) {
				?>
					lin.push("img/<?= $row['name']; ?>");
				<?php
				}
				?>
				var now = 0;
				ww();
				if (lin.length > 1) {
					setInterval("ww()", 3000);
					now = 1;
				}

				function ww() {
					$("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
					//$("#mwww").attr("src",lin[now])
					now++;
					if (now >= lin.length)
						now = 0;
				}
			</script>
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="cent">
						<img src="icon/up.jpg" onclick="pp(1)">
						<?php
						$images = $Image->all(['sh' => 1]);
						foreach ($images as $key=>$row) {
						?>
							<div class="im" id="ssaa<?= $key; ?>"><img src="img/<?= $row['name']; ?>" style="width:150px;height:103px"></div>
						<?php
						}
						?>
						<img src="icon/dn.jpg" onclick="pp(2)">

					</div>

					<script>
						var nowpage = 0,
							num = <?= count($images); ?>;

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								// console.log("#ssaa" + t)
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;">
				<?= $bottom['bottom']; ?></span>
		</div>
	</div>

</body>

</html>