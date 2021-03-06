<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);
// print_r($_POST);

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {

        $db->del($id);
    } else {
        $row = $db->find($id);
        switch ($table) {
            case "title":
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = ($_POST['sh'] == $id) ? 1 : 0;
            break;
            case "menu":
                $row['name'] = $_POST['name'][$key];
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = in_array($id,$_POST['sh']) ? 1 : 0;
                break;
            case "ad":
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = in_array($id,$_POST['sh']) ? 1 : 0;
                break;
            case "admin":
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case "mvim":
                $row['sh'] = in_array($id,$_POST['sh']) ? 1 : 0;
                break;
            case "image":
                $row['sh'] = in_array($id,$_POST['sh']) ? 1 : 0;
                break;
            default:
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = in_array($id,$_POST['id']) ? 1 : 0;
                break;
        }
        $db->save($row);
    }
}
to("../admin.php?do=" . $table);
