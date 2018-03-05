<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\generated\models\DefCode */

$this->title = Yii::t('defcode', 'Update {modelClass}: ', [
    'modelClass' => 'Def Code',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('defcode', 'Def Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('defcode', 'Update');
?>
<div class="def-code-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
