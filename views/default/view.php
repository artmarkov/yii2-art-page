<?php

use artsoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\page\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/page', 'Pages'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <?= Html::a(Yii::t('art', 'Edit'), ['/page/default/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('art', 'Delete'), ['/page/default/delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('art', 'Add New'), ['/page/default/create'], ['class' => 'btn btn-sm btn-success pull-right']) ?>
        
            <h2><?= $model->title ?></h2>
            <?= $model->content ?>
        </div>
    </div>

</div>
