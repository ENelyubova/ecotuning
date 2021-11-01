<?php $photos = $model->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<div class="image-box fl fl-wr-w fl-al-it-c">
		<?php foreach ($photos as $key => $photo): ?>
			<div class="image-box__item">
				<?php if($fancybox) : ?>
					<a class="image-box__link fl fl-al-it-c fl-ju-co-c" data-fancybox="image" href="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">
				<?php endif; ?>
                    <picture>
			            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
			            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

			            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
			        </picture>
				<?php if($fancybox) : ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endforeach ?>
	</div>
<?php endif; ?>

<div class="content fl fl-wr-w fl-al-co-c">
	<div class="sideways-box__info company-home__info fl fl-di-c fl-ju-co-c">
		<?php 
			$companyButName = $page->getAttributeValue('box1')['butName'];
			$companyButLink = $page->getAttributeValue('box1')['butLink'];
		 ?>
		<div class="box-style">
			<div class="box-style__header">
				<div class="box-style__heading">
					<?= $page->getAttributeValue('box1')['name']; ?>
				</div>
			</div>
		</div>
		<div class="sideways-box__desc company-home__desc">
			<?= $page->getAttributeValue('box1')['value']; ?>
		</div>
		<?php if($companyButLink) : ?>
			<div class="sideways-box__but company-home__but fl">
				<a class="but but-white but-svg but-svg-right" href="<?= $companyButLink; ?>">
					<span><?= ($companyButName) ?: 'О компании'; ?></span>
					<?= file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() . '/images/svg/icon-arrow.svg'); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
	<div class="sideways-box__media company-home__media">
		<div class="sideways-box__gallery company-home__gallery">
			<?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
				'id' => $page->id,
				'code' => 'box1',
				'view' => 'sideways-gallery-home'
			]); ?>
		</div>
	</div>
</div>