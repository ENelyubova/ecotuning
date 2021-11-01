<?php if($pages) : ?>
    <div class="reasons pt pb">
        <div class="content-site">
            <div class="heading-block fl fl-w fl-ai-fe fl-jc-sb">
                <h2 class="heading heading-white"><?= $pages->title; ?></h2>
                <?php $childs = $pages->childPages(['condition' => 'status=1', 'order' => 'childPages.order ASC']); ?>
                <div class="reasons-arrows">
                    <div class="arrows"></div>
                </div>
            </div>
            <div class="reasons-block slick-slider">
                <?php foreach ($childs as $key => $data) : ?>
                    <div class="reasons-block__item">
                        <div class="reasons-item fl fl-jc-sb">
                            <div class="reasons-item__text">
                                <div class="reasons-item__reason"></div>
                                <div class="reasons-item__title"><?= $data->title; ?></div>
                                <div class="reasons-item__body"><?= $data->body; ?></div>
                            </div>
                            <?php if($data->image): ?>
                                <div class="reasons-item__img">
                                    <div class="img-over">
                                        <picture class="absolute-img-picture">
                                            <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                                            <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                                            <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(320, 369, true, null,'image'); ?>" type="image/webp">
                                            <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(320, 369, true, null,'image'); ?>">

                                            <img src="<?= $data->getImageNewUrl(320, 369, true, null,'image'); ?>" alt="<?= $data->image->alt; ?>">
                                        </picture>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>