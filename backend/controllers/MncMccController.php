<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 20/06/2018
 * Time: 13:28
 */

namespace ignatenkovnikita\defcode\backend\controllers;


use ignatenkovnikita\defcode\models\search\DefMncMccSearch;
use ignatenkovnikita\defcode\models\search\DefMnpSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;

class MncMccController extends Controller
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
        $searchModel = new DefMncMccSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}