<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//@var_dump($model)

$this->title = 'Наши туры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать тур', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'description:ntext',
            [
                'attribute' => 'idCategory',
                'value' => 'category.name',
            ], 
            'status',
            [
                'attribute'=>'photoBefore',
                'format'=>'raw',
                'value'=>function($item){
                    return '<img alt="" width="200" src="web/uploads/' .$item['photoBefore'].'">';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view'=>function($url, $model, $key){
                        return Html::a('Информация', $url, ['class'=> 'btn btn-success']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
