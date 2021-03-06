<?php

use artsoft\helpers\Html;
use artsoft\media\widgets\TinyMce;
use artsoft\models\User;
use artsoft\page\models\Page;
use artsoft\widgets\ActiveForm;
use artsoft\widgets\LanguagePills;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model artsoft\page\models\Page */
/* @var $form artsoft\widgets\ActiveForm */
?>

<div class="page-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'page-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'content')->widget(TinyMce::className()); ?>

                </div>
                <div class="col-md-4">

                    <?= $form->field($model, 'published_time')->widget(DatePicker::classname())->textInput(['autocomplete' => 'off']); ?>

                    <?= $form->field($model, 'status')->dropDownList(Page::getStatusList()) ?>

                    <?php if (!$model->isNewRecord && User::hasPermission('viewUsers')): ?>
                        <?= $form->field($model, 'created_by')->dropDownList(User::getUsersList()) ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'comment_status')->dropDownList(Page::getCommentStatusList()) ?>

                    <?= $form->field($model, 'view')->dropDownList($this->context->module->viewList) ?>

                    <?= $form->field($model, 'layout')->dropDownList($this->context->module->layoutList) ?>

                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-group">
                <?= Html::a(Yii::t('art', 'Go to list'), ['/page/default/index'], ['class' => 'btn btn-default',]) ?>
                <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                <?php if (!$model->isNewRecord): ?>
                    <?= Html::a(Yii::t('art', 'Delete'), ['/page/default/delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger ',
                        'data' => [
                            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ])
                    ?>
                <?php endif; ?>
            </div>
            <?= \artsoft\widgets\InfoModel::widget(['model'=>$model]); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


