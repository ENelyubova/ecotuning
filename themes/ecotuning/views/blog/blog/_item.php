<div class="blog-list__item blog-item">
    <div class="blog-item__img">
        <?= CHtml::image(
            $data->getImageUrl(),
            CHtml::encode($data->name),
            ['class' => 'absolute-img']
        ); ?>
    </div>
    <div class="blog-item__text">
        <div class="blog-item__date fl fl-ai-c">
            <?= Yii::app()->getDateFormatter()->formatDateTime(
                $data->create_time,
                "short",
                false
            ); ?>
            <div class="blog-item__visit fl fl-ai-c">
                <img class="" src="<?= $this->mainAssets . '/images/icon/eye.svg' ?>" alt="Кол-во просмотров">
                <span>215</span>
            </div>
        </div>
        <div class="blog-item__title">
            <?= CHtml::link(
                CHtml::encode($data->name),
                ['/blog/blog/view/', 'slug' => CHtml::encode($data->slug)]
            ); ?>
        </div>
        <div class="blog-item__desc"><?= strip_tags($data->body_short); ?></div>
    </div>
</div>

