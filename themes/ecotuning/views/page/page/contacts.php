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

<div class="page-txt page-contacts pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <h2 class="title-page"><?= $model->title; ?></h2>
        <div class="page-contacts-body js-load-chapche">
            <div class="contacts-block fl fl-w fl-ai-c fl-jc-sb">
                <?php if ($model->image): ?>
                    <div class="contacts-block__img">
                        <div class="image-wrap">
                            <img src="<?= $model->getImageUrl(); ?>" class="absolute-img" href="<?= $model->getImageUrl(); ?>">
                        </div>
                    </div>
                <?php endif ?>
                <div class="contacts-block__text">
                    <div class="contacts-block__item">
                        <?= $model->body; ?>
                    </div>
                    <div class="contacts-block__item contacts-block__phone">
                        <div class="contacts-block__label">
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'mode']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="fl fl-ai-c">
                            <img class="contact-icon" src="<?= $this->mainAssets . '/images/icon/call.png' ?>" alt="">
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                            <?php endif; ?>
                        </div>
                        <p class="contacts-block__label">Мастера компании работают в согласованном режиме</p>
                    </div>
                    <div class="contacts-block__item contacts-block__address">
                        <p class="contacts-block__label">Адрес офиса:</p>
                        <div class="fl fl-ai-c">
                            <img class="contact-icon" src="<?= $this->mainAssets . '/images/icon/map.png' ?>" alt="">
                            <span>
                                <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="contacts-block__item contacts-block__email">
                        <p class="contacts-block__label">Мы всегда на связи</p>
                        <div class="fl fl-ai-c">
                            <img class="contact-icon" src="<?= $this->mainAssets . '/images/icon/email.png' ?>" alt="">
                            <span>
                                <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <div class="contacts-block__item contacts-block__social">
                        <p class="contacts-block__label">Мессендждеры и соцсети:</p>
                        <div class="social-panel fl fl-ai-c">
                            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="page-map">
                <div class="subtitle">Офис ЭкоТюнинг на карте</div>
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aace0534d79f8b9cfdc83a44a03d67ca5537c9e0742ed4233552cbe1170029679&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>

        <div class="contacts-form pt">
            <h2 class="subtitle">Запишитесь на консультацию <br>и обслуживание </h2>
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
