<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;
use linslin\yii2\curl\Curl;


/**
 * 通用控制器
 */
class CommonController extends Controller
{
    private  $_effective_time = 40;
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function json_encode($data){
        header("Content-type:application/json; charset=utf-8");
        echo json_encode($data);
        exit;
    }

    /**
     * sCreater: miki
     * function：所有评价
     * @params teacher_id   教师ID
     * @params comment_type 课程类型ID
     * @return json
     */
    public function check_time($teacherId,$memberId,$date,$time=''){
        $time = !empty($time) ? explode(',',$time) : '';
        //验证过来的时候是否连续
        $times = array();
        foreach($time as $v){
            $r = !empty($this->course_time[$v]) ? $this->course_time[$v] : '';
            $times[]= $r;
        }
        $times = array_filter($times);

        //数据连续时间段效验成功
        if (!empty($times)) {
            foreach($times as $k => $value){
                if ((isset($times[$k+1]) && ($times[$k+1]!=$value+1))){
                    if (!in_array($times[$k+1]+1,$times)){
                        return array(
                            'error_code' => 1,
                            'error_msg' => "非连续时间段"
                        );
                    }
                }
            }
        }

        $strTimes = array();
        $keyStr = 's'.$teacherId.'_'.strtotime($date);
        $r = Yii::$app->cache->get($keyStr);
        //var_dump($r);
        $rv = json_decode($r,true);
        $key = strtotime($date);
        foreach($time as $timeStr){
            if (!empty($rv)&&isset($rv[$key])&&in_array($timeStr,$rv[$key])) {
                       if ($rv['member_id']!=$memberId){
                           $strTimes[]=$timeStr;
                       }else{//如果cache里存在，当前用户点的值，删除.
                           if (Yii::$app->cache->delete($keyStr)){
                               return array(
                                   'error_code' => 0,
                                   'error_msg' => "取消时间段成功"
                               );
                           }
                       }
            }
        }
        if (!empty($strTimes)) {
            return array(
                'error_code' => 1,
                'error_msg' => "以下时间段已被占",
                'data' => array($date=>$strTimes)
            );
        }
        $timeData = array(strtotime($date)=>$time,'member_id'=>$memberId);
        $dt = json_encode($timeData);
        Yii::$app->cache->set($keyStr,$dt,$this->_effective_time);
        return array(
            'error_code' => 0,
            'error_msg' => "记录时间段成功"
        );
    }



     //授权注册模式 POST /{org_name}/{app_name}/users
     public function registerHuanxinToken($nikename,$pwd)
     {
     	$formgettoken="https://a1.easemob.com/linshi/pls/users";
     	$body=array(
     		"username"=>$nikename,
     		"password"=>$pwd,
     	);
     	$patoken=json_encode($body);
     	$header = array($this->_get_token());
        $res = $this->_curl_request($formgettoken,$patoken,$header);
     	$arrayResult =  json_decode($res, true);
     	return $arrayResult ;
     }

     //先获取app管理员token POST /{org_name}/{app_name}/token
     public function _get_token()
     {
        	$formgettoken="https://a1.easemob.com/linshi/pls/token";
     	    $body=array(
            "grant_type"=>"client_credentials",
      	    "client_id"=>"YXA6KfIJEOi1EeSsavHiEi9hDA",
      	    "client_secret"=>"YXA65z6iSw7rSDkUaHqnO7SXy9UST2Q"
      	    );
     	$patoken=json_encode($body);
        $curl = new Curl();
        $res = $curl->post($formgettoken,$patoken);
     	$tokenResult =  !empty($res) ? json_decode($res, true) : '';
     	//var_dump($tokenResult);
     	return !empty($tokenResult["access_token"]) ? "Authorization: Bearer ". $tokenResult["access_token"] : '';
    }

     /**
     * sCreater: miki 
     * function：验证手机号
     * @params url 地址
     * @params body 请求内容
     * @params header 请求头部信息
     * @params method 方式
     * @return array
     */
     public function _curl_request($url, $body, $header = array(), $method = "POST")
     {
        array_push($header, 'Accept:application/json');
     	array_push($header, 'Content-Type:application/json');

     	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
     	curl_setopt($ch, CURLOPT_URL, $url);
     	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     	//curl_setopt($ch, $method, 1);

     	switch ($method){
         		case "GET" :
                 curl_setopt($ch, CURLOPT_HTTPGET, true);
     		     break;
                case "POST":
                curl_setopt($ch, CURLOPT_POST,true);
                break;
                case "PUT" :
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
                case "DELETE":
                curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
     		    break;
       }

            curl_setopt($ch, CURLOPT_USERAGENT, 'SSTS Browser/1.0');
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
            if (isset($body{3}) > 0) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
           }
            if (count($header) > 0) {
             curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
           }

