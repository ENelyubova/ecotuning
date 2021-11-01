<?php

/* @var $product Product */
// $this->layout = "//layouts/catalog";
$this->headerClass = "header-home";

$this->title = $product->getMetaTitle();
$this->description = $product->getMetaDescription();
$this->keywords = $product->getMetaKeywords();
$this->canonical = $product->getMetaCanonical();

$mainAssets = Yii::app()->getModule( 'store' )->getAssetsUrl();
/*Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/jquery.simpleGal.js' );

Yii::app()->getClientScript()->registerCssFile( Yii::app()->getTheme()->getAssetsUrl() . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( Yii::app()->getTheme()->getAssetsUrl() . '/js/store.js' );*/

$this->breadcrumbs = array_merge(
    [ Yii::t( "StoreModule.store", 'Catalog' ) => [ '/store/product/index' ] ],
    $product->category ? $product->category->getBreadcrumbs( true ) : [], [ CHtml::encode( $product->name ) ]
);

?>
<?php $img_bg = $product->category->getImageParentCategoryUrl();  ?>

<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
  <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<!-- header -->
<div class="product-nav store-nav" style="<?= $img_bg ? 'background: radial-gradient(34.36% 41.11% at 67.3% 41.41%, rgba(255,197,109,0.33) 0%, rgba(255,223,140,0) 100%),linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('.$img_bg.') no-repeat; background-size: cover;': ''; ?> ">
    <div class="content-site">
        <h1 class="title-page color-white"><?= $product->getTitle(); ?></h1>
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->widget(
                        'bootstrap.widgets.TbBreadcrumbs',
                        [
                          'links' => $this->breadcrumbs,
                        ]
                    );?>
                </div>
            </div>        
        </div>
    </div>
</div><!-- header -->


<div class="store-container product-container pb">
    <div class="content-site">
        <div class="product-view js-product-item fl fl-w fl-jc-sb">
            <div class="product-view__info">
                <div class="product-view__title" itemprop="name"><?= CHtml::encode($product->getTitle()); ?></div>

                <?php if($product->short_description): ?>
                    <div class="product-view__params product-params">
<!--                        <div class="product-params__item">-->
                            <!-- <div class="product-params__title">Мощность мотора</div> -->
<!--                            <div class="product-params__table">-->
                                <?= $product->short_description;  ?>
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                <?php endif; ?>

                <div class="product-view__desc">
                    <h3>Стоимость настройки включает</h3>
                    <ul>
                        <li>Диагностика машины</li>
                        <li>Резервная копия оригинального ПО</li>
                        <li>Индивидуальная настройка вашей машины</li>
                    </ul>
                    <hr>
                    <h3>Гарантия</h3>
                    <ul>
                        <li>Три года на программное обеспечение </li>
                    </ul>
                </div>
                
            </div>

            <div class="product-view__img">
                <div class="image-preview">
                    <a class="fl fl-ai-c fl-jc-c" data-fancybox="image" href="<?= StoreImage::product($product); ?>">
                        <img 
                            class="gallery-image js-product-image" 
                            src="<?= StoreImage::product($product); ?>" 
                            itemprop="image"
                        />
                    </a>
                </div>
                <div class="product-view__price">
                    <p class="product-price-desc">Цена чип-тюнинга</p>
                    <input type="hidden" id="base-price" value="<?= round($product->getResultPrice(), 2); ?>"/>
                    <div class="product-price">
                        <?= str_replace('.00', '', number_format($product->getResultPrice(), 2, '.', ' ')); ?> <span class="ruble">руб</span>
                    </div>
                </div>

                <form action="<?= Yii::app()->createUrl('cart/cart/add'); ?>" method="post" data-max-value='<?= Yii::app()->getModule('store')->controlStockBalances ? $product->getAvailableQuantity() : 1000; ?>'>
                    <input type="hidden" name="Product[id]" value="<?= $product->id; ?>"/>
                    <?= CHtml::hiddenField(
                        Yii::app()->getRequest()->csrfTokenName,
                        Yii::app()->getRequest()->csrfToken
                    ); ?>
                    <div class="product-view__button fl fl-w fl-ai-c">
                        <?php if (Yii::app()->hasModule('order')) : ?>
                        <div class="product-button__item product-box-spinput product__quantity hidden">
                            <input type="hidden" name="Product[id]" value="<?= $product->id; ?>"/>
                            <?php
                                $minQuantity = 1;
                                $maxQuantity = Yii::app()->getModule('store')->controlStockBalances ? $product->getAvailableQuantity() : 1000;
                            ?>
                            <span data-min-value='<?= $minQuantity; ?>' data-max-value='<?= $maxQuantity; ?>'
                                  class="spinput js-spinput">
                                <span class="spinput__minus js-spinput__minus product-box-quantity-decrease"></span>
                                <input name="Product[quantity]" value="1" data-product-id="<?= $product->id; ?>" class="spinput__value"/>
                                <span class="spinput__plus js-spinput__plus product-box-quantity-increase"></span>
                            </span>
                        </div>
                            <div class="product-view-addCart">
                                <a href="<?= ($product->getIsProductCart()) ? Yii::app()->createUrl('cart/cart/index') : '#'; ?>" 
                                    class="product__cart product-cart btn btn-green js-product-but <?= ($product->getIsProductCart()) ? 'but-go-cart' : 'quick-add-product-to-cart but-svg but-svg-left but-animation'; ?> product-button fl fl-ai-c fl-jc-c" 
                                    data-product-id="<?= $product->id; ?>" 
                                    data-cart-add-url="<?= Yii::app()->createUrl('/cart/cart/add');?>">
                                    <!-- <i class="icon icon-load"></i> -->
                                    <?php if($product->getIsProductCart()) : ?>
                                        <span>Добавлено</span>
                                    <?php else : ?>
                                        <span>Добавить в лист заказа</span>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="product-view__hidden hidden">
                                <span id="product-result-price"><?= round($product->getResultPrice(), 2); ?></span> x
                                <span id="product-quantity">1</span> =
                                <span id="product-total-price"><?= round($product->getResultPrice(), 2); ?></span>
                                <span class="ruble"> <?= Yii::t("StoreModule.store", Yii::app()->getModule('store')->currency); ?></span>
                            </div>
                            <a class="btn btn-link" href="/questions">Частые вопросы</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>