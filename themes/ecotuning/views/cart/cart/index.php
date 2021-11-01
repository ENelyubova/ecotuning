<?php
/* @var $this CartController */
/* @var $positions Product[] */
/* @var $order Order */
/* @var $coupons Coupon[] */

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();

$this->title = Yii::t('CartModule.cart', 'Cart');
$this->breadcrumbs = [
    /*Yii::t("CartModule.cart", 'Catalog') => ['/store/product/index'],
*/    Yii::t("CartModule.cart", 'Лист заказа')
];
Yii::app()->getClientScript()->registerScript('cart-scripts', '
    $.getScript("https://www.google.com/recaptcha/api.js", function () {});
', CClientScript::POS_END);
?>

<script type="text/javascript">
    var yupeCartDeleteProductUrl = '<?= Yii::app()->createUrl('/cart/cart/delete/')?>';
    var yupeCartUpdateUrl = '<?= Yii::app()->createUrl('/cart/cart/update/')?>';
    var yupeCartWidgetUrl = '<?= Yii::app()->createUrl('/cart/cart/widget/')?>';
    var yupeCartEmptyMessage = '<h1 class="title-store"><?= Yii::t("CartModule.cart", "Cart is empty"); ?></h1><?= Yii::t("CartModule.cart", "There are no products in cart"); ?>';
</script>

<div class="store-container cart pb" id="cart-body">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>

        <h1 class="title-page"><?= Yii::t("CartModule.cart", "Лист заказа"); ?></h1>

        <?php if (Yii::app()->cart->isEmpty()): ?>
            <?= Yii::t("CartModule.cart", "Нет добавленных товаров"); ?>
        <?php else: ?>
            <div class="empty-cart">
                <?= Yii::t("CartModule.cart", "Нет добавленных товаров"); ?>
            </div>
            <?php $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm',
                [
                    'action' => ['/order/order/create'],
                    'id' => 'order-form',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'clientOptions' => [
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                        'validateOnType' => false,
                        'beforeValidate' => 'js:function(form){$(form).find("button[type=\'submit\']").prop("disabled", true); return true;}',
                        'afterValidate' => 'js:function(form, data, hasError){$(form).find("button[type=\'submit\']").prop("disabled", false); return !hasError;}',
                    ],
                    'htmlOptions' => [
                        'hideErrorMessage' => false,
                        'class' => 'order-form form-my',
                    ]
                ]
            );
            ?>
                <div class="cart-section fl fl-w fl-jc-sb">
                    <div class="cart-section__content cart-block">
                        <div class="order-box js-cart">
                            <div class="order-box__header order-box__header_black">
                                <div class="cart-list-header fl fl-ai-c">
                                    <div class="cart-list__column cart-list__column_info">Название машины и услуга</div>
                                    <div class="cart-list__column"><?= Yii::t("CartModule.cart", "Amount"); ?></div>
                                    <!-- <div class="cart-list__column cart-list__column_price"><?= Yii::t("CartModule.cart", "Price"); ?></div> -->
                                    <div class="cart-list__column cart-list__column_sum"><?= Yii::t("CartModule.cart", "Стоимость услуги"); ?></div>
                                </div>
                            </div>
                            <div class="cart-list">
                                <?php foreach ($positions as $position): ?>
                                    <div class="cart-list__item">
                                        <?php $positionId = $position->getId(); ?>
                                        <?php $productUrl = ProductHelper::getUrl($position->getProductModel()); ?>
                                        <?= CHtml::hiddenField('OrderProduct['.$positionId.'][product_id]', $position->id); ?>
                                        <input type="hidden" class="position-id" value="<?= $positionId; ?>"/>

                                        <div class="cart-item js-cart__item">
                                            <div class="cart-item__info" data-text='Товар'>
                                                <div class="cart-item__thumbnail">
                                                    <img src="<?= $position->getProductModel()->getImageUrl(90, 90, false); ?>"
                                                         class="cart-item__img"/>
                                                </div>
                                                <div class="cart-item__content grid-module-4">
                                                    <div class="cart-item__title">
                                                        <a href="<?= $productUrl; ?>" class="cart-item__link"><?= CHtml::encode(
                                                                $position->title
                                                            ); ?></a>
                                                    </div>
                                                    <?php foreach ($position->selectedVariants as $variant): ?>
                                                        <h6><?= $variant->attribute->title; ?>: <?= $variant->getOptionValue(); ?></h6>
                                                        <?= CHtml::hiddenField('OrderProduct[' . $positionId . '][variant_ids][]', $variant->id); ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                
                                            <div class="cart-item__quantity fl fl-d-c fl-ai-c" data-text='<?= Yii::t("CartModule.cart", "Amount"); ?>'>
                                                <div class="cart-item__spinput">
                                                    <span data-min-value='1' data-max-value='99' class="spinput js-spinput">
                                                        <span class="spinput__minus js-spinput__minus cart-quantity-decrease"
                                                              data-target="#cart_<?= $positionId; ?>">-</span>
                                                        <?= CHtml::textField(
                                                            'OrderProduct['.$positionId.'][quantity]',
                                                            $position->getQuantity(),
                                                            ['id' => 'cart_'.$positionId, 'class' => 'spinput__value position-count']
                                                        ); ?>
                                                        <span class="spinput__plus js-spinput__plus cart-quantity-increase"
                                                              data-target="#cart_<?= $positionId; ?>">+</span>
                                                    </span>
                                                </div>
                                                <div class="cart-item__price" data-text='<?= Yii::t("CartModule.cart", "Price"); ?>'>
                                                    <span class="position-price" data-price="<?= $position->getPrice()?>"><?= str_replace('.00', '', number_format($position->getPrice(), 2, '.', ' ')); ?></span>
                                                    <span class="ruble"><svg width="10" height="12" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.03696 15V12.144H0.209961V10.779H2.03696V8.90998H0.209961V7.31398H2.03696V0.00598145H5.98496C7.81896 0.00598145 9.17696 0.376982 10.059 1.11898C10.955 1.86098 11.403 2.93898 11.403 4.35298C11.403 5.78098 10.92 6.90098 9.95396 7.71298C8.98796 8.51098 7.56696 8.90998 5.69096 8.90998H3.92696V10.779H7.39196V12.144H3.92696V15H2.03696ZM3.92696 7.31398H5.41796C6.69196 7.31398 7.67896 7.10398 8.37896 6.68398C9.09296 6.26398 9.44996 5.50798 9.44996 4.41598C9.44996 3.46398 9.15596 2.75698 8.56796 2.29498C7.97996 1.83298 7.06296 1.60198 5.81696 1.60198H3.92696V7.31398Z" fill="black"></path></svg>/шт</span>
                                                </div>
                                            </div>

                                            <div class="cart-item__summ" data-text='<?= Yii::t("CartModule.cart", "Sum"); ?>'>
                                                <span class="position-sum-price" data-price="<?= $position->getSumPrice()?>"><?= str_replace('.00', '', number_format($position->getSumPrice(), 2, '.', ' ')); ?></span>
                                                <span class="ruble">
                                                    <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.03696 15V12.144H0.209961V10.779H2.03696V8.90998H0.209961V7.31398H2.03696V0.00598145H5.98496C7.81896 0.00598145 9.17696 0.376982 10.059 1.11898C10.955 1.86098 11.403 2.93898 11.403 4.35298C11.403 5.78098 10.92 6.90098 9.95396 7.71298C8.98796 8.51098 7.56696 8.90998 5.69096 8.90998H3.92696V10.779H7.39196V12.144H3.92696V15H2.03696ZM3.92696 7.31398H5.41796C6.69196 7.31398 7.67896 7.10398 8.37896 6.68398C9.09296 6.26398 9.44996 5.50798 9.44996 4.41598C9.44996 3.46398 9.15596 2.75698 8.56796 2.29498C7.97996 1.83298 7.06296 1.60198 5.81696 1.60198H3.92696V7.31398Z" fill="black"></path></svg>
                                                </span>

                                                <div class="cart-item__action">
                                                    <a class="js-cart__delete cart-delete-product"
                                                       data-position-id="<?= $positionId; ?>" href="#">
                                                        <i class="cart-delete" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="shopcart-infoText">
                                <p>Выезд мастера к заказчику осуществляется бесплатно в пределах Воронежской области и при условии продолжительности командировки не более 24 часов. В остальных случаях заказчик дополнительно к стоимости основных работ оплачивает транспортные расходы, расходы на проживание и питание сотрудника «ЭкоТюнинг», работающего на выезде. Расчет стоимости дополнительных расходов выполняется по заявке.</p>
                            </div>

                        </div>
                    </div>

                    <div class="cart-section__result">
                        <div class="cart-result">
                            <div class="cart-result__header">
                                <div class="cart-result-header">Ваш заказ</div>
                            </div>
                            <div class="cart-result__body">
                                <div class="cart-total fl fl-ai-c fl-jc-sb">
                                    <span class="cart-total__name">Услуги (<span id="cart-total-product-count"><?= Yii::app()->cart->getItemsCount(); ?></span>)</span>
                                    <span class="cart-total__res">
                                        <span id="cart-full-cost"><?= Yii::app()->cart->getCost(); ?></span> <svg width="10" height="12" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.03696 15V12.144H0.209961V10.779H2.03696V8.90998H0.209961V7.31398H2.03696V0.00598145H5.98496C7.81896 0.00598145 9.17696 0.376982 10.059 1.11898C10.955 1.86098 11.403 2.93898 11.403 4.35298C11.403 5.78098 10.92 6.90098 9.95396 7.71298C8.98796 8.51098 7.56696 8.90998 5.69096 8.90998H3.92696V10.779H7.39196V12.144H3.92696V15H2.03696ZM3.92696 7.31398H5.41796C6.69196 7.31398 7.67896 7.10398 8.37896 6.68398C9.09296 6.26398 9.44996 5.50798 9.44996 4.41598C9.44996 3.46398 9.15596 2.75698 8.56796 2.29498C7.97996 1.83298 7.06296 1.60198 5.81696 1.60198H3.92696V7.31398Z" fill="black"></path></svg>
                                    </span>
                                </div>
                            </div>
                            <div class="cart-result__footer">
                                <div class="cart-total fl fl-w fl-ai-fs fl-jc-sb">
                                    <span class="cart-total__name cart-result-header">Итого</span>
                                    <span class="cart-total__res cart-result-header">
                                        <span id="cart-full-cost-with-shipping"><?= Yii::app()->cart->getCost(); ?></span>
                                        <svg width="15" height="16" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.03696 15V12.144H0.209961V10.779H2.03696V8.90998H0.209961V7.31398H2.03696V0.00598145H5.98496C7.81896 0.00598145 9.17696 0.376982 10.059 1.11898C10.955 1.86098 11.403 2.93898 11.403 4.35298C11.403 5.78098 10.92 6.90098 9.95396 7.71298C8.98796 8.51098 7.56696 8.90998 5.69096 8.90998H3.92696V10.779H7.39196V12.144H3.92696V15H2.03696ZM3.92696 7.31398H5.41796C6.69196 7.31398 7.67896 7.10398 8.37896 6.68398C9.09296 6.26398 9.44996 5.50798 9.44996 4.41598C9.44996 3.46398 9.15596 2.75698 8.56796 2.29498C7.97996 1.83298 7.06296 1.60198 5.81696 1.60198H3.92696V7.31398Z" fill="#419708"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-shopcart-delivery cart-section__content">
                    <div class="panel-delivery">
                        <h4>Заполните, пожалуйста, две формы</h4>
                    </div>
                    <div class="panel-order">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->textFieldGroup($order, 'name', [
                                    'widgetOptions' => [
                                        'htmlOptions' => [
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->telFieldGroup($order, 'phone', [
                                    'widgetOptions' => [
                                        'htmlOptions'=>[
                                            'class' => 'data-mask',
                                            'data-mask' => 'phone',
                                            'placeholder' => 'Телефон',
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->textFieldGroup($order, 'email', [
                                    'widgetOptions' => [
                                        'htmlOptions' => [
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                        </div>
                        <h4>Куда должен выехать мастер? </h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->textFieldGroup($order, 'zipcode', [
                                    'widgetOptions' => [
                                        'htmlOptions' => [
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->textFieldGroup($order, 'city', [
                                    'widgetOptions' => [
                                        'htmlOptions' => [
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                            <div class="col-sm-12">
                                <?= $form->textAreaGroup($order, 'comment', [
                                    'widgetOptions' => [
                                        'htmlOptions' => [
                                            'rows' => '10',
                                            'style' => 'height: 160px'
                                        ]
                                    ]
                                ]); ?>
                            </div>
                        </div>
                        <div class="form-captcha">
                            <div class="g-recaptcha" data-sitekey="<?= Yii::app()->params['key']; ?>"></div>
                            <?= $form->error($order, 'verify');?>
                        </div>
                        <p class="form-policy">* - поля, отмеченные звёздочкой, обязательны для заполнения</p>
                        <div class="form-button">
                            <button type="submit" class="btn btn-green">Отправить заявку</button>
                        </div>
                        <div class="form-policy">
                            Нажимая на кнопку «Отправить заявку», я даю согласие на обработку персональных данных в соответствии с <a href="/uploads/politikaconf.rtf" target="_blank">"Политикой конфиденциальности"</a> компании Экотюнинг
                        </div>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </div>
</div>
