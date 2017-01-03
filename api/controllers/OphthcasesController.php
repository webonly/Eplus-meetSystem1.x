<?php

namespace api\controllers;

use Yii;
use api\models\ophth\ophthCases;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OphthcasesController implements the CRUD actions for ophthCases model.
 */
class OphthcasesController extends CommonController
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
     * Lists all ophthCases models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ophthCases::find(),
        ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }



/**
     * 病例讨论
     * @return json
     */
    //list
            public function actionCases()
       {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();

       $page=$getData['page'];
       $topa=10;
       $topb=$page*10;
        parent::write_log('article/worknewslist',$getData);
        $sql="SELECT TOP ".$topa."  MC_ID,MC_Title,MC_CreateOn FROM MInfo_Cases  WHERE MC_Status=3  AND MC_ID not in(SELECT TOP ".$topb."  MC_ID FROM MInfo_Cases WHERE MC_Status=3  order by MC_ID desc) order by MC_ID desc
";
        $rs = ophthCases::findBySql($sql)->asArray()->all();
           for ($i=0;$i<count($rs);$i++){

    $enddate=date('y-m-d h:i:s',time());
    $startdate=$rs[$i]["MC_CreateOn"];
    $yearC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30/12);
    $monthC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30);
    $weekC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/7);
    $dayC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24);
    $hourC =floor((strtotime($enddate)-strtotime($startdate))/60/60);
    $minC =floor((strtotime($enddate)-strtotime($startdate))/60);
    if($yearC>=1){
        $rs[$i]["MC_CreateOn"]=$yearC ."年前";
    }elseif ($monthC>=1) {
         $rs[$i]["MC_CreateOn"]=$monthC ."月前";
    }elseif ($weekC>=1) {
       $rs[$i]["MC_CreateOn"]=$weekC ."周前";
    }elseif ($dayC>=1) {
      $rs[$i]["MC_CreateOn"]=$dayC ."天前";
    }elseif ($hourC>=1) {
      $rs[$i]["MC_CreateOn"]=$hourC ."小时前";
    }elseif ($minC>=1) {
      $rs[$i]["MC_CreateOn"]=$minC ."分钟前";
    }else{
       $rs[$i]["MC_CreateOn"]="刚刚发布";
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
    public function actionCasescont()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $contid=$getData['id'];

        $rs = ophthCases::findBySql('SELECT MC_ID,MC_Title,MC_Content,MC_CreateOn  FROM MInfo_Cases WHERE MC_ID='.$contid)->asArray()->all();


   for ($i=0;$i<count($rs);$i++){

    $enddate=date('y-m-d h:i:s',time());
    $startdate=$rs[$i]["MC_CreateOn"];
    $yearC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30/12);
    $monthC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/30);
    $weekC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24/7);
    $dayC =floor((strtotime($enddate)-strtotime($startdate))/60/60/24);
    $hourC =floor((strtotime($enddate)-strtotime($startdate))/60/60);
    $minC =floor((strtotime($enddate)-strtotime($startdate))/60);
    if($yearC>=1){
        $rs[$i]["MC_CreateOn"]=$yearC ."年前";
    }elseif ($monthC>=1) {
         $rs[$i]["MC_CreateOn"]=$monthC ."月前";
    }elseif ($weekC>=1) {
       $rs[$i]["MC_CreateOn"]=$weekC ."周前";
    }elseif ($dayC>=1) {
      $rs[$i]["MC_CreateOn"]=$dayC ."天前";
    }elseif ($hourC>=1) {
      $rs[$i]["MC_CreateOn"]=$hourC ."小时前";
    }elseif ($minC>=1) {
      $rs[$i]["MC_CreateOn"]=$minC ."分钟前";
    }else{
       $rs[$i]["MC_CreateOn"]="刚刚发布";
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
     * Displays a single ophthCases model.
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
     * Creates a new ophthCases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ophthCases();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MC_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ophthCases model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MC_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ophthCases model.
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
     * Finds the ophthCases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ophthCases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ophthCases::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
