<form action="api/submenu.php" method="post" enctype="multipart/form-data">
    <h3 class="ct">編輯次選單</h3>
    <table id="addHere">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結操址</td>
            <td>刪除</td>
        </tr>
        <?php
        include_once "../base.php";
        $parent = $_GET['parent'];
        $table = $_GET['do'];
        $db = new DB($table);
        $rows = $db->all(['parent' => $parent]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><input type="text" name="name" value="<?= $row['name']; ?>"></td>
                <td><input type="text" name="text" value="<?= $row['text']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </tr>
        <?php } ?>
    </table>
    <input type="hidden" name="parent" value="<?= $_GET['parent']; ?>">
    <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
    <button>修改確定</button><button type="reset">重置</button><button type="button" id="more">更多次選單</button>
</form>
<script>
    $("#more").on("click", function() {
        let el = `<tr>
            <td><input type="text" name="name2[]"></td>
            <td><input type="text" name="text2[]"></td>
        </tr>
        `;
        $("#addHere").after(el);
    })
</script>