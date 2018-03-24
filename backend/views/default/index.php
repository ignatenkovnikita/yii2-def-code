<?php

use ignatenkovnikita\defcode\models\DefCode;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ignatenkovnikita\defcode\models\DefCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $operators DefCode[] */
/* @var $regions DefCode[] */
/* @var $types DefCode[] */

$this->title = Yii::t('defcode', 'Def Codes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-code-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'from',
            'to',
            'capacity',
            [
                'attribute' => 'operator',
                'format' => 'raw',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'initValueText' => $searchModel->operator,
                    'attribute' => 'operator',
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => [
                        'placeholder' => 'Please select ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'data' => $operators
                ]),
            ],
            [
                'attribute' => 'region',
                'format' => 'raw',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'initValueText' => $searchModel->region,
                    'attribute' => 'region',
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'options' => [
                        'placeholder' => 'Please select ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    'data' => $regions
                ]),
            ],
            [
                'attribute' => 'type',
                'filter' => $types
            ],
        ],
    ]); ?>

</div>
