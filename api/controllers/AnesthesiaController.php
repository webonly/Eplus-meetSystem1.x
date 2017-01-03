<?php

namespace api\controllers;

use Yii;
use app\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class AnesthesiaController extends CommonController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 分会动态
     * @return json
     */
    //title
        public function actionWorknewstitle()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknewstitle',$getData);
        $rs = Article::findBySql('SELECT TOP 2 MA_ID,MA_Title  FROM MInfo_Article WHERE MA_Status=3 and MA_Type=1 order by MA_PublishOn desc')->asArray()->all();
        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
    //list
            public function actionWorknewslist()
       {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();

       $page=$getData['page'];
       $topa=10;
       $topb=$page*10;
        parent::write_log('article/worknewslist',$getData);
        $sql="SELECT TOP ".$topa."  MA_ID,MA_Title,MA_Source,MA_CreaetOn FROM MInfo_Article  WHERE MA_Status=3 and MA_Type=1 AND MA_ID not in(SELECT TOP ".$topb."  MA_ID FROM MInfo_Article WHERE MA_Status=3 and MA_Type=1 order by MA_ID desc) order by MA_PublishOn desc
";
        $rs = Article::findBySql($sql)->asArray()->all();
           for ($i=0;$i<count($rs);$i++){

    $enddate=date('y-m-d h:i:s',time());
    $startdate=$rs[$i]["MA_CreaetOn"];
    $yearC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30/12);
    $monthC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30);
    $weekC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/7);
    $dayC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24);
    $hourC =floor((strtotime($enddate)-strtotime($startdate))/60/60);
    $minC =floor((strtotime($enddate)-strtotime($startdate))/60);
    if($yearC>=1){
        $rs[$i]["MA_CreaetOn"]=$yearC ."年前";
    }elseif ($monthC>=1) {
         $rs[$i]["MA_CreaetOn"]=$monthC ."月前";
    }elseif ($weekC>=1) {
       $rs[$i]["MA_CreaetOn"]=$weekC ."周前";
    }elseif ($dayC>=1) {
      $rs[$i]["MA_CreaetOn"]=$dayC ."天前";
    }elseif ($hourC>=1) {
      $rs[$i]["MA_CreaetOn"]=$hourC ."小时前";
    }elseif ($minC>=1) {
      $rs[$i]["MA_CreaetOn"]=$minC ."分钟前";
    }else{
       $rs[$i]["MA_CreaetOn"]="刚刚发布";
    }
    }

        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
    //content
    public function actionWorknews()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $rs = Article::findBySql('SELECT MA_ID,MA_Title,MA_Content,MA_Source,MA_CreaetOn  FROM MInfo_Article WHERE MA_Status=3 and MA_Type=1 order by MA_PublishOn desc')->asArray()->all();


   for ($i=0;$i<count($rs);$i++){

    $enddate=date('y-m-d h:i:s',time());
    $startdate=$rs[$i]["MA_CreaetOn"];
    $yearC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30/12);
    $monthC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30);
    $weekC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/7);
    $dayC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24);
    $hourC =floor((strtotime($enddate)-strtotime($startdate))/60/60);
    $minC =floor((strtotime($enddate)-strtotime($startdate))/60);
    if($yearC>=1){
        $rs[$i]["MA_CreaetOn"]=$yearC ."年前";
    }elseif ($monthC>=1) {
         $rs[$i]["MA_CreaetOn"]=$monthC ."月前";
    }elseif ($weekC>=1) {
       $rs[$i]["MA_CreaetOn"]=$weekC ."周前";
    }elseif ($dayC>=1) {
      $rs[$i]["MA_CreaetOn"]=$dayC ."天前";
    }elseif ($hourC>=1) {
      $rs[$i]["MA_CreaetOn"]=$hourC ."小时前";
    }elseif ($minC>=1) {
      $rs[$i]["MA_CreaetOn"]=$minC ."分钟前";
    }else{
       $rs[$i]["MA_CreaetOn"]="刚刚发布";
    }

    }
        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }


    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
