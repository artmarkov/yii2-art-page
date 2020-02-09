<?php

use artsoft\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\page\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/page', 'Pages'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?= Html::encode($this->title) ?></h3>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <?= $model->content ?>
        </div>
        <div class="panel-footer">
            <div class="form-group">
                <?= Html::a(Yii::t('art', 'Go to list'), ['/page/default/index'], ['class' => 'btn btn-default',]) ?>
                <?= Html::a(Yii::t('art', 'Edit'), ['/page/default/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('art', 'Delete'), ['/page/default/delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a(Yii::t('art', 'Add New'), ['/page/default/create'], ['class' => 'btn btn-success pull-right']) ?>
            </div>
            <div class="text-default text-muted small">
                <span><strong><?= $model->attributeLabels()['id'] ?? '' ?></strong> : <?= $model->id ?? '' ?></span>
                <span><strong><?= $model->attributeLabels()['created_at'] ?? '' ?></strong> : <?= $model->createdDatetime ?? '' ?>
                    <?= $model->createdBy->username ?? '' ?></span>
                <span><strong><?= $model->attributeLabels()['updated_at'] ?? '' ?></strong> : <?= $model->updatedDatetime ?? '' ?>
                    <?= $model->updatedBy->username ?? '' ?></span>
            </div>
        </div>
    </div>
</div>
