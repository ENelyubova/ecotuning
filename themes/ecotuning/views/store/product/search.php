<?php

$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
Yii::app()->getClientScript()->registerCssFile($mainAssets . '/css/store-frontend.css');
Yii::app()->getClientScript()->registerScriptFile($mainAssets . '/js/store.js');

/* @var $category StoreCategory */
// $this->layout = "//layouts/catalog";

$this->title = Yii::t("StoreModule.store", "Search");
$this->breadcrumbs = [
    Yii::t("StoreModule.store", "Catalog") => ['/store/product/index'],
    Yii::t("StoreModule.store", "Search"),
];
?>


<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
  <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="store-container store-container-catalog pb">
    <div class="content-site">
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
        <h1 class="title-page color-white">Каталог техники</h1>
        <div id="product-scroll">
          <?php $this->widget(
              'bootstrap.widgets.TbListView',
              [
                  'dataProvider' => $dataProvider,
                  'id' => 'product-box',
                  'itemView' => '//store/product/_item-search',
                  'summaryText' => '',
                  'enableHistory' => true,
                  'cssFile' => false,
                  'itemsCssClass' => 'product-box product-list fl fl-w',
                  // 'summaryText'=>"Товаров на странице: <span>{start} - {end} из {count}</span>",
                  'htmlOptions' => [
                    'class' => 'product-box-listView'
                  ],
                  'viewData' => [
                      'isButton' => true
                  ],
                  'emptyText'=>'В данной категории нет товаров.',
                  // 'summaryText'=>"Товары <span>{start} - {end} из {count}</span>",
                  'template'=>'
                      {items}
                      {pager}
                  ',
                  'ajaxUpdate'=>true,
                  'enableHistory' => false,
                  /*
                  'sortableAttributes' => [
                      'name',
                      'price',
                  ],*/
              ]
          ); ?>
      </div>
    </div>
    
</div>

