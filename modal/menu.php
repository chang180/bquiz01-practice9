<form action="api/add.php" method="post" enctype="multipart/form-data">
    <h3 class="ct">新增主選單</h3>
    選單名稱：<input type="text" name="name"><br>
    連結網址：<input type="text" name="text"><br>
    <input type="hidden" name="table" value="<?=$_GET['do'];?>">
    <button>新增</button><button type="reset">重置</button>
</form>
