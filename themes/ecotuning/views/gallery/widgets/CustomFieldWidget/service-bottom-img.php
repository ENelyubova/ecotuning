<?php $photos = $model->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<?php foreach ($photos as $key => $photo): ?>
		<?php if ($key >= 0 && $key < 1) : ?>
			<div class="small-img" data-aos="fade-right" data-aos-once="true">
	        	<picture class="absolute-img-picture">
		            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

		            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
		        </picture>
	    	</div>
	    <?php endif; ?>
    <?php endforeach ?>
<?php endif; ?>