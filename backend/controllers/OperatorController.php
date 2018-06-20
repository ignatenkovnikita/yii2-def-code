<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 18/06/2018
 * Time: 22:59
 */

namespace ignatenkovnikita\defcode\backend\controllers;


use ignatenkovnikita\defcode\models\DefOperator;
use ignatenkovnikita\defcode\models\search\DefOperatorSearch;
use yii\filters\VerbFilter;

class OperatorController extends \yii\web\Controller
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
     * Lists all DefCode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DefOperatorSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Updates an existing DefCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * Finds the DefCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DefCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DefOperator::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}