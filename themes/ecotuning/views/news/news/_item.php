<div class="portfolio-case__item">
    <div class="portfolio-case__img">
        <?php if ($data->image): ?>
            <a href="<?= Yii::app()->createUrl('/news/news/viewPortfolio', ['slug' => $data->slug]); ?>">
                <picture class="absolute-img-picture">
                    <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                    <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                    <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(350, 230, true, null,'image'); ?>" type="image/webp">
                    <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(350, 230, true, null,'image'); ?>">

                    <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->title; ?>">
                </picture>
            </a>
        <?php else : ?>
            <a href="<?= Yii::app()->createUrl('/news/news/viewPortfolio', ['slug' => $data->slug]); ?>"><?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.jpg','', ['class' => 'absolute-img absolute-img-contain']); ?></a>
        <?php endif; ?>
    </div>
    <div class="portfolio-case__title"><?= $data->title; ?></div>
    <a class="btn btn-green" href="<?= Yii::app()->createUrl('/news/news/viewPortfolio', ['slug' => $data->slug]); ?>">Подробнее</a>
</div>





