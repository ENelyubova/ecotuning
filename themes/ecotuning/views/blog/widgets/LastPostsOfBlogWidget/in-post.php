<?php Yii::import('application.modules.blog.BlogModule'); ?>
<?php if ($posts): ?>

	<div class="post-read-all pt">
	    <div class="heading-block fl fl-w fl-ai-c fl-jc-sb">
	        <div class="heading">Читайте также</div>
	        <div class="arrows"></div>
	    </div>
		<div class="post-carousel">
	        <?php foreach ($posts as $data): ?>
	            <div class="blog-list__item blog-item">
			    	<div class="blog-item__img">
				        <?= CHtml::image(
				            $data->getImageUrl(),
				            CHtml::encode($data->title),
				            ['class' => 'absolute-img']
				        ); ?>
				    </div>
				    <div class="blog-item__text">
				        <div class="blog-item__date fl fl-ai-c">
				            <?= Yii::app()->getDateFormatter()->formatDateTime(
				                $data->publish_time,
				                "short",
				                false
				            ); ?>
				        </div>
				        <div class="blog-item__title">
				            <?= CHtml::link(
				                CHtml::encode($data->title),
				                ['/blog/post/view', 'slug' => $data->slug]
				            ); ?>
				        </div>
				        <div class="blog-item__desc"><?= strip_tags($data->quote); ?></div>
				    </div>
				</div>
	        <?php endforeach ?>
		</div>
	</div>
<?php endif ?>
