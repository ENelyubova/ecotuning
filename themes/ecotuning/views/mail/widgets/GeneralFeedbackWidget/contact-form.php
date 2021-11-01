<?php $hasFlash = Yii::app()->user->hasFlash($this->successKey) ?>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', $this->formOptions) ?>
        <?php if ($hasFlash) : ?>
            <script>
                $("#<?= $this->id; ?>").modal('hide');
                $("#messageFormModal").modal('show');
                setTimeout(function(){
                    $("#messageFormModal").modal('hide');
                }, 4000);
            </script>
        <?php endif ?>
            
        <?= $form->hiddenField($model, 'key', ['value' => $this->id]) ?>
        
        <div class="form-flex fl fl-w fl-ai-c fl-jc-sb">
            <?php if ($this->showAttributeName) : ?>
                <?= $form->textFieldGroup($model, 'name', [
                    'widgetOptions'=>[
                        'htmlOptions'=>[
                            'class' => '',
                            'placeholder' => 'Ваше имя*',
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
                            'placeholder' => Yii::t('MailModule.mail', 'Ваш телефон*'),
                            'autocomplete' => 'off'
                        ]
                    ]
                ]); ?>
            <?php endif ?>
            
            <?php if ($this->showAttributeEmail) : ?>
                <?= $form->textFieldGroup($model, 'email', [
                    'widgetOptions'=>[
                        'htmlOptions'=>[
                            'class' => '',
                            'placeholder' => 'E-mail*',
                            'autocomplete' => 'off'
                        ]
                    ]
                ]); ?>
            <?php endif ?>
        </div>

        <?php if ($this->showAttributeBody) : ?>
            <?= $form->textAreaGroup($model, 'body') ?>
        <?php endif ?>

        <?php if ($this->showAttributeJson) : ?>
            <?= $form->hiddenField($model, 'json') ?>
        <?php endif ?>

        <p class="form-policy">* - поля, отмеченные звёздочкой, обязательны для заполнения</p>
        <div class="form-bot fl fl-w">
            <div class="form-button">
                <?php if ($this->showCloseButton) : ?>
                    <button type="button" class="btn btn-callback" data-dismiss="modal">Закрыть</button>
                <?php endif ?>
                    <button id="<?= $this->sendButtonId ?>" type="submit" class="btn btn-green">
                        Отправить заявку
                    </button>
            </div>
            <div class="form-captcha">
                <div class="g-recaptcha" data-sitekey="<?= Yii::app()->params['key']; ?>"></div>
                <?= $form->error($model, 'verify');?>
            </div>
            <div class="form-policy">
                Нажимая на кнопку «Отправить заявку», я даю согласие на обработку персональных данных в соответствии с <a href="/politika-konfidencialnosti" target="_blank">"Политикой конфиденциальности"</a> компании Экотюнинг
            </div>
        </div>
    <?php $this->endWidget() ?>

<?php Yii::app()->clientScript->registerScript($this->id.'-script', "

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


/* Загружать капчу, когда докрутили до нее */
if($('div').hasClass('js-load-chapche')){
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    var formBlock = $('.js-load-chapche');
    var formBlockTop = formBlock.offset().top;
    $(window).bind('scroll', function(){
        var windowTop = $(this).scrollTop();
        if (windowTop > formBlockTop) {
            
            $.getScript('https://www.google.com/recaptcha/api.js', function () {});
            head.appendChild(script);
            
            $(window).unbind('scroll');
        }
    });
}
") ?>