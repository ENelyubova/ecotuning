<?php
/* @var $model ProfileForm */

$this->title = Yii::t('UserModule.user', 'Change password');
$this->breadcrumbs = [
    Yii::t('UserModule.user', 'User profile') => ['/user/profile/profile'],
    Yii::t('UserModule.user', 'Change password')
];
$this->layout = "//layouts/user";

Yii::app()->clientScript->registerScript(
    'show-password',
    "$(function () {
    $('#show_pass').click(function () {
        $('#ProfilePasswordForm_password').prop('type', $(this).prop('checked') ? 'text' : 'password');
        $('#ProfilePasswordForm_cPassword').prop('type', $(this).prop('checked') ? 'text' : 'password');
    });
});"
);?>
<div class="lk-content lk-content-form">
    <div class="content-site">
        <div class="lk-form">
            <div class="lk-form__box">
                <div class="lk-form-header">
                    <h1><?= Yii::t('UserModule.user', 'Восстановление пароля'); ?></h1>
                </div>
                <?php $form = $this->beginWidget(
                    'bootstrap.widgets.TbActiveForm',
                    [
                        'id'                     => 'profile-password-form',
                        'enableAjaxValidation'   => false,
                        'enableClientValidation' => true,
                        'htmlOptions'            => [
                            'class' => 'form-my',
                        ]
                    ]
                ); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->passwordFieldGroup($model, 'password', [
                        'groupOptions'=>[
                            'class'=>'password-form-group',
                        ],
                        'appendOptions' => [
                            'class'=>'password-input-show',
                        ],
                        'append' => '<i class="fa fa-eye" aria-hidden="true"></i>'
                ]); ?>

                <?= $form->passwordFieldGroup($model, 'cPassword', [
                    'groupOptions'=>[
                        'class'=>'password-form-group',
                    ],
                    'appendOptions' => [
                        'class'=>'password-input-show',
                    ],
                    'append' => '<i class="fa fa-eye" aria-hidden="true"></i>'
                ]); ?>

                <button class="btn btn-red" id="registration-btn" data-send="ajax">
                        Изменить пароль
                    </button>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
