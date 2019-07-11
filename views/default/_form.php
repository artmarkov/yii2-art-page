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

    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                    
                    <?= $form->field($model, 'content')->widget(TinyMce::className()); ?>

                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                          <label class="control-label" style="float: left; padding-right: 5px;">
                             <?= $model->attributeLabels()['id'] ?>: 
                          </label>
                               <span><?= $model->id ?></span>
                        </div>
                        
                        <?php if (!$model->isNewRecord): ?>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['created_at'] ?> :
                                </label>
                                <span><?= $model->createdDatetime ?></span>
                            </div>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['updated_at'] ?> :
                                </label>
                                <span><?= $model->updatedDatetime ?></span>
                            </div>

                            <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['updated_by'] ?> :
                                </label>
                                <span><?= $model->updatedBy->username ?></span>
                            </div>

                        <?php endif; ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('art', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('art', 'Cancel'), ['/page/default/index'], ['class' => 'btn btn-default',]) ?>
                            <?php else: ?>
                                <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?=
                                Html::a(Yii::t('art', 'Delete'), ['/page/default/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="record-info">
                        
                        <?= $form->field($model, 'published_time')->widget(DatePicker::classname())->textInput(['autocomplete' => 'off']); ?>

                        <?= $form->field($model, 'status')->dropDownList(Page::getStatusList()) ?>

                        <?php if (!$model->isNewRecord  && User::hasPermission('viewUsers')): ?>
                                <?= $form->field($model, 'created_by')->dropDownList(User::getUsersList()) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'comment_status')->dropDownList(Page::getCommentStatusList()) ?>

                        <?= $form->field($model, 'view')->dropDownList($this->context->module->viewList) ?>

                        <?= $form->field($model, 'layout')->dropDownList($this->context->module->layoutList) ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
