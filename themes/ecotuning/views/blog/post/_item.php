<div class="blog-list__item blog-item">
    <div class="blog-item__img">
        <a class="but-link-svg" href="<?= Yii::app()->createUrl('/blog/post/view', ['slug' => $data->slug]); ?>">
            <?= CHtml::image(
                $data->getImageUrl(),
                CHtml::encode($data->title),
                ['class' => 'absolute-img']
            ); ?>
        </a>
    </div>
    <div class="blog-item__text">
        <div class="blog-item__date fl fl-ai-c">
            <?= Yii::app()->getDateFormatter()->formatDateTime(
                $data->publish_time,
                "short",
                false
            ); ?>
            <div class="blog-item__visit fl fl-ai-c">
                <img class="" src="<?= $this->mainAssets . '/images/icon/eye.svg' ?>" alt="Кол-во просмотров">
                <span><?= $data->visit; ?></span>
            </div>
        </div>
        <div class="blog-item__title">
            <?= CHtml::link(
                CHtml::encode($data->title),
                ['/blog/post/view', 'slug' => $data->slug]
            ); ?>
        </div>
        <div class="blog-item__desc"><?= strip_tags($data->quote); ?></div>
    </div>
</div>