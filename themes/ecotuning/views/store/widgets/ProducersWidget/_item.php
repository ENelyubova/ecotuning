<?php
/**
 * @var Producer $brand
 */
$brandUrl = Yii::app()->createUrl('/store/producer/view', ['slug' => CHtml::encode($brand->slug)]);
?>

<div class="brand-list__item fl fl-d-c fl-ai-c">
    <a href="<?= $brandUrl; ?>">
        <img src="<?= $brand->getImageUrl(190, 190, false); ?>"/>
    </a>
    <a class="brand-name" href="<?= $brandUrl; ?>"><?= CHtml::encode($brand->name); ?></a>
</div>