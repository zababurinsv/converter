<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\converter\models\Converter */

$this->title = 'Create Converter';
$this->params['breadcrumbs'][] = ['label' => 'Converters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="converter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
