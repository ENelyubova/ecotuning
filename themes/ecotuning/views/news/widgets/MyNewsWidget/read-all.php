<?php if ($models): ?>
	<div class="heading-block fl fl-w fl-ai-c fl-jc-sb">
	    <h2>Другие кейсы</h2>
	    <div class="arrows"></div>
	</div>
	<div class="portfolio-case-carousel slick-slider fl fl-w">
	    <?php foreach ($models as $key => $model): ?>
	        <?php Yii::app()->controller->renderPartial('//news/news/_item', ['data' => $model]) ?>
	    <?php endforeach; ?>
	</div>
<?php endif; ?>


