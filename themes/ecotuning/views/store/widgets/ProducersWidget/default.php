<?php
/**
 * @var array $brands
 * @var Producer $brand
 */
?>
<?php if ($brands): ?>
    <div class="brand-block">
        <div class="brand-block__panel">
            <span class="char">A</span>
            <div class="brand-list fl fl-w fl-ai-c">
                <?php foreach ($brands as $i => $brand): ?>
                    <?php $this->render('_item', ['brand' => $brand]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
