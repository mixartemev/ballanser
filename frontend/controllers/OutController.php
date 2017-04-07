<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Out;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * OutController implements the CRUD actions for Out model.
 */
class OutController extends CommonController
{
    /**
     * Lists all Out models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Out::find()->orderBy('when desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Out model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Out();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Out model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Out the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Out::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
