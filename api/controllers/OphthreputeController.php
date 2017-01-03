<?php

namespace api\controllers;

use Yii;
use api\models\ophth\OphthRepute;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OphthreputeController implements the CRUD actions for OphthRepute model.
 */
class OphthreputeController extends CommonController
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
     * 分会领导
     * @return json
     */
     //list
         public function actionLeaderlist()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('anesthleader/leaderlist',$getData);

        $sql='select MR_ID,MR_DocName,MR_Photo,MR_Job,MR_WorkPlace from dbo.MInfo_Repute
where MR_Status=3
order by MR_Order asc';
        $rs =OphthRepute::findBySql($sql,array())->asArray()->all();


        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }
     //content
    public function actionSummary()
    {
        $getData = Yii::$app->request->post();
        $getData = !empty($getData) ? $getData : Yii::$app->request->get();
        parent::write_log('anesthleader/summary',$getData);
         $contid=$getData['id'];
        // $rs = Repute::findBySql('SELECT * FROM MInfo_Repute WHERE MR_Status=3  order by MR_ID desc')->asArray()->all();
        $sql='select MR_ID,MR_DocName,MR_Photo,MR_Job,MR_WorkPlace,MR_Summary from dbo.MInfo_Repute
where MR_ID ='.$contid;
        $rs =OphthRepute::findBySql($sql,array())->asArray()->all();


        $data = array(
            'errorCode' => 0,
            'errorMessage' => '获取内容成功！',
            'result' => $rs
        );
        parent::json_encode($data);
    }

    /**
     * Lists all OphthRepute models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OphthRepute::find(),
        ]);

    }

    /**
     * Displays a single OphthRepute model.
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
     * Creates a new OphthRepute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OphthRepute();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MR_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OphthRepute model.
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
     * Deletes an existing OphthRepute model.
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
     * Finds the OphthRepute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OphthRepute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OphthRepute::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
