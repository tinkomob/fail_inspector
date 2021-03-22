<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Имя пользоватлея') ?>

    
    <!-- <?php if($model->isNewRecord) { ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('Пароль') ?>
        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true])->label('Повторите пароль') ?>
    <?php } ?> -->
    

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label('ФИО') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php if((!$model->isNewRecord) && Yii::$app->user->identity->role == 3) { ?>
        <?= $form->field($model, 'role')->dropDownList([
            '0' => '0 - Без прав',
            '1' => '1 - Просмотр',
            '2' => '2 - Просмотр/изменение',
            '3' => '3 - Админ',
        ])->label('Уровень доступа');?>
    <?php } ?>
    
    <?php if($model->isNewRecord) { ?>
        <div class="form-group">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
        </div>
    <?php } else { ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php } ?>
    
    <?php ActiveForm::end(); ?>

</div>
