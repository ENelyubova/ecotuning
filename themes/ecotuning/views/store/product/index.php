<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile($mainAssets . '/css/store-frontend.css');
// Yii::app()->getClientScript()->registerScriptFile($mainAssets . '/js/store.js');

/* @var $category StoreCategory */
$this->headerClass = "header-home";

$this->title = Yii::app()->getModule('store')->metaTitle ?: Yii::t('StoreModule.store', 'Catalog');
$this->description = Yii::app()->getModule('store')->metaDescription;
$this->keywords = Yii::app()->getModule('store')->metaKeyWords;

$this->breadcrumbs = [Yii::t("StoreModule.store", "Catalog")];
?>


<!-- Каталог -->
<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
  <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="store-nav catalog-nav">
    <div class="content-site">
        <h1 class="title-page color-white">Каталог техники</h1>
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
        <?php $this->widget("application.modules.store.widgets.SearchFilterProduct"); ?>
    </div> 
</div>

<div class="store-container store-container-catalog pb">
    <div class="content-site">
        <div class="char-filter js-filter-char fl fl-ai-c">
            <div class="all-brands js-charFilter" data-value='all'>Все бренды</div>
            <?php $alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'] ?>
            <?php $char = ''; $chars = []; ?>
            <?php foreach($brands as $key=>$brand): ?>
                <?php $current = mb_substr($brand->name, 0, 1); ?>
                <?php if($char != $current): ?>
                    <?php $char = $current; ?>
                    <?php $chars[]= $char; ?>
                <?php endif; ?>  
            <?php endforeach; ?>
        
            <?php foreach($alphabet as $key=>$value): ?>
                <?php $flags = false; ?>
                <?php if(array_search($value, $chars) !== false): ?>
                    <?php $flags = true; ?>
                <?php endif; ?>
                <div class="char-filter__item <?= $flags ? 'js-charFilter' : 'disabled'; ?>" data-value='<?= $value ?>'><?= $value ?></div>
            <?php endforeach; ?>
        </div>

        <div class="brand-block">
            <?php $char = ''; ?>
            <?php foreach($brands as $key=>$brand): ?>
                <?php $brandUrl = $brand->getCategoryUrl();?>
                <?php $current = mb_substr($brand->name_short, 0, 1); ?>
                <?php if($char != $current): ?>
                    <?php $char = $current; ?>
                    <?php if($key != 0): ?>
                        </div>
                        </div>
                    <?php endif ?>
                    <div class="brand-block__panel js-brandPanel" data-brandPanel="<?= $char ?>"> 
                        <span class="char"><?= $char ?></span>
                        <div class="brand-list fl fl-w fl-ai-c">
                <?php endif; ?>
                    <div class="brand-list__item fl fl-d-c fl-ai-c">
                        <a href="<?= $brandUrl; ?>">
                            <img src="<?= $brand->getImageUrl(190, 190, false); ?>"/>
                        </a>
                        <a class="brand-name" href="<?= $brandUrl; ?>"><?= CHtml::encode($brand->name_short); ?></a>
                    </div>
                <?php if (!next($brands)): ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="seo-block fl fl-w fl-jc-sb">
            <div class="seo-block-item">
                <h2>Начните зарабатывать <br>больше вместе с нами</h2>
                <p>Разнообразный и богатый опыт укрепление и развитие структуры в значительной степени обуславливает создание форм развития. Товарищи! рамки и место обучения кадров позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Разнообразный и богатый опыт начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации новых предложений. Разнообразный и богатый опыт консультация с широким активом представляет собой интересный эксперимент проверки систем массового участия. Задача организации, в особенности же дальнейшее развитие различных форм деятельности позволяет оценить значение систем массового участия.</p>
            </div>
            <div class="seo-block-item fl fl-jc-c">
                <img src="<?= $this->mainAssets . '/images/image1.png' ?>" alt="">
            </div>
        </div>
    </div>
</div>


