<div class="portfolio pt pb">
	<div class="content-site">
		<div class="heading-block fl fl-w fl-ai-fe fl-jc-sb">
			<h2 class="heading">Владельцы этой техники <br>уже зарабатывают больше!</h2>
			<div class="portfolio-arrows">
		    	<div class="arrows fl fl-ai-c"></div>
		    </div>
		</div>
		<div class="portfolio-slider slick-slider">
		    <?php foreach ($models as $key => $model): ?>
		        <?php Yii::app()->controller->renderPartial('//news/news/_itemPortfolioHome', ['data' => $model]) ?>
		    <?php endforeach; ?>
		</div>
	</div>
</div>


