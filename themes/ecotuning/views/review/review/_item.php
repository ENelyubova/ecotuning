<div class="reviews-box__item  js-reviews-item">
    <div class="reviews-box__text fl fl-d-c">
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
                    <div class="reviews-item__raiting reviews-raiting">
                        <div class="raiting-list fl fl-ai-c">
                            <?php for ($i=1; $i <= 5; $i++) : ?>
                                <div class="raiting-list__item <?= ($i <= $data->rating) ? 'active' : ''; ?>"></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="reviews-item__name"><?= CHtml::encode( $data->username); ?></div>
                    <div class="reviews-item__position"><?= CHtml::encode( $data->name_desc); ?></div>
                </div>
            </div>
            <div class="reviews-item__description js-reviews-desc">
                <div class="reviews-item__tehnick"><?= $data->body_tech; ?></div>
                <div class="reviews-item__body js-reviews-text"><?= $data->text; ?></div>
            </div>
        </div>
    </div>
</div>
