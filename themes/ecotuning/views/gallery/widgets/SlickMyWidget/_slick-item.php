<div class="slider__item">
	<div class="slider-shadow"></div>
	<div class="slider__info">
		<div class="content-site">
			<?php $this->widget("application.modules.store.widgets.SearchFilterProduct", ['ajax' => true]); ?>
			
			<h1 class="slider__title"><?= $data->image->name; ?></h1>
		</div>
    </div>
	<div class="slider__img">
		<picture class="absolute-img-picture">
            <source media="(min-width: 401px)" srcset="<?= $data->image->getImageUrlWebp(0, 0, true, null,'file'); ?>" type="image/webp">
            <source media="(min-width: 401px)" srcset="<?= $data->image->getImageNewUrl(0, 0, true, null,'file'); ?>">

            <source media="(min-width: 1px)" srcset="<?= $data->image->getImageUrlWebp(400, 580, true, null,'file'); ?>" type="image/webp">
            <source media="(min-width: 1px)" srcset="<?= $data->image->getImageNewUrl(400, 580, true, null,'file'); ?>">

            <img src="<?= $data->image->getImageNewUrl(0, 0, true, null,'file'); ?>" alt="<?= $data->image->alt; ?>">
        </picture>
	</div>
</div>

