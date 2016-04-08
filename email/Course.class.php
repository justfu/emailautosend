<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2016/3/31
 * Time: 15:39
 */

class Course{
    private $id;//每个课程记录的id号
    private $week;//星期数
    private $am1;//上午第一节的课表
    private $am2;//上午第二节课的课表
    private $pm1;//下午第一节课的课表
    private $pm2;//下午第二节课的课表
    private $evening;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * @param mixed $week
     */
    public function setWeek($week)
    {
        $this->week = $week;
    }

    /**
     * @return mixed
     */
    public function getAm1()
    {
        return $this->am1;
    }

    /**
     * @param mixed $am1
     */
    public function setAm1($am1)
    {
        $this->am1 = $am1;
    }

    /**
     * @return mixed
     */
    public function getAm2()
    {
        return $this->am2;
    }

    /**
     * @param mixed $am2
     */
    public function setAm2($am2)
    {
        $this->am2 = $am2;
    }

    /**
     * @return mixed
     */
    public function getPm1()
    {
        return $this->pm1;
    }

    /**
     * @param mixed $pm1
     */
    public function setPm1($pm1)
    {
        $this->pm1 = $pm1;
    }

    /**
     * @return mixed
     */
    public function getPm2()
    {
        return $this->pm2;
    }

    /**
     * @param mixed $pm2
     */
    public function setPm2($pm2)
    {
        $this->pm2 = $pm2;
    }

    /**
     * @return mixed
     */
    public function getEvening()
    {
        return $this->evening;
    }

    /**
     * @param mixed $evening
     */
    public function setEvening($evening)
    {
        $this->evening = $evening;
    }//晚上第一节课的课表


}