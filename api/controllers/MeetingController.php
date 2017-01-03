<?php

namespace api\controllers;

use Yii;
use api\models\Meeting;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MeetingController implements the CRUD actions for Meeting model.
 */
class MeetingController extends CommonController
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
     * 定期会议
     * @return json
     */
    //title
        public function actionArrangetitle()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('meeting/arrangetitle',$getData);
        $rs = Meeting::findBySql('SELECT MM_ID, MM_Name, MM_Address, MM_StartDate FROM MInfo_Meetings WHERE MM_Status=3  ')->asArray()->all();
  


        $nowdate=strtotime(date('y-m-d',time()));
        $meetingdate=strtotime($rs[0]["MM_StartDate"]);

         $pxdate=array();
         $datecontent=array("tmrtitle"=>"","ysdtitle"=>"","tmraddress"=>"","ysdaddress"=>"","tdtitle"=>"","tdaddress"=>"","tmrid"=>"","ysdid"=>"","tdid"=>"");


         $nowid="";
         $tmrdate="";
         $ysddate="";
         for ($i=0;$i<count($rs);$i++){
            $pxdate[$i]=strtotime($rs[$i]["MM_StartDate"]);
         }
         $pxdate[count($rs)]=$nowdate;
         sort($pxdate);
         // date('Y-m-d', $pxdate[4])

         for($i=0;$i<count($pxdate);$i++){
             if($pxdate[$i]==$nowdate){
                $nowid=$i;

             }
         }
         if($nowid<(count($pxdate)-1)){
            $tmrdate=$pxdate[$nowid+1];
         }
         if(0<$nowid){
            $ysddate=$pxdate[$nowid-1];
         }

         for($i=0;$i<count($rs);$i++){
            if(strtotime($rs[$i]["MM_StartDate"])==$tmrdate){
               $datecontent["tmrtitle"]=$rs[$i]["MM_Name"];
               $datecontent["tmraddress"]=$rs[$i]["MM_Address"];
               $datecontent["tmrid"]=$rs[$i]["MM_ID"];
            }
            if(strtotime($rs[$i]["MM_StartDate"])==$ysddate){
               $datecontent["ysdtitle"]=$rs[$i]["MM_Name"];
               $datecontent["ysdaddress"]=$rs[$i]["MM_Address"];
               $datecontent["ysdid"]=$rs[$i]["MM_ID"];
            }
            if(strtotime($rs[$i]["MM_StartDate"])==$nowdate){
               $datecontent["tdtitle"]=$rs[$i]["MM_Name"];
               $datecontent["tdaddress"]=$rs[$i]["MM_Address"];
               $datecontent["tdid"]=$rs[$i]["MM_ID"];
            }         
         }
        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $datecontent
        );
        parent::json_encode($data);
    }
    //list

       // $rs[count($rs)]=array("date"=>date('y-m-d',time()));

        //content
    public function actionArrangelist()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('meeting/worknews',$getData);
        $rs = Meeting::findBySql('SELECT MM_ID, MM_Name,MM_StartDate, MM_Address FROM MInfo_Meetings WHERE MM_Status=3  ')->asArray()->all();
        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
    //date
        //content
    public function actionArrangedate()
    {
        $rs=date('Y-m-d',time());
        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
    //content
    public function actionArrange()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('meeting/worknews',$getData);
        $rs = Meeting::findBySql('SELECT MM_ID, MM_Name, MM_Type, MM_StartDate, MM_Source, MM_Location, MM_EndDate, MM_Telephone, MM_Contactor, MM_Address, MM_Content, 
                      MM_Status  FROM MInfo_Meetings WHERE MM_Status=3  ')->asArray()->all();
       
        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }

    /**
     * Lists all Meeting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Meeting::find(),
        ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Displays a single Meeting model.
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
     * Creates a new Meeting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Meeting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MM_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Meeting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MM_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Meeting model.
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
     * Finds the Meeting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Meeting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Meeting::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
