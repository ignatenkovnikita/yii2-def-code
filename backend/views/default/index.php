<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DefCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('defcode', 'Def Codes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-code-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'from',
            'to',
            'capacity',
            'operator',
            'region',
            [
                'attribute' => 'type',
                'filter' => \ignatenkovnikita\defcode\models\DefCode::getTypes()
            ],
            'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
