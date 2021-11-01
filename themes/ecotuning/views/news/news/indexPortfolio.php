<?php
$this->title = Yii::t('NewsModule.news', 'Портфолио');
$this->breadcrumbs = [Yii::t('NewsModule.news', 'Портфолио')];
?>


<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
  <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="page-txt page-portfolio pb">
	<div class="content-site">
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
	            'links' => $this->breadcrumbs,
		    ]); ?>

		<h1 class="title-page"><?= Yii::t('NewsModule.news', 'Портфолио') ?></h1>

		<?php $this->widget('application.components.FtListView', [
			'id'=> 'portfolio-box',
		    'dataProvider' => $dataProvider,
	        'itemView' => '_itemPortfolio',
	        'summaryText' => '',
	        'template'=>'{items} {pager}',
	        'itemsCssClass' => 'portfolio-block',
		    'htmlOptions' => [
		        // "class" => ""
		    ],
		    'pagerCssClass' => 'pagination-box',
		    // 'emptyText' => '',
		    // 'emptyTagName' => 'div',
		    'pager' => [
		        'class' => 'application.components.ShowMorePager',
		        'buttonText' => 'Показать еще',
		        'wrapTag' => 'div',
		        'htmlOptions' => [
		            'class' => 'btn btn-green'
		        ],
		        'wrapOptions' => [
		            'class' => 'news-btn-all'
		        ],
		    ]
		]); ?>
	</div>
</div>

