<form action="api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="ct">新增動態文字廣告</h3>
    動態文字廣告：<input type="text" name="text"><br>
    <input type="hidden" name="table" value="<?=$_GET['do'];?>">
    <button>新增</button><button type="reset">重置</button>
</form>
