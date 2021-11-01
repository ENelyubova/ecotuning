 <div class="category-block__item subcategory fl fl-ai-c fl-jc-c">
    <a class="fl fl-d-c fl-jc-sb" href="<?= ProductHelper::getUrl($data); ?>">
    	<div class="subcategory__img fl fl-jc-c">
    		<picture class="absolute-img-pictur">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">
            
                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(285, 200, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(285, 200, true, null,'image'); ?>">
            
                <img src="<?= $data->getImageNewUrl(285, 200, true, null,'image'); ?>">
            </picture>
    	</div>
    	<div class="subcategory__name fl fl-ai-c fl-jc-c"><?= $data->name; ?></div>
    </a>
</div>
