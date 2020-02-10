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
            </div>
        </div>
    </div>
</div>
