 <?php if($pages) : ?>
    <div class="panel panel-default">
        <?php foreach ($pages->childPages(['condition' => 'status=1', 'order' => 'childPages.order ASC']) as $key => $data) : ?>
            <div class="panel-heading">
                <div class="panel-heading__item">
                    <a data-toggle="collapse" data-parent="#accordion" href="#page<?= $key; ?>" >
                        <?= $data->title; ?>
                    </a>
                </div>
            </div>
            <div class="panel-content">
                <div id="page<?= $key; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?= $data->body; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>