<?php if ($dataProvider->itemCount): ?>
    <div class="slider-block">
        <?php $this->widget(
            'bootstrap.widgets.TbListView',
            [
                'dataProvider'  => $dataProvider,
                'itemView'      => '_slick-item',
                'template'      => "{items}",
                   'itemsCssClass' => $this->slickClass,
                'itemsTagName'  => 'div'
            ]
        ); ?>
        <div class="slider-nav">
            <div class="content-site">
                <div class="panel-nav fl fl-ai-c">
                    <div class="counter"></div>
                    <div class="arrows fl fl-ai-c"></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

