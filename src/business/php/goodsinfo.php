<?php
// xf-sjinfo.shtml
// 编辑菜品页  显示菜品信息
session_start();
sleep(1);
header("content-type:text/html;charset=utf-8");
$arr=json_decode(file_get_contents('php://input'),true);//获取前端通过POST传递的原始数据，然后转换为数组
// $sjId=$_POST['sjId'];
include("../../common/php/conn.php");
$sjId=$_SESSION['sjId'];
// echo $sjId;
$rs=mysql_query("select caiId,caiName,caiStyle,caiPrice,hePrice,dang,da,caiImg,styleName,time from foodmenu,foodstyle where foodmenu.caiStyle=foodstyle.styleId and foodmenu.sjId='".$sjId."'");
$num=mysql_num_rows($rs);
while($arr=mysql_fetch_array($rs)){
    echo '{"caiId":"'.$arr['caiId'].'","caiName":"'.$arr['caiName'].'","caiStyle":"'.$arr['caiStyle'].'","caiPrice":"'.$arr['caiPrice'].'","hePrice":"'.$arr['hePrice'].'","dang":"'.$arr['dang'].'","max":"'.$arr['da'].'","styleName":"'.$arr['styleName'].'","caiImg":"'.$arr['caiImg'].'","time":"'.$arr[time].'"};';
}
?>