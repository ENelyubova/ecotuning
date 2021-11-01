<?php
/**
 * @var $this ProductBackendController
 * @var $model Product
 * @var $form ActiveForm
 * @var $batchModel ProductBatchForm
 */

use yupe\widgets\ActiveForm;

$this->layout = 'product';

$this->breadcrumbs = [
    Yii::t('StoreModule.store', 'Products') => ['/store/productBackend/index'],
    Yii::t('StoreModule.store', 'Upload price'),
];

$this->pageTitle = Yii::t('StoreModule.store', 'Upload price');
?>
<div>
    <h1>
        <?= Yii::t('StoreModule.store', 'Products'); ?>
        <small><?= Yii::t('StoreModule.store', 'Upload price'); ?></small>
    </h1>
</div>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', [
    'htmlOptions' => [
        'enctype' => 'multipart/form-data'
    ]
]) ?>

<?= $form->fileFieldGroup($model, 'file') ?>
<?= CHtml::submitButton('Загрузить', ['class' => 'btn btn-primary']) ?>

<?php $this->endWidget(); ?>
