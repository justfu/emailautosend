<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/3/31
 * Time: 16:04
 */
require_once 'SqlHelper.class.php';
require_once 'User.class.php';
class UserService{

    /*
     * 获得个人信息
     *@param1 string $class 班级
     *return 获得当前班级的课程表安排
     */
    public function getPersonalinfo($class){
        $sqlHelper=new SqlHelper();
        $sql="select u_email from computer_user where u_class='$class'";
        $res=$sqlHelper->dql_arr($sql);
        if($res){
            return $res;
        }else{
            return null;
        }
    }

    public function getClass(){
        $sqlHelper=new SqlHelper();
        $sql="select u_class from computer_user where 1 group by u_class";
        $res=$sqlHelper->dql_arr($sql);
        return $res;
    }


}