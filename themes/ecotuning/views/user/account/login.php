<?php
$this->title = Yii::t('UserModule.user', 'Sign in');
$this->breadcrumbs = [Yii::t('UserModule.user', 'Sign in')];

?>

<div class="lk-content">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <div class="lk-authorization lk-authorization-sm-12">
            <div class="lk-authorization__left">
                    <h1><?= Yii::t('UserModule.user', 'Войти в личный кабинет'); ?></h1>

                    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', [
                        'id' => 'login-form',
                        'type' => 'vertical',
                        'htmlOptions' => [
                            'class' => 'login-form',
                        ]
                    ]); ?>

                        <?php //= $form->errorSummary($model); ?>
                        
                        
                        <?= $form->textFieldGroup($model, 'email', [
                            'widgetOptions'=>[
                                'htmlOptions'=>[
                                    'class' => '',
                                    'placeholder' => 'Ваш E-mail',
                                    'autocomplete' => 'off'
                                ]
                            ]
                        ]); ?>
                        
                        <div class="login-form__item">
                            <?= $form->passwordFieldGroup($model, 'password', [
                                'groupOptions'=>[
                                    'class'=>'password-form-group',
                                ],
                                'appendOptions' => [
                                    'class'=>'password-input-show',
                                ],
                                'append' => '<i class="fa fa-eye" aria-hidden="true"></i>'
                            ]); ?>
                            <?= CHtml::link(Yii::t('UserModule.user', 'Forgot your password?'), ['/user/account/recovery'], [
                                'class' => 'login-form__link'
                            ]) ?>
                        </div>

                        <?php if ($this->getModule()->sessionLifeTime > 0): ?>
                            <!-- <div class="checkbox checkbox-one">
                                <input checked="checked" name="LoginForm[remember_me]" id="LoginForm_remember_me" value="1" type="checkbox">
                                <label for="LoginForm_remember_me">Запомнить меня</label>
                            </div> -->
                        <?php endif; ?>

                        <div class="form-bot">
                            <div class="form-button fl">
                                <button class="btn btn-green" id="login-btn" data-send="ajax">
                                    Войти
                                </button> 
                            </div>
                        </div>

                        <?php if (Yii::app()->hasModule('social')): ?>
                            <?php $this->widget(
                                'vendor.nodge.yii-eauth.EAuthWidget',
                                [
                                    'action' => '/social/login',
                                    'predefinedServices' => ['google', 'facebook', 'vkontakte', 'twitter', 'github'],
                                ]
                            ); ?>
                        <?php endif; ?>
                    <?php $this->endWidget(); ?>
            </div>
            <div class="lk-authorization__right">
                <div class="lk-authorization-reg">
                    <div class="lk-authorization-reg__text">
                        <h2>Еще нет аккаунта?</h2>
                        <p><?= Yii::t('UserModule.user', 'Зарегистрируйтесь на'); ?></p>
                        <img src="/uploads/image/logo-footer.png">
                    </div>
                    <div class="lk-authorization-reg__but fl">
                         <a class="but btn btn-green" href="<?= Yii::app()->createUrl('user/account/registration'); ?>"><?= Yii::t('UserModule.user', 'Зарегистрироваться'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (Yii::app()->user->hasFlash("success")) : ?>
    <div id="registrationSuccessModal" class="modal modal-my fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header box-style">
                    <div data-dismiss="modal" class="modal-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.5607 2.56066C20.1464 1.97487 20.1464 1.02513 19.5607 0.43934C18.9749 -0.146447 18.0251 -0.146447 17.4393 0.43934L10 7.87868L2.56066 0.43934C1.97487 -0.146447 1.02513 -0.146447 0.43934 0.43934C-0.146447 1.02513 -0.146447 1.97487 0.43934 2.56066L7.87868 10L0.43934 17.4393C-0.146447 18.0251 -0.146447 18.9749 0.43934 19.5607C1.02513 20.1464 1.97487 20.1464 2.56066 19.5607L10 12.1213L17.4393 19.5607C18.0251 20.1464 18.9749 20.1464 19.5607 19.5607C20.1464 18.9749 20.1464 18.0251 19.5607 17.4393L12.1213 10L19.5607 2.56066Z" fill="black"/></svg>
                    </div>
                    <div class="modal-my-heading">
                        <h3>Уведомление</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="message-success">
                        <?= Yii::app()->user->getFlash('success') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php Yii::app()->clientScript->registerScript('registration-script', "
        $('#registrationSuccessModal').modal('show');
        setTimeout(function(){
            $('#registrationSuccessModal').modal('hide');
        }, 10000);
    ") ?>
<?php endif; ?>