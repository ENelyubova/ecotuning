<div class="clients__item">
    <div class="clients__img fl fl-ai-c fl-jc-c">
        <picture class="">
            <source media="(min-width: 401px)" srcset="<?= $data->image->getImageUrlWebp(0, 0, true, null,'file'); ?>" type="image/webp">
            <source media="(min-width: 401px)" srcset="<?= $data->image->getImageNewUrl(0, 0, true, null,'file'); ?>">
    
            <source media="(min-width: 1px)" srcset="<?= $data->image->getImageUrlWebp(400, 400, true, null,'file'); ?>" type="image/webp">
            <source media="(min-width: 1px)" srcset="<?= $data->image->getImageNewUrl(400, 400, true, null,'file'); ?>">
    
            <img src="<?= $data->image->getImageNewUrl(0, 0, true, null,'file'); ?>" alt="<?= $data->image->alt; ?>">
        </picture>
    </div>
</div>

