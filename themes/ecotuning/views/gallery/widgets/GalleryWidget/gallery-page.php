<?php if ($dataProvider->itemCount): ?>
    <div class="clients pt pb">
        <div class="content-site">
            <div class="heading-block fl fl-w fl-ai-fe fl-jc-sb">
                <h2 class="heading">Наши клиенты</h2>
                <div class="clients-arrow">
                    <div class="arrows fl fl-ai-c"></div>
                </div>
            </div>
            <?php
            $this->widget(
                'application.components.FtListView', [
                'id' => 'gallery-block',
                'itemView' => '_image',
                'dataProvider' => $dataProvider,
                'itemsCssClass' => 'clients-block clients-slider slick-slider',
                'template' => '{items}',
            ]); ?>
        </div>
    </div>
<?php endif; ?>