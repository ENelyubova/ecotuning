<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;
?>

<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
    <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="page-txt pb js-load-chapche">
	<div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
    
        <h1 class="title-page">Частые вопросы</h1>
        <?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
            'id'=> 13,
            'view' => 'questions'
        ]); ?> 

        <div class="contacts-form pt">
            <h2 class="subtitle">Не нашли ответа на свой вопрос? <br>Задайте его нам</h2>
            <?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
                'id' => 'contactModal',
                'view' => 'contact-form',
                'formClassName' => 'StandartForm',
                'buttonModal' => false,
                'titleModal' => 'Оставьте <span>заявку</span>',
                'subTitleModal' => 'и мы Вам перезвоним!',
                'showCloseButton' => false,
                'isRefresh' => true,
                'eventCode' => 'napisat-nam',
                'successKey' => 'napisat-nam',
                'showAttributeBody' => true,
                'showAttributeEmail' => true,
                'showAttributeCheck' => true,
                'modalHtmlOptions' => [
                    'class' => 'modal-my modal-my-xs',
                ],
                'formOptions' => [
                    'htmlOptions' => [
                        'class' => 'form-my',
                    ]
                ],
                'modelAttributes' => [
                    'theme' => 'Обратный звонок',
                ],
            ]) ?>
        </div>
    </div>
</div>