          $ret = curl_exec($ch);
          $err = curl_error($ch);

         curl_close($ch);

         if ($err) {
             return $err;
          }
       return $ret;
    }


     /**
     * sCreater: miki 
     * function：验证手机号
     * @params mobile 手机号
     * @return boollean
     */
     public function checkMobile($mobile)
        {
            $pattern = "/^(13|15|18|14|17)\d{9}$/";
            if (preg_match($pattern,$mobile))
            {
                Return true;
            }
            else
            {
                Return false;
            }
        }

    /**
     * sCreater: miki 
     * function：处理课时
     * @params totalClassTime 课程总时间
     * @params beginClassTime 开始时间
     * @return float
     */
    public function handle_course_time($totalClassTime,$beginClassTime)
    {
        $time1 = time()-strtotime($beginClassTime);
        if ($time1>0 && intval($time1/3600)>=$totalClassTime){
            return $totalClassTime;
        }else{
            return 0;
        }
        return round(floatval($time1/3600),2);
    }

   /**
     * sCreater: miki 
     * function：获取两个日期之间的日期
     * @params startTime 开始时间
     * @params endTime 结束时间
     * @return array
     */
    public function prDates($startTime,$endTime){
        $dt_start = strtotime($startTime);
        $dt_end = strtotime($endTime);
        $dataArr = array();
        while ($dt_start<=$dt_end){
            $dataArr[] = date('Y-m-d',$dt_start);
            $dt_start = strtotime('+1 day',$dt_start);
        }
        return $dataArr;
    }

   /**
     * sCreater: miki 
     * function：将日志存入mongodb
     * @params $interfaceUrl 接口地址
     * @params $data 接口数据
     * @return bollean
     */
    public function write_log($interfaceUrl,$data){
		return true;
        $collection = Yii::$app->mongodb->getCollection(date('Y-m-d').'_linshi');
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        $collection->insert(['name' => $interfaceUrl,'server_url'=>'http://'.$_SERVER['SERVER_NAME'].'/', 'accept_data' => $data,'time'=>date('H:i:s')]);
    }


    /**
     * sCreater: miki 
     * function：比较时间段一与时间段二是否有交集
     * @params begintime1,$begintime2 开始时间一,开始时间二
     * @params $endtime1,$endtime2 结束时间一,结束时间二
     * @return bollean
     */
    public function isMixTime($begintime1,$endtime1,$begintime2,$endtime2)

    {
        $status = $begintime2 - $begintime1;
        if($status>0){
            $status2 = $begintime2 - $endtime1;
            if($status2>0){
                return false;
            }else{
                return true;
            }
        }else{
            $status2 = $begintime1 - $endtime2;
            if($status2>0){
                return false;
            }else{
                return true;

            }
        }

    }


    /**
     * sCreater: miki 
     * function：比较两个时间的间隔
     * @params $s_time 时间一
     * @params $check_time 时间二
     * @return bollean
     */
    function time_is_older_than($s_time, $check_time){
        $s_time = strtolower($s_time);
        $time_type = substr(preg_replace('/[^a-z]/', '', $s_time), 0, 1);
        $val = intval(preg_replace('/[^0-9]/', '', $s_time));
        $ts = 0;
        // (s)econds, (m)inutes, (d)ays, (y)ears
        if ($time_type == 's'){ $ts = $val; }
        else if ($time_type == 'm'){ $ts = $val * 60; }
        else if ($time_type == 'h'){ $ts = $val * 60 * 60; }
        else if ($time_type == 'd'){ $ts = $val * 60 * 60 * 24; }
        else if ($time_type == 'y'){ $ts = $val * 60 * 60 * 24 * 365; }
        else { die('Unknown time format given!'); }
        if ($check_time < (time()-$ts)){ return true; }
        return false;
    }
}
