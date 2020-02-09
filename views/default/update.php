<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\page\models\Page */

$this->title = Yii::t('art', 'Update "{item}"', ['item' => $model->title]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('art', 'Update');
?>

<div class="page-update">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?=  Html::encode($this->title) ?></h3>
        </div>
    </div>
    <?= $this->render('_form', compact('model')) ?>
</div>


