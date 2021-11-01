<?php
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile( $mainAssets . '/css/store-frontend.css' );
// Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/store.js' );
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/index.js', CClientScript::POS_END);
/* @var $category StoreCategory */
$this->headerClass = "header-home";

$this->title = $category->getMetaTitle();
$this->description = $category->getMetaDescription();
$this->keywords = $category->getMetaKeywords();
$this->canonical = $category->getMetaCanonical();

$this->breadcrumbs = [ Yii::t( "StoreModule.store", "Каталог техники" ) => [ '/store/product/index' ] ];

$this->breadcrumbs = array_merge(
    $this->breadcrumbs,
    $category->getBreadcrumbs( false )
);

?>
<!-- Конкретная категория -->
<?php $img_bg = $category->getImageParentCategoryUrl();  ?>

<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
  <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>
    
<!-- header -->
<div class="store-nav catalog-nav" style="<?= $img_bg ? 'background: radial-gradient(34.36% 41.11% at 67.3% 41.41%, rgba(255,197,109,0.33) 0%, rgba(255,223,140,0) 100%),linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('.$img_bg.') no-repeat; background-size: cover;': ''; ?> ">
    <div class="content-site">
        <h1 class="title-page color-white"><?= $category->getTitle(); ?></h1>
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
        <?php $infoParent = $category->getRootCategoryParent(); ?>
        <?php $this->widget("application.modules.store.widgets.SearchFilterProduct", [
                'category' => $category,
                'rootCategory' => $infoParent['id'],
                'level' => $infoParent['level']
            ]); ?>
    </div>
</div><!-- header -->

<div class="store-container store-container-category pb"> 
    <div class="content-site">
        <?php $child = $category->children(['condition' => 'status=1']); ?>

        <?php if($category->parent && !empty($child)) : ?>
            <h2 class="subtitle"><?= $category->name_short; ?></h2>
        <?php endif; ?>

        <?php if($child) : ?>
            <div class="category-block fl fl-w">
                <?php foreach ($child as $key => $item) : ?>
                    <?php $children = $item->children(['condition' => 'status=1']); ?>
                    <?php if($children) : ?>
                        <div class="category-block__panel">
                            <a class="category__name subtitle" href="<?= $item->getCategoryUrl(); ?>"><?= $item->name_short; ?></a>

                            <div class="category-block-wrap fl fl-w">
                                <?php foreach ($children as $key => $data) : ?>
                                    <?php $this->renderPartial('_item', ['data' => $data]); ?>
                                <?php endforeach; ?>
                            </div>  
                        </div>
                    <?php else: ?>
                        <?php $this->renderPartial('_item', ['data' => $item]); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        <?php else : ?>
            <h2 class="subtitle">Выберите тип</h2>
            <div class="product-list fl fl-w">
                <?php $this->widget(
                    'bootstrap.widgets.TbListView',
                    [
                        'dataProvider' => $dataProvider,
                        'id' => 'product-box',
                        'itemView' => '//store/product/_item',
                        'summaryText' => '',
                        'enableHistory' => true,
                        'cssFile' => false,
                        'itemsCssClass' => 'product-type-box',
                        // 'summaryText'=>"Товаров на странице: <span>{start} - {end} из {count}</span>",
                        'htmlOptions' => [
                          'class' => 'product-type fl-jc-sb'
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
                <?php if($category->image): ?>
                    <div class="category-image">
                        <div class="category-image-wrap">
                            <picture class="absolute-img-pictur">
                                <source media="(min-width: 401px)" srcset="<?= $category->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                                <source media="(min-width: 401px)" srcset="<?= $category->getImageNewUrl(0, 0, true, null,'image'); ?>">
                            
                                <source media="(min-width: 1px)" srcset="<?= $category->getImageUrlWebp(560, 390, true, null,'image'); ?>" type="image/webp">
                                <source media="(min-width: 1px)" srcset="<?= $category->getImageNewUrl(560, 390, true, null,'image'); ?>">
                            
                                <img src="<?= $category->getImageNewUrl(560, 390, true, null,'image'); ?>" alt="<?= $category->title; ?>">
                            </picture>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if($category->description): ?>
            <div class="seo-block">
                <?= $category->description; ?>
            </div>
        <?php endif; ?>
    </div>
</div>



