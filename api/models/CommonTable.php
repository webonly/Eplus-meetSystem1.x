<?php

namespace api\models;

use Yii;
use app\models\LinshiCourseTime;

/**
 * This is the model class for table "{{%linshi_appointment}}".
 *
 * @property integer $appointment_id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property string $raw_add_time
 * @property string $teacher_name
 */
class CommonTable extends \yii\db\ActiveRecord
{
    /**
     * 计算两个坐标之间的距离(米)
     * @param float $fP1Lat 起点(纬度)
     * @param float $fP1Lon 起点(经度)
     * @param float $fP2Lat 终点(纬度)
     * @param float $fP2Lon 终点(经度)
     * @return int
     */
    public static function distanceBetween($fP1Lat, $fP1Lon, $fP2Lat, $fP2Lon){
        $fEARTH_RADIUS = 6378137;
        //角度换算成弧度
        $fRadLon1 = deg2rad($fP1Lon);
        $fRadLon2 = deg2rad($fP2Lon);
        $fRadLat1 = deg2rad($fP1Lat);
        $fRadLat2 = deg2rad($fP2Lat);
        //计算经纬度的差值
        $fD1 = abs($fRadLat1 - $fRadLat2);
        $fD2 = abs($fRadLon1 - $fRadLon2);
        //距离计算
        $fP = pow(sin($fD1/2), 2) +
            cos($fRadLat1) * cos($fRadLat2) * pow(sin($fD2/2), 2);
        return intval($fEARTH_RADIUS * 2 * asin(sqrt($fP)) + 0.5);
    }

    public static function getAllBySql($table,$columArr=array(),$whereArr=array()){
        if (isset($whereArr['r'])){
            unset($whereArr['r']);
        }
        $columStr = !empty($columArr) ? implode(',',$columArr) : '*';
        $where = implode(',',$whereArr);
        return static::findBySql("SELECT $columStr FROM {{%".$table."}} WHERE `member_id` in ($where)")
            ->all();
    }

    //生成唯一订单号
    public static function getOrderCode(){
        @date_default_timezone_set("PRC");
        $order_id_main = date('YmdHis') . rand(10000000, 99999999);
        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;
        for ($i = 0; $i < $order_id_len; $i++) {
            $order_id_sum += (int)(substr($order_id_main, $i, 1));
        }
        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        return $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT);
    }


    //处理被选择的时间
    public static function handle_selected_time($strTime,$totalTime){
        $timeArr = explode('_',$strTime);
        $times = array();
        $i = 0;
        foreach($timeArr as $tm) {
            $arr = explode('|',trim($tm));
            $k = trim($arr[0]);
            if (!empty($arr[1])){
                $i = $i + count(explode(',',$arr[1]));
                $times[$k] = explode(',',$arr[1]);
            }
        }
        $n1 = floatval($i/2);
        $n2 = floatval($totalTime);

        if ($n1 <> $n2){
            return '555';
        }
        $keysDateArr = !empty($times) ? array_keys($times) : '';
        sort($keysDateArr);
        $minStartTime = array();
        foreach($times[$keysDateArr[0]] as $t){
            $tt = explode('-',$t);
            if (!empty($tt)){
                $minStartTime[] = trim($tt[0]);
            }
        }
        sort($minStartTime);

        $maxEndTime = array();
        foreach($times[end($keysDateArr)] as $t){
            $tt = explode('-',$t);
            if (!empty($tt)){
                $maxEndTime[] = trim($tt[1]);
            }
        }
        sort($maxEndTime);
        $beginTime = date('Y-m-d',strtotime($keysDateArr[0])).' '.$minStartTime[0];
        $endTime = date('Y-m-d',strtotime(end($keysDateArr))).' '.end($maxEndTime);
        return array(
                       'times' => $times,
                       'beginTime'=>$beginTime,
                       'endTime'=>$endTime
                      );
    }

    //处理课时
    public static function handle_course_time($totalClassTime,$beginClassTime)
    {
        $time1 = time()-strtotime($beginClassTime);
        if (intval($time1/3600)>=$totalClassTime){
            return $totalClassTime;
        }
        return round(floatval($time1/3600),2);
    }
}
