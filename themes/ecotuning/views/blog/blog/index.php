<?php
/**
 * @var $this BlogController
 * @var $form TbActiveForm
 * @var $blogs Blog
 */
$this->title = Yii::t('BlogModule.blog', 'Blogs');
$this->description = Yii::t('BlogModule.blog', 'Blogs');
$this->keywords = Yii::t('BlogModule.blog', 'Blogs');
?>

<?php $this->breadcrumbs = [Yii::t('BlogModule.blog', 'Блог компании "Экотюнинг"')]; ?>

<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
    <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="page-txt page-blog pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <h1 class="title-page">Блог компании "Экотюнинг"</h1>
        <div class="">
            <?php
                $this->widget(
                    'application.components.FtListView',
                    [
                        'dataProvider'       => $dataProvider,
                        'template'           => '{items} {pager}',
                        // 'sorterCssClass'     => 'sorter pull-left',
                        'itemView'           => '//blog/post/_item',
                        'itemsCssClass' => 'blog-list',
                        'ajaxUpdate'         => false,
                        /*'sortableAttributes' => [
                            'name',
                            'postsCount',
                            'membersCount'
                        ],*/
                        'pagerCssClass' => 'pagination-box',
                        // 'emptyText' => '',
                        // 'emptyTagName' => 'div',
                        'pager' => [
                            'class' => 'application.components.ShowMorePager',
                            'buttonText' => 'Показать еще',
                            'wrapTag' => 'div',
                            'htmlOptions' => [
                                'class' => 'btn btn-orange'
                            ],
                            'wrapOptions' => [
                                'class' => 'news-btn-all'
                            ],
                        ]

                    ]
                );
            ?>
        </div>
    </div>
</div>



