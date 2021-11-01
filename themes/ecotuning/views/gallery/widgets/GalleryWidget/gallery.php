<?php if ($dataProvider->itemCount): ?>
    <div class="clients pt pb">
        <div class="content-site">
            <div class="heading-block fl fl-w fl-ai-fe fl-jc-sb">
                <h2 class="heading">Наши клиенты</h2>
                <div class="clients-arrow">
                    <div class="arrows fl fl-ai-c"></div>
                </div>
            </div>
            <div class="clients-block">
                <div class="clients-slider slick-slider">
                    <?php $this->widget(
                        'bootstrap.widgets.TbListView',
                        [
                            'dataProvider'  => $dataProvider,
                            'itemView'      => '_image',
                            'template'      => "{items}",
                               // 'itemsCssClass' => $this->slickClass,
                            'itemsTagName'  => 'div'
                        ]
                    ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>