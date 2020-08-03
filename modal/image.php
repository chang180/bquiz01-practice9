<form action="api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="ct">新增校園映像圖片</h3>
    校園映像圖片：<input type="file" name="name"><br>
    <input type="hidden" name="table" value="<?=$_GET['do'];?>">
    <button>新增</button><button type="reset">重置</button>
</form>
