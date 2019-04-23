<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\converter\models\ConverterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Converters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="converter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Converter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'object',
            'code',
            'name',
            'population',
            'image',
            ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => ['onclick' => 'js:addItems(this.value, this.checked)']],
            ],
    ]); ?>
    <p>
        <?= Html::a('Convert', ['convert'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
