<?php

namespace api\controllers;

use Yii;
use app\models\Repute;
use app\models\ReputePhoto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReputeController implements the CRUD actions for Repute model.
 */
class ReputeController extends CommonController
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
     * Lists all Repute models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Repute::find(),
        ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }


     /**
     * 医者风采
     * @return json
     */
     //title
         public function actionDoctoreleganttitle()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('repute/doctoreleganttitle',$getData);

        // $rs = Repute::findBySql('SELECT * FROM MInfo_Repute WHERE MR_Status=3  order by MR_ID desc')->asArray()->all();
        $sql='SELECT TOP 2 MInfo_Repute.MR_ID, MInfo_Repute.MR_DocName
FROM  MInfo_Repute INNER JOIN  MInfo_ReputePhoto ON MInfo_Repute.MR_Code = MInfo_ReputePhoto.MP_Repute
WHERE MInfo_Repute.MR_Status=3 order by MInfo_Repute.MR_ID desc
';
        $rs =Repute::findBySql($sql,array())->asArray()->all();


        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
     //list
         public function actionDoctorelegantlist()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('repute/doctorelegantlist',$getData);

        // $rs = Repute::findBySql('SELECT * FROM MInfo_Repute WHERE MR_Status=3  order by MR_ID desc')->asArray()->all();
        $sql='SELECT     MInfo_ReputePhoto.MP_Path, MInfo_ReputePhoto.MP_Repute, MInfo_ReputePhoto.MP_ID, MInfo_Repute.MR_ID, MInfo_Repute.MR_DocName, 
                      MInfo_Repute.MR_Job, MInfo_Repute.MR_Specialty, MInfo_Repute.MR_Code, MInfo_Repute.MR_WorkPlace
FROM         MInfo_Repute INNER JOIN
                      MInfo_ReputePhoto ON MInfo_Repute.MR_Code = MInfo_ReputePhoto.MP_Repute
WHERE MInfo_Repute.MR_Status=3 order by MInfo_Repute.MR_ID desc
';
        $rs =Repute::findBySql($sql,array())->asArray()->all();


        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
     //content
    public function actionDoctorelegant()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('article/worknews',$getData);
        $contid=$getData['id'];
        // $rs = Repute::findBySql('SELECT * FROM MInfo_Repute WHERE MR_Status=3  order by MR_ID desc')->asArray()->all();
        $sql='SELECT     MInfo_ReputePhoto.MP_Path, MInfo_ReputePhoto.MP_Repute, MInfo_ReputePhoto.MP_ID, MInfo_Repute.MR_ID, MInfo_Repute.MR_DocName, 
                      MInfo_Repute.MR_Job, MInfo_Repute.MR_Specialty, MInfo_Repute.MR_Code, MInfo_Repute.MR_WorkPlace, MInfo_Repute.MR_Summary, MInfo_Repute.MR_Status
FROM         MInfo_Repute INNER JOIN
                      MInfo_ReputePhoto ON MInfo_Repute.MR_Code = MInfo_ReputePhoto.MP_Repute
WHERE MInfo_Repute.MR_ID='.$contid;
        $rs =Repute::findBySql($sql,array())->asArray()->all();


        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
 


    /**
     * Displays a single Repute model.
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
     * Creates a new Repute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Repute();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MR_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Repute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MR_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Repute model.
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
     * Finds the Repute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Repute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Repute::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
