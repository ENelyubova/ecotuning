<section class="catalog-filter">
    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        [
            'action' => ['/store/product/search'],
            'method' => 'GET',
        ]
    ) ?>
    <div class="search-group">
        <?= CHtml::textField(
            AttributeFilter::MAIN_SEARCH_QUERY_NAME,
            CHtml::encode(Yii::app()->getRequest()->getQuery(AttributeFilter::MAIN_SEARCH_QUERY_NAME)),
            ['class' => 'form-control', 'placeholder'=>'Поиск']
        ); ?>
            <span class="icon-search"></span>
    </div>
    <?php $this->endWidget(); ?>
</section>
