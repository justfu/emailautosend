<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/4/5
 * Time: 15:54
 */
require_once 'SqlHelper.class.php';
$sqlHelper=new SqlHelper();
isset($_POST['email'])?($email=$_POST['email']):'';
if(empty($email)){
    echo "请填写邮箱号!";
    exit;
}
$sql="select count(*) from computer_user where u_email='$email'";
$res=$sqlHelper->dql_arr($sql);
var_dump($res);
exit;
if(!empty($res)){
    echo "您已经预约过了哦,请勿重新预约!";
    exit;
}