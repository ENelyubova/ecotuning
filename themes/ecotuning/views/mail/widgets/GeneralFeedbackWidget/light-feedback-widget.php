<?php $hasFlash = Yii::app()->user->hasFlash($this->successKey) ?>

<?php if ($this->buttonModal) : ?>
    <?= CHtml::link($this->buttonModal, "#{$this->id}", [
        'data-toggle' => 'modal',
        'data-target' => "#{$this->id}",
    ])  ?>
<?php endif; ?>
<?= CHtml::openTag('div', $this->modalHtmlOptions) ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="row"> -->
            
                <!-- <div class="col-sm-12"> -->
                    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', $this->formOptions) ?>
                        <div class="modal-header box-style">
                            <div data-dismiss="modal" class="modal-close"><i class="fa fa-times" aria-hidden="true"></i><div></div></div>
                            <div class="modal-my-heading" id="myModalLabel">
                                <h3><?= $this->titleModal; ?></h3>
                                    <p><?= $this->subTitleModal ?></p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <?php if ($hasFlash) : ?>
                                <script>

                                    $("#<?= $this->id; ?>").modal('hide');
                                    $("#messageModal").modal('show');
                                    setTimeout(function(){
                                        $("#messageModal").modal('hide');
                                    }, 4000);
                                </script>
                                
                            <?php endif ?>
                                
                            <?= $form->hiddenField($model, 'key', ['value' => $this->id]) ?>
                            <?php if ($this->showAttributeName) : ?>
                                <?= $form->textFieldGroup($model, 'name', [
                                    'widgetOptions'=>[
                                        'htmlOptions'=>[
                                            'class' => '',
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            <?php endif ?>

                            <?php if ($this->showAttributePhone) : ?>
                                <?= $form->maskedTextFieldGroup($model, 'phone', [
                                    'widgetOptions' => [
                                        'mask' => '+7(999)999-99-99',
                                        'id' => 'phone-'.$this->id,
                                        'htmlOptions'=>[
                                            'class' => 'data-mask',
                                            'data-mask' => 'phone',
                                            'placeholder' => Yii::t('MailModule.mail', 'Ваш телефон'),
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            <?php endif ?>

                            <?php if ($this->showAttributeEmail) : ?>
                                <?= $form->textFieldGroup($model, 'email') ?>
                            <?php endif ?>

                            <?php if ($this->showAttributeBody) : ?>
                                <?= $form->textAreaGroup($model, 'body') ?>
                            <?php endif ?>

                            <?= $form->hiddenField($model, 'product') ?>

                            <div class="form-bot">
                                <div class="form-captcha">
                                    <div class="g-recaptcha" data-sitekey="<?= Yii::app()->params['key']; ?>"></div>
                                    <?= $form->error($model, 'verify');?>
                                </div>
                                <div class="form-button">
                                    <?php if ($this->showCloseButton) : ?>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                    <?php endif ?>
                                        <button id="<?= $this->sendButtonId ?>" type="submit" class="btn btn-blue">
                                            <?= $this->sendButtonText ?>
                                        </button>
                                </div>
                            </div>
                            <div class="terms_of_use">
                                * Оставляя заявку Вы соглашаетесь с
                                <a target="_blank" href="/politika-konfidencialnosti">Условиями обработки персональных данных</a>
                            </div> 
                        </div>
                    <?php $this->endWidget() ?>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
<?= CHtml::closeTag('div') ?>

<?php Yii::app()->clientScript->registerScript($this->id.'-script', "
$('#{$this->modalHtmlOptions['id']}').on('show.bs.modal', function (e) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    $.getScript('https://www.google.com/recaptcha/api.js', function () {});
    head.appendChild(script);
});

$(document).delegate('.js-modal-show', 'click', function() {
    var theme = $(this).data('name');
    $('#{$this->formOptions['id']}').find('#LightForm_product').val(theme);
    $($(this).data('modal')).modal('show');
    return false;
});

$(document).delegate('#{$this->formOptions['id']}', 'submit', function() {
    var form = $(this);
    var data = form.serialize();
    var url = form.attr('action');
    var type = form.attr('method');
    var selectorForm = '#{$this->formOptions['id']}';
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'html',
        success: function(data) {
            $(selectorForm).html($(data).find(selectorForm).html());
            // var mask = $('.js-code-phone option:selected').data('mask');
            // if (mask !== undefined) {
            // }
            $('[data-mask=phone]').mask('+7(999)999-99-99', {
                'placeholder':'_',
                'completed':function() {
                    //console.log('ok');
                }
            });
            $.getScript('https://www.google.com/recaptcha/api.js', function () {});
        }
    })
    return false;
})
") ?>