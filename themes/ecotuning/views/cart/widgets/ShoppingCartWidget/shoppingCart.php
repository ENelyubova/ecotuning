<?php
$currency = Yii::app()->getModule('store')->currency;
?>

<a href="<?= Yii::app()->createUrl('/cart/cart/index') ?>" class="cart-link">
	<div class="btn-cart js-cart cart_link-is-no-empty js-cart-widget fl" id="cart-widget" data-cart-widget-url="/cart/widget">
		<div class="btn-cart_txt <?= (empty(Yii::app()->cart->isEmpty())) ? 'active' : ''; ?>">
			Ваш лист заказа
		</div>
		<div class="btn-cart_icon <?= (empty(Yii::app()->cart->isEmpty())) ? 'active' : ''; ?>">
		  <div class="btn-cart__count btn-header__count fl fl-ai-c fl-jc-c <?= (empty(Yii::app()->cart->isEmpty())) ? 'active' : ''; ?>"><?= Yii::app()->cart->getItemsCount(); ?></div>
		</div>
	</div>
</a>