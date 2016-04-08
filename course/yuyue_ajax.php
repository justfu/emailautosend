<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/3/31
 * Time: 21:51
 */
require_once 'SqlHelper.class.php';
require_once 'sendmail.php';
isset($_POST['name'])?($name=$_POST['name']):'';
isset($_POST['email'])?($email=$_POST['email']):'';
isset($_POST['class'])?($class=$_POST['class']):'';
if(empty($name)||empty($email)||empty($class)){
    echo "信息填写不完整!";
    exit;
}
$sqlHelper=new SqlHelper();
$sql="select count(*) from computer_user where u_email='$email'";
$res1=$sqlHelper->dql_arr($sql);
if(!empty($res1[0]['count(*)'])>0){
    echo "您已经预约过了哦,请勿重新预约!";
    exit;
}
$sql1="insert into computer_user values (null,'$name','$email','$class')";

$sqlHelper=new SqlHelper();
$res=$sqlHelper->dml($sql1);
if($res==1){
    echo "预约成功！敬请期待每天给你的邮件";
    $title="欢迎您订阅~~";
    $content="您好{$name}同学,谢谢您的订阅。。。每天七点到八点准时给您发送课表以及天气 笑话哦~~~~";
    send($title,$content,$email);
    exit;
}elseif($res==2){
    echo "预约失败!你可能已经预约过了,请不要重复预约!";
    exit;
}else{
    echo "预约失败!请联系管理员 1034996580@qq.com";
    exit;
}

