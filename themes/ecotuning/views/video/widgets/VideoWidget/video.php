<?php if($models): ?>
    <?php foreach ($models as $key => $model): ?>
        <div class="video-block__item video-block__item<?= $key; ?>">
            <iframe src="<?= $model->code ?>"></iframe>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

