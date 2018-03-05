<?php

use ignatenkovnikita\defcode\models\DefCode;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ignatenkovnikita\defcode\models\DefCodeSearch */
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
            'from',
            'to',
            'capacity',
            [
                'attribute' => 'operator',
                'filter' => DefCode::getOperators(true)
            ],
            [
                'attribute' => 'region',
                'filter' => DefCode::getRegions(true)
            ],
            [
                'attribute' => 'type',
                'filter' => DefCode::getTypes()
            ],
        ],
    ]); ?>

</div>
