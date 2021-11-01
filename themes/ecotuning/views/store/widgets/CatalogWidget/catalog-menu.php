<?php if($category) : ?>
    <div class="catalog-menu-box fl fl-w">
        <?php foreach ($category as $key => $data) : ?>
            <a href="<?= $data->getCategoryUrl(); ?>" class="catalog-menu__item fl fl-ai-c">
                <div class="catalog-menu__img">
                    <?= CHtml::image($data->getImageUrl(100,100,true), '', []); ?>
                </div>
                <div class="catalog-menu__title">
                    <?= $data->name; ?>
                </div>
            </a>    
        <?php endforeach; ?>
    </div>
<?php endif; ?>    