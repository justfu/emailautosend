<?php
   require_once 'SqlHelper.class.php';
   $sqlHelper=new SqlHelper();
   $sql="select c_class from computer_course where 1 group by c_class;";
   $courses=$sqlHelper->dql_arr($sql);

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>邮件预约</title>
    <link rel="stylesheet" href="./css/app.css" />
    <script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
</head>
<body>
    <div class="title">请填写以下信息来预约邮件</div>
    <div class="login">
        <form>
            <div class="tel"><input id="name" type="text" name="name" maxlength="10" placeholder="姓名或者昵称"></div>
            <div class="password"><input id="email" type="text" name="password" placeholder="邮箱地址"></div>
            <div class="class"> <select id="class_" name="class_">
                    <?php
                      foreach($courses as $course){
                          echo "<option value='{$course['c_class']}'>{$course['c_class']}</option>";
                      }
                    ?>
<!--                <option value="网络工程1301">网络工程1301</option>-->
<!--                <option value="网络工程1302">网络工程1302</option>-->
<!--                <option value="网络工程1401">网络工程1401</option>-->
<!--                <option value="网络工程1402">网络工程1402</option>-->
<!--                <option value="网络工程1501">网络工程1501</option>-->
<!--                <option value="网络工程1502">网络工程1502</option>-->
<!--                <option value="计算机科学与技术1301">计算机科学与技术1301</option>-->
<!--                <option value="计算机科学与技术1302">计算机科学与技术1302</option>-->
            </select></div>
            <div class="sub" id="sub"><button id="butt">预约</button></div>
        </form>
    </div>
    <div class="ps"><br>可能课表存在误差..请以实际课表为主<br/><br/>现在只支持选中的专业,更多专业敬请期待~~~</div>
</body>
</html>