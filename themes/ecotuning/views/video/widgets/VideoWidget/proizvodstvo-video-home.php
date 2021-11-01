<div class="video-box">
    <?php foreach ($models as $key => $model): ?>
        <?php if($model->video) : ?>
            <a class="video-play__link"  data-fancybox="iframe" href="<?= $model->getVideoUrl() ?>">
                <div class="video-play">
                </div>
            </a>
        <?php endif; ?>
        <div class="video-box__img box-style-img">
            <?php if ($model->image): ?>
                <?= CHtml::image($model->getImageUrl(157,157,true), '',['class' => 'absolute-img']); ?>
            <?php else : ?>
                <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/video.jpg','',['class' => 'absolute-img']); ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
