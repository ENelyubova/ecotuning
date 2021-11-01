    <div class="quantum-content-video">
        <?php foreach ($models as $key => $model): ?>
            <div class="quantum-video">
                <?php if($model->video) : ?>
                    <a class="quantum-video__link"  data-fancybox="iframe" href="<?= $model->getVideoUrl() ?>">
                        <div class="video-play">
                        </div>
                    </a>
                <?php endif; ?>
                <div class="quantum-video__img">
                    <?php if ($model->image): ?>
                        <?= CHtml::image($model->getImageUrl(1120,430,true), '',['class' => 'absolute-img']); ?>
                    <?php else : ?>
                        <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/video.jpg','',['class' => 'absolute-im']); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
