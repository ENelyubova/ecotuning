<?php Yii::import('application.modules.zendsearch.ZendSearchModule'); ?>
<?= CHtml::beginForm(['/zendsearch/search/search'], 'get', ['class' => 'form-inline']); ?>
<?= CHtml::textField(
    'q',
    '',
    ['placeholder' => Yii::t('ZendSearchModule.zendsearch', 'Search'), 'class' => 'form-control']
); ?>
    <button type="submit" class="btn btn-search fl fl-ai-c fl-jc-c">
		<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
			<circle cx="9.5" cy="9.5" r="8" stroke="white" stroke-width="3"/>
			<path d="M15 15L20 20" stroke="white" stroke-width="3"/>
		</svg>
    </button>
<?= CHtml::endForm(); ?>





