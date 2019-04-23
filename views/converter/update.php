<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\converter\models\Converter */

$this->title = 'Update Converter: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Converters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="converter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
