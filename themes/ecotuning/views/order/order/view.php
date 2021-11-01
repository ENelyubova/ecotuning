<?php
/* @var $model Order */
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
Yii::app()->getClientScript()->registerCssFile($mainAssets . '/css/order-frontend.css');
Yii::app()->getClientScript()->registerScriptFile($mainAssets . '/js/store.js');

$this->title = Yii::t('OrderModule.order', 'Order #{n}', [$model->id]);
?>
<div class="page-txt order-page pt50 pb">
    <div class="content-site">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title-page"><?= Yii::t("OrderModule.order", "Order #"); ?><?= $model->id; ?>
                    <small>[<?= CHtml::encode($model->getStatusTitle()); ?>]</small>
                </h1>

                <p>Спасибо за заказ. Наши специалисты уже получили его и скоро свяжутся с вами для согласования деталей</p>
                <table class="table table-order">
                    <tbody>
                    <?php foreach ((array)$model->products as $position): ?>
                        <tr class="column-xs">
                            <td class="col-sm-5 col-xs-12">
                                <div class="media fl fl-ai-c">
                                    <?php $productUrl = ProductHelper::getUrl($position->product); ?>
                                    <a class="img-thumbnail pull-left" href="<?= $productUrl; ?>">
                                        <img class="media-object" src="<?= StoreImage::product($position->product, 72, 72); ?>">
                                    </a>
    
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="<?= $productUrl; ?>"><?= CHtml::encode($position->product->name); ?></a>
                                        </h4>
                                        <?php foreach ($position->variantsArray as $variant): ?>
                                            <h6><?= $variant['attribute_title']; ?>: <?= $variant['optionValue']; ?></h6>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-4 hidden-xs fl fl-ai-c">
                                <p class="text-right">
                                    <strong>
                                        <span class=""><?= str_replace('.00', '', number_format($position->getPrice(), 2, '.', ' ')); ?></span>
                                        <?= Yii::t("OrderModule.order", Yii::app()->getModule('store')->currency); ?>
                                        ×
                                        <?= $position->quantity; ?> <?= Yii::t("OrderModule.order", "PCs"); ?>
                                    </strong>
                                </p>
                            </td>
                            <td class="col-sm-3 col-xs-12 text-center">
                                <p class="text-right">
                                    <strong>
                                        <span
                                            class=""><?= str_replace('.00', '', number_format($position->getTotalPrice(), 2, '.', ' ')); ?></span> <?= Yii::t("OrderModule.order", Yii::app()->getModule('store')->currency); ?>
                                    </strong>
                                </p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($model->hasCoupons()): ?>
                        <tr>
                            <td colspan="2">
                                <h4><?= Yii::t("OrderModule.order", "Coupons"); ?></h4>
                            </td>
                            <td>
                                <?php foreach ($model->getCouponsCodes() as $code): ?>
                                    <span class="label label-info coupon">
                                        <?= CHtml::encode($code); ?>
                                    </span>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr class="column-xs column-total">
                        <td colspan="2" class="col-xs-12">
                            <h4 class="color-green"><?= Yii::t("OrderModule.order", "Total"); ?></h4>
                        </td>
                        <td class="col-xs-12">
                            <p class="text-right">
                                <strong>
                                    <small class="color-green">
                                        <?= str_replace('.00', '', number_format($model->getTotalPrice(), 2, '.', ' ')); ?>
                                        <?= Yii::t("OrderModule.order", Yii::app()->getModule('store')->currency); ?>
                                    </small>
                                </strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table class="table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th colspan="2">
                                        <h3><?= Yii::t("OrderModule.order", "Order details"); ?></h3>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-sm-2">
                                        <?= CHtml::activeLabel($model, 'date'); ?>
                                    </td>
                                    <td>
                                        <?= $model->date; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= CHtml::activeLabel($model, 'name'); ?>
                                    </td>
                                    <td>
                                        <?= CHtml::encode($model->name); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= CHtml::activeLabel($model, 'phone'); ?>
                                    </td>
                                    <td>
                                        <?= CHtml::encode($model->phone); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= CHtml::activeLabel($model, 'email'); ?>
                                    </td>
                                    <td>
                                        <?= CHtml::encode($model->email); ?>
                                    </td>
                                </tr>
                                <?php if ($model->getAddress()): ?>
                                    <tr>
                                        <td>
                                            <?= Yii::t("OrderModule.order", "Address"); ?>
                                        </td>
                                        <td>
                                            <?= CHtml::encode($model->getAddress()); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>
                                        <?= CHtml::activeLabel($model, 'comment'); ?>
                                    </td>
                                    <td>
                                        <?= CHtml::encode($model->comment); ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
