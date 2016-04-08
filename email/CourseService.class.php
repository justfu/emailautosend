<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/3/31
 * Time: 15:40
 */
require_once 'SqlHelper.class.php';
require_once 'Course.class.php';
class CourseService{

    /*
     * 获得课程信息
     *@param1 string $class 班级
     *return 获得当前班级的课程表安排
     */
    public function getCourse($class){
        $sqlHelper=new SqlHelper();
        $sql="select * from computer_class where c_class=$class";
        $res=$sqlHelper->dql_arr($sql);
        if($res){
            return $res;
        }else{
            return null;
        }
    }

    public function getCourseByWeek($week,$class){
        $sqlHelper=new SqlHelper();
        $sql="select c_am1,c_am2,c_pm1,c_pm2,c_evening from computer_course where c_class='$class' and c_week='$week'";
        $res=$sqlHelper->dql_arr($sql);
        if($res){
            return $res;
        }else{
            return null;
        }
    }



}