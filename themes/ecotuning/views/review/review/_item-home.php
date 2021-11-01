<?php $img = $data->images; ?>

<div class="reviews-block__item  js-reviews-item">
    <div class="reviews-item fl">
        <div class="reviews-item__text fl fl-d-c">
            <div>
                <div class="reviews-item__header fl fl-ai-c">
                    <div class="reviews-item__avatar">
                        <picture class="absolute-img-picture">
                            <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(94, 94, true, Yii::app()->getTheme()->getAssetsUrl() . '/images/reviews-nophoto.png', 'image'); ?>" type="image/webp">
                            <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(94, 94, true, Yii::app()->getTheme()->getAssetsUrl() . '/images/reviews-nophoto.png', 'image'); ?>">
                            
                            <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(56, 56, true, Yii::app()->getTheme()->getAssetsUrl() . '/images/reviews-nophoto.png', 'image'); ?>" type="image/webp">
                            <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(56, 56, true, Yii::app()->getTheme()->getAssetsUrl() . '/images/reviews-nophoto.png', 'image'); ?>">
                
                            <img src="<?= $data->getImageNewUrl(94, 94, true, Yii::app()->getTheme()->getAssetsUrl() . '/images/reviews-nophoto.png', 'image'); ?>" alt="">
                        </picture>
                    </div>
                    <div class="reviews-item__info">
                        <div class="reviews-item__name"><?= CHtml::encode( $data->username); ?></div>
                        <div class="reviews-item__position"><?= CHtml::encode( $data->name_desc); ?></div>
                    </div>
                </div>
                <div class="reviews-item__description js-reviews-desc">
                    <div class="reviews-item__tehnick"><?= $data->body_tech; ?></div>
                    <div class="reviews-item__body js-reviews-text"><?= $data->text; ?></div>
                </div>
            </div>
            <?php if($is_more) : ?>
            <div class="reviews-item__more js-reviews-more">
                <a class="reviews-item__link js-reviews-link btn btn-link" href="#">
                    <span>Читать весь отзыв</span>
                </a>
            </div>
        <?php endif; ?>
        </div>
        <?php foreach ($img as $key => $image) : ?>
            <?php if ($key >= 0 && $key < 1) : ?>
                <div class="reviews-item__img">
                    <picture class="absolute-img-picture">
                        <source media="(min-width: 401px)" srcset="<?= $image->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                        <source media="(min-width: 401px)" srcset="<?= $image->getImageNewUrl(0, 0, true, null,'image'); ?>">
                
                        <source media="(min-width: 1px)" srcset="<?= $image->getImageUrlWebp(300, 369, true, null,'image'); ?>" type="image/webp">
                        <source media="(min-width: 1px)" srcset="<?= $image->getImageNewUrl(300, 369, true, null,'image'); ?>">
                
                        <img src="<?= $image->getImageNewUrl(0, 0, true, null,'image'); ?>">
                    </picture>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
