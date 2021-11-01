<?php $photos = $pages->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<?php foreach ($photos as $key => $photo): ?>
		<?php if ($key >= 0 && $key < 1) : ?>
        	<picture class="absolute-img-picture">
	            <source media="(min-width: 1px)" srcset="<?= $pages->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
	            <source media="(min-width: 1px)" srcset="<?= $pages->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

	            <img src="<?= $pages->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
	        </picture>
	    <?php endif; ?>
    <?php endforeach ?>
<?php endif; ?>