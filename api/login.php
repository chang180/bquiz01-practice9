<?php
include_once "../base.php";
$chk=$Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk>0){
    $_SESSION['login']=1;
    to("../admin.php");
}else{
    echo "<script>
    alert('帳號或密碼輸入錯誤)');
    location.href='../index.php?do=login';
    </script>";
}