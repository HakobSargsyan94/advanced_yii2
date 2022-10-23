<?php

use app\models\Data;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DataSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            [
//                'attribute' => 'data',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return "<pre class='prettyMarkContent prettyMarkDark' style='width: 100%; float:left;'>".$model->data."</pre>";
//                },
//            ],
            [
                'attribute' => 'data',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<div class='target'>".$model->data."</div>";
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'delete' => function(){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>');
                    }
                ]
            ],
        ],
    ]); ?>


</div>
