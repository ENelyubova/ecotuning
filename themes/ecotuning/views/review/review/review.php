
<?php
$this->title = Yii::app()->getModule('review')->metaTitle ?: Yii::t('ReviewModule.news', 'Отзывы');
$this->description = Yii::app()->getModule('review')->metaDescription ?: Yii::app()->getModule('yupe')->siteDescription;

$this->keywords = Yii::app()->getModule('review')->metaKeyWords ?: Yii::app()->getModule('yupe')->siteKeyWords;
// $this->breadcrumbs = $this->getBreadCrumbs();
$this->breadcrumbs = ["Отзывы"];

?>


<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
    <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="page-txt page-reviews pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <h1 class="title-page">Отзывы</h1>

    	<?php //$this->widget('application.components.FtListView', [
         // $this->widget('application.components.MyListView', [
         $this->widget('bootstrap.widgets.TbListView', [
            'id' => 'review-box',
            'itemView' => '_item',
            'dataProvider' => $dataProvider,
            'itemsCssClass' => 'reviews-box reviews-page-box',
            'template' => '{items}{pager}',
            'template'=>'
                {sorter}
                {items}
                <div class="">
                    {pager}
                </div>
            ',
           /* 'sortableAttributes' => [
                'date_created' => 'По дате',
                'rating' => 'По оценке',
                // 'countImage' => 'С фотографией',
            ],*/

            'sorterHeader' => 'Сортировка',
            'htmlOptions' => [
                "class" => "review-box-listView"
            ],
            'pagerCssClass' => 'pagination-box',
            // 'emptyText' => '',
            'emptyTagName' => 'div',
            'emptyCssClass' => 'empty-form',
            'ajaxUpdate'=>true,
            'enableHistory' => false,
            // 'pager' => [
            //     'class' => 'application.components.ShowMorePager',
            //     'buttonText' => 'Читать все отзывы',
            //     'wrapTag' => 'div',
            //     'htmlOptions' => [
            //         'class' => 'but-link'
            //     ],
            //     'wrapOptions' => [
            //         'class' => 'review-pagination'
            //     ],
            // ]
            
            'pagerCssClass' => 'pagination-box',
            'pager' => [
                'header' => '',
                'lastPageLabel' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                'firstPageLabel' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
                'prevPageLabel' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                'nextPageLabel' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                'maxButtonCount' => 5,
                'htmlOptions' => [
                    'class' => 'pagination'
                ],
            ]
        ]); ?>
    </div>
    <div class="review-form" id="review-form-more">
        <div class="content-site">
            <h2>Оставить отзыв</h2>
            <?php $this->widget('application.modules.review.widgets.ReviewWidget'); ?>
        </div>
    </div>
</div>