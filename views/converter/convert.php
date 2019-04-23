<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\converter\models\Converter */

$this->title = 'convert: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Converters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'convert';
?>
<div class="converter-run">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('converter', [
        'model' => $model,
    ]) ?>

</div>
