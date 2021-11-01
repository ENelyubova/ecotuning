<?php if($pages) : ?>
    <?php $childs = $pages->childPages(['condition' => 'status=1', 'order' => 'childPages.order ASC']); ?>

    <div class="reviews-block slick-slider">
        <?php foreach ($childs as $key => $data) : ?>
            <div class="reviews-block__item">
                <div class="reviews-item fl">
                    <div class="reviews-item__text">
                        <div class="reviews-item__header fl fl-ai-c">
                            <div class="reviews-item__avatar">
                                <picture class="absolute-img-picture">
                                    <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                                    <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">
                    
                                    <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(56, 56, true, null,'image'); ?>" type="image/webp">
                                    <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(56, 56, true, null,'image'); ?>">
                    
                                    <img src="<?= $data->getImageNewUrl(0, 0, false, null,'image'); ?>">
                                </picture>
                            </div>
                            <div class="reviews-item__info">
                                <div class="reviews-item__name"><?= $data->title; ?></div>
                                <div class="reviews-item__position"><?= $data->title_short; ?></div>
                            </div>
                        </div>
                        <div class="reviews-item__description">
                            <div class="reviews-item__tehnick"><?= $data->body_short; ?></div>
                            <div class="reviews-item__body"><?= $data->body; ?></div>
                        </div>
                        <div class="reviews-item__more js-reviews-more" style="display: none;">
                            <a class="reviews-box__link js-reviews-link" href="#" tabindex="0">Читать далее</a>
                        </div>
                    </div>
                    <div class="reviews-item__img">
                        <picture class="absolute-img-picture">
                            <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'icon'); ?>" type="image/webp">
                            <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'icon'); ?>">
                    
                            <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(300, 369, true, null,'icon'); ?>" type="image/webp">
                            <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(300, 369, true, null,'icon'); ?>">
                    
                            <img src="<?= $data->getImageNewUrl(0, 0, true, null,'icon'); ?>">
                        </picture>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="reviews-arrows">
        <div class="arrows"></div>
    </div>
<?php endif; ?>