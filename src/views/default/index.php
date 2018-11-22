<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var  $versions */
$versions = [
        2 => '2.0 - 2.2.x', 
        23 => '2.3.x', 
        3 => '3.x.x'
];
$this->title = 'Opencart Module Generator';
?>
<div class="ocmodulegenerator-default-index">
    <div class="col-md-9 col-sm-8">
        <div class="default-view">
            <h1>Opencart Module Generator</h1>


            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'author')->textInput(); ?>
            <?= $form->field($model, 'title')->textInput(); ?>
            <?= $form->field($model, 'name')->textInput(); ?>
            <?= $form->field($model, 'version')->dropDownList($versions) ?>

            <div class="form-group">
                <?= Html::submitButton('Generate', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8" style="margin-top: 100px">
        <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=Donate%20Opencart%20Module%20Generator&targets-hint=&default-sum=&button-text=14&payment-type-choice=on&mobile-payment-type-choice=on&hint=&successURL=&quickpay=shop&account=41001198489369" width="100%" height="220" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
    </div>
</div>
