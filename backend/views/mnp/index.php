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

$this->title = Yii::t('defcode', 'Def Mnp');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-mnp-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'phone',
            'def_mnc_mcc_id',
        ],
    ]); ?>

</div>
