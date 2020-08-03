<form action="api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="ct">新增標題區圖片</h3>
    標題區圖片：<input type="file" name="name"><br>
    標題區替代文字：<input type="text" name="text"><br>
    <input type="hidden" name="table" value="<?=$_GET['do'];?>">
    <button>新增</button><button type="reset">重置</button>
</form>
