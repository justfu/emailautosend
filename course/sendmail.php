<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/3/31
 * Time: 22:12
 */
require_once 'email.class.php';
function send($title,$content,$mailto){
    $smtpserver = "smtp.mxhichina.com";//SMTP服务器
    $smtpserverport =25;
    $smtpusermail = "postmaster@iera.club";//SMTP服务器的用户邮箱
    $smtpemailto = $mailto;//发送给谁
    $smtpuser = "postmaster@iera.club";//SMTP服务器的用户帐号
    $smtppass = "Aa112200";//SMTP服务器的用户密码
    $mailtitle = $title;
    $mailcontent = $content;
    $mailtype = "HTML";
    $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
    $smtp->debug = false;
    $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
}