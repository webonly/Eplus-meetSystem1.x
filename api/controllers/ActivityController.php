<?php

namespace api\controllers;

use Yii;
use api\models\Activity;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends CommonController
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
     * 专题活动
     * @return json
     */
    public function actionSubject()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $rs = Activity::findBySql('SELECT MA_ID,MA_Name,MA_ImgUrl,MA_LinkUrl,MA_CreateOn  FROM MInfo_Activity WHERE MA_Status=3  order by MA_ID desc')->asArray()->all();
          for ($i=0;$i<count($rs);$i++){

    $enddate=date('y-m-d h:i:s',time());
    $startdate=$rs[$i]["MA_CreateOn"];
    $yearC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30/12);
    $monthC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30);
    $weekC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/7);
    $dayC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24);
    $hourC =floor((strtotime($enddate)-strtotime($startdate))/60/60);
    $minC =floor((strtotime($enddate)-strtotime($startdate))/60);
    if($yearC>=1){
        $rs[$i]["MA_CreateOn"]=$yearC ."年前";
    }elseif ($monthC>=1) {
         $rs[$i]["MA_CreateOn"]=$monthC ."月前";
    }elseif ($weekC>=1) {
       $rs[$i]["MA_CreateOn"]=$weekC ."周前";
    }elseif ($dayC>=1) {
      $rs[$i]["MA_CreateOn"]=$dayC ."天前";
    }elseif ($hourC>=1) {
      $rs[$i]["MA_CreateOn"]=$hourC ."小时前";
    }elseif ($minC>=1) {
      $rs[$i]["MA_CreateOn"]=$minC ."分钟前";
    }else{
       $rs[$i]["MA_CreateOn"]="刚刚发布";
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
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Activity::find(),
        ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MA_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MA_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
