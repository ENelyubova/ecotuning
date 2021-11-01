<?php $photos = $model->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<?php foreach ($photos as $key => $photo): ?>
		<?php if ($key >= 0 && $key < 1) : ?>
			<div class="companyBox-one-left">
	        	<picture class="absolute-img-picture">
	        		<source media="(min-width: 401px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 401px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

		            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(270, 530, true,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(270, 530, true,  $photo['image']); ?>">

		            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
		        </picture>
	    	</div>
	    <?php endif; ?>
	    <?php if ($key >= 1 && $key < 2) : ?>
	    	<div class="companyBox-one-right">
	    		<picture class="absolute-img-picture">
					<source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

		            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(380, 530, true,  $photo['image']); ?>" type="image/webp">
		            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(380, 530, true,  $photo['image']); ?>">

		            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
		        </picture>
	    	</div>
	    <?php endif; ?>
    <?php endforeach ?>
<?php endif; ?>