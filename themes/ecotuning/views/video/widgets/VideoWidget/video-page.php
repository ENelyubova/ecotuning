<?php if($models): ?>
    <div class="directions-video">
        <?php foreach ($models as $key => $model): ?>
            <div class="video-box__item video-box__item<?= $key; ?>">
                <?php if($model->video) : ?>
                    <a class="video-play__link"  data-fancybox="iframe" href="<?= $model->getVideoUrl() ?>">
                        <div class="video-play">
                            <div class="play"></div>
                        </div>
                    </a>
                <?php endif; ?>
                <div class="video-box__img box-style-img">
                    <?php if ($model->image): ?>
                        <?= CHtml::image($model->getImageUrl(1200,450,true), '',['class' => 'absolute-img']); ?>
                    <?php else : ?>
                        <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/video.jpg',''); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

