<?php

namespace api\controllers;

use Yii;
use api\models\anesth\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnestharticleController implements the CRUD actions for Article model.
 */
class AnestharticleController extends CommonController
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
    //list
            public function actionStatus()
       {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();

       $page=$getData['page'];
       $topa=10;
       $topb=$page*10;
        parent::write_log('article/worknewslist',$getData);
        $sql="SELECT TOP ".$topa."  MA_ID,MA_Title,MA_Source,MA_CreaetOn FROM MInfo_Article  WHERE MA_Status=3 and MA_Type=1 AND MA_ID not in(SELECT TOP ".$topb."  MA_ID FROM MInfo_Article WHERE MA_Status=3 and MA_Type=1 order by MA_ID desc) order by MA_ID desc
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
    public function actionStatuscont()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $contid=$getData['id'];

        $rs = Article::findBySql('SELECT MA_ID,MA_Title,MA_Content,MA_Source,MA_CreaetOn  FROM MInfo_Article WHERE MA_ID='.$contid)->asArray()->all();


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
     * 定期考核
     * @return json
     */
    //list
            public function actionCheck()
       {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();

       $page=$getData['page'];
       $topa=10;
       $topb=$page*10;
        parent::write_log('article/worknewslist',$getData);
        $sql="SELECT TOP ".$topa."  MA_ID,MA_Title,MA_Source,MA_CreaetOn FROM MInfo_Article  WHERE MA_Status=3 and MA_Type=3 AND MA_ID not in(SELECT TOP ".$topb."  MA_ID FROM MInfo_Article WHERE MA_Status=3 and MA_Type=3 order by MA_ID desc) order by MA_ID desc
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
    public function actionCheckcont()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $contid=$getData['id'];

        $rs = Article::findBySql('SELECT MA_ID,MA_Title,MA_Content,MA_Source,MA_CreaetOn  FROM MInfo_Article WHERE MA_ID='.$contid)->asArray()->all();


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
     * 专科规培
     * @return json
     */
    //list
            public function actionZhuanke()
       {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();

       $page=$getData['page'];
       $topa=10;
       $topb=$page*10;
        parent::write_log('article/worknewslist',$getData);
        $sql="SELECT TOP ".$topa."  MA_ID,MA_Title,MA_Source,MA_CreaetOn FROM MInfo_Article  WHERE MA_Status=3 and MA_Type=4 AND MA_ID not in(SELECT TOP ".$topb."  MA_ID FROM MInfo_Article WHERE MA_Status=3 and MA_Type=4 order by MA_ID desc) order by MA_ID desc
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
    public function actionZhuankecont()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $contid=$getData['id'];

        $rs = Article::findBySql('SELECT MA_ID,MA_Title,MA_Content,MA_Source,MA_CreaetOn  FROM MInfo_Article WHERE MA_ID='.$contid)->asArray()->all();


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
     * 科普知识
     * @return json
     */
    //list
            public function actionKepu()
       {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();

       $page=$getData['page'];
       $topa=10;
       $topb=$page*10;
        parent::write_log('article/worknewslist',$getData);
        $sql="SELECT TOP ".$topa."  MA_ID,MA_Title,MA_Source,MA_CreaetOn FROM MInfo_Article  WHERE MA_Status=3 and MA_Type=5 AND MA_ID not in(SELECT TOP ".$topb."  MA_ID FROM MInfo_Article WHERE MA_Status=3 and MA_Type=5 order by MA_ID desc) order by MA_ID desc
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
    public function actionKepucont()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $contid=$getData['id'];

        $rs = Article::findBySql('SELECT MA_ID,MA_Title,MA_Content,MA_Source,MA_CreaetOn  FROM MInfo_Article WHERE MA_ID='.$contid)->asArray()->all();


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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MA_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
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
     * Deletes an existing Article model.
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
