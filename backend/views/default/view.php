<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\generated\models\DefCode */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('defcode', 'Def Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-code-view">

    <p>
        <?php echo Html::a(Yii::t('defcode', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('defcode', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('defcode', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'from',
            'to',
            'capacity',
            'operator',
            'region',
            'type',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
