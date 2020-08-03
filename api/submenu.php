<?php
include_once "../base.php";
$table = $_POST['table'];
$parent=$_POST['parent'];

$db=new DB($table);
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

if(!empty($_POST['name2'])){
    foreach($_POST['name2'] as $key=>$name){
        $row['name'] = $name;
        $row['text'] = $_POST['text2'][$key];
        $row['parent'] = $parent;
        $row['sh'] = 1;
        $db->save($row);
    }
}

to("../admin.php?do=".$table);