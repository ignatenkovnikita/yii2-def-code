<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\generated\models\DefCode */

$this->title = Yii::t('defcode', 'Create {modelClass}', [
    'modelClass' => 'Def Code',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('defcode', 'Def Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="def-code-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
