<form action="api/upload.php" method="post" enctype="multipart/form-data">
    <h3 class="ct">更新圖片</h3>
    標題區圖片：<input type="file" name="name"><br>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="hidden" name="table" value="<?=$_GET['do'];?>">
    <button>更新</button><button type="reset">重置</button>
</form>
