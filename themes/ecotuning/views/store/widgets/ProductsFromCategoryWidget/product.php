<?php if($products->itemCount): ?>
    <div class="product-block fl fl-w">
        <?php foreach ($products->getData() as $i => $product): ?>
            <?php $this->render('../../product/_item', ['data' => $product]) ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>