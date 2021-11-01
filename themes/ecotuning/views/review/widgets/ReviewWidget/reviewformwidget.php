<?php Yii::app()->getClientScript()->registerScriptFile('https://www.google.com/recaptcha/api.js', CClientScript::POS_END); ?>
<div class="review-form-box">
    <div class="review-form-box__header">
        <?php /*$this->widget('application.modules.contentblock.widgets.ContentMyBlockWidget', [
            'id' => 16
        ]);*/ ?>
    </div>
    <div class="review-form-box__form">
        <?php Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
            $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm',
                array(
                    // 'action'      => Yii::app()->createUrl('/review/create/'),
                    'id'          => 'review-form',
                    'type'        => 'vertical',
                    'htmlOptions' => [
                        'class' => 'form-my form-modal form-file', 
                        'data-type' => 'ajax-form',
                        'enctype' => 'multipart/form-data'
                    ],        
                )
            ); ?>

                <?= $form->textFieldGroup($model, 'username', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'data-original-title' => $model->getAttributeLabel('username'),
                            'data-content'        => $model->getAttributeDescription('username'),
                            'autocomplete' => 'off'
                        ],
                    ],
                ]); ?>

                <?= $form->textAreaGroup($model, 'text', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'data-original-title' => $model->getAttributeLabel('text'),
                            'data-content'        => $model->getAttributeDescription('text'),
                            'autocomplete' => 'off'
                        ],
                    ],
                ]); ?>
                
                <?= $form->hiddenField($model, 'rating'); ?>

                <div class="raiting-form">
                    <div class="raiting-form__header">
                        Оцените качество 
                    </div>
                    <div class="raiting-form__list raiting-list raiting-list-form fl fl-ai-c">
                        <div class="raiting-list__item" data-id="1"></div>
                        <div class="raiting-list__item" data-id="2"></div>
                        <div class="raiting-list__item" data-id="3"></div>
                        <div class="raiting-list__item" data-id="4"></div>
                        <div class="raiting-list__item" data-id="5"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="file-upload">
                        <label>
                            <?= $form->fileField($model, 'image'); ?>
                            <span class="fl fl-ai-c"><i class="fa fa-paperclip" aria-hidden="true"></i> <div id="count_file">Ваше фото</div></span>
                        </label>
                    </div>
                </div>

                <div class="form-bot form-bot-inline">
                    <div class="form-captcha">
                        <div class="g-recaptcha" data-sitekey="<?= Yii::app()->params['key']; ?>">
                        </div>
                        <?= $form->error($model, 'verifyCode');?>
                    </div>
                    <div class="form-button" style="display: inline-block;">
                        <button class="btn btn-green" id="reviewZayavka-button" data-send="ajax">Отправить</button>
                    </div>
                </div>

                <?php if (Yii::app()->user->hasFlash('review-success')): ?>
                    <div id="reviewModal" class="modal modal-my modal-my-xs fade" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header box-style">
                                    <div data-dismiss="modal" class="modal-close"><div></div></div>
                                    <div class="box-style__header">
                                        <div class="box-style__heading">
                                            Уведомление
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="message-success">
                                        Ваш отзыв успешно отправлен.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $('#reviewModal').modal('show');
                        setTimeout(function(){
                            $('#reviewModal').modal('hide');
                        }, 5000);
                    </script>
                <?php endif ?>
        <?php $this->endWidget(); ?>
    </div>
</div>

<?php Yii::app()->clientScript->registerScript('reviewZayavka-modal', "
    $(document).delegate('.file-upload input[type=file]', 'change', function(){
        // var inputFile = document.getElementById('ReviewImage_image').files;
        var inputFile = document.getElementById('Review_image').files;
        if(inputFile.length > 0){
            $('#count_file').text('Выбрано файлов ' + inputFile.length);
        }else{
            $('#count_file').text('Ваше фото');
        }
    });
") ?>