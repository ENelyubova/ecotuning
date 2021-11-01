<?php if($model) : ?>
	<div class="reviews pt pb">
    	<div class="content-site">
			<div class="heading-block fl fl-w fl-ai-fe fl-jc-sb">
		        <h2 class="heading">Отзывы клиентов о нашей работе</h2>
		        <div class="reviews-arrows">
		            <div class="arrows"></div>
		        </div>
		    </div>
			<div class="reviews-block slick-slider">
				<?php foreach ($model as $key => $item) : ?>
					<div>
						<?php $this->render('../../review/_item-home', [
							'data' => $item,
							'is_more' => true
						]) ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>