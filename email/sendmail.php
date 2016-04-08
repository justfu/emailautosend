<?php


	require_once "email.class.php";
    require_once 'CourseService.class.php';
    require_once 'UserService.class.php';


//    $class=array(
//      '周一'  => array(
//          '上午第一节' => '网络程序设计--A504',
//          '上午第二节' => '无线网络与移动计算--D503',
//          '下午第一节' => '现代交换原理与通信技术--D403',
//          '下午第二节' => '招聘与就业指导--恩~ 这个不知道在哪里'
//      ),
//      '周二' => array(
//          '上午第一节' => '网络规划与设计--B205',
//          '上午第二节' => 'TCP/IP原理与应用--D503',
//      ),
//      '周三' => array(
//          '上午第一节' => '无限网络与计算--D503',
//          '上午第二节' => '现代交换原理与通信技术--D502',
//          '下午第一节' => '',
//          '下午第二节' => '',
//          '晚上第一节' => '文献检索--E413'
//      ),
//      '周四' => array(
//          '上午第一节' => 'TCP/IP原理与应用--D503',
//          '上午第二节' => '网络规划与设计--B202',
//      ),
//      '周五' => array(
//          '上午第一节' => '',
//          '上午第二节' => '网络程序设计--D101'
//      )
//    );



       // send('test','test','1034996580@qq.com');


   function getWeek(){
       $date=date('N');
       switch($date){
           case 1:
               return '周一';
               break;
           case 2:
               return '周二';
               break;
           case 3:
               return '周三';
               break;
           case 4:
               return '周四';
               break;
           case 5:
               return '周五';
               break;
           case 6:
               return '周六';
               break;
           case 7:
               return '周日';
               break;
       }
   }

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

    function getinfo($class){
        $classinfo="<style>*{font-family: '微软雅黑' }td{border: 2px black solid;padding: 20px 20px}</style>";
        $classinfo.="<table style='border: 2px black solid;border-collapse: collapse'>";
        foreach($class as $key => $value){
            $key=changeWeek($key);
            if($value==""){
                $value="么得课哦~~~";
            }
            $classinfo.="<tr><td style='border: 2px black solid;padding: 20px 20px;'>$key</td><td style='border: 2px black solid;padding: 20px 20px;'>$value</td></tr>";
        }
        $classinfo.="</table>";
        return $classinfo;
    }




//    if(getWeek()!=null){
//        $info.=getinfo($class,getWeek())."<br/><br/>";
//    }else{
//        $info.="周末high起来 没有课！！！！！！！！<br/><br/>";
//    }



    $title="A new day has begun";


    $userService=new UserService();
    $courseService=new CourseService();
	
    while(1) {

        $nowdate=date('G');


        if($nowdate==17) {

            $classes = $userService->getClass();


            foreach ($classes as $class) {

                $api1 = "http://www.tuling123.com/openapi/api?key=3d0d4d7481124c29ce0aaa3c6dbc8856&info=%E4%BB%8A%E5%A4%A9%E7%9A%84%E6%B9%98%E6%BD%AD%E5%A4%A9%E6%B0%94";
                $api2 = "http://www.tuling123.com/openapi/api?key=3d0d4d7481124c29ce0aaa3c6dbc8856&info=%E7%AC%91%E8%AF%9D";
                $tianqiinfo = file_get_contents($api1);
                $xiaohua = file_get_contents($api2);
                $tq = json_decode($tianqiinfo);
                $xh = json_decode($xiaohua);

                $info = "&nbsp;美好的一天开始了,开开开心迎接这一天~~~~<br/><br/>";
                $info .= "最近的天气:&nbsp;" . $tq->text . "<br/><br/>";
                $info .= "&nbsp;这是今天的课表↓↓↓";


                $res = $courseService->getCourseByWeek(getWeek(), $class['u_class']);


                if (!empty($res)) {
                    $classinfo = getinfo($res[0]);
                } else {
                    $classinfo = "<p style='color: deepskyblue'><br/><br/>&nbsp;&nbsp;今天没课哦！！</p><br/>";
                }


                $info .= $classinfo;

                $info .= "<br/><br/>&nbsp;&nbsp;看个笑话开心下↓↓↓<br/><br/>";
                $info .= "&nbsp;" . $xh->text . "<br/><br/>";
                $time = date("Y-m-d H:i:s");
                $info .= "<p style='float: right;margin-right: 30px;'>{$time}</p><br/><br/>";

                $users = $userService->getPersonalinfo($class['u_class']);


                foreach ($users as $user) {
                    // echo $info;
                    send($title, $info, $user['u_email']);
                }

            }
        }

        sleep(60*50);
    }


    function changeWeek($time){
        switch($time){
            case 'c_am1':
                return '上午第一节';
                break;
            case 'c_am2':
                return '上午第二节';
                break;
            case 'c_pm1':
                return '下午第一节';
                break;
            case 'c_pm2':
                return '下午第二节';
                break;
            case 'c_evening':
                return '晚上第一节';
                break;
            default:
                return null;
                break;
        }
    }

//echo $info;

    //$emailto='1034996580@qq.com';
    //send($title,$info,$emailto);

//    while(1){
//        $nowdate=date('G');
//        if($nowdate==15){
//            send($title,$info,$emailto);
//            send($title,$info,$emailto);
//
//        }
//        sleep(60*30);
//    }


?>