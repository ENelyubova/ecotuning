<?php if($pages) : ?>
    <div class="advantages pt">
        <div class="content-site">
            <h2 class="heading heading-block"><?= $pages->getAttributeValue('box4')['name']; ?></h2>
            <div class="advantages-block fl fl-w">
                <?= $pages->getAttributeValue('box4')['value']; ?>
                <div class="advantages__item advantages__item-style fl fl-ai-c fl-jc-sb">
                    <div class="advantages__text">
                        <div class="advantages__name">Составьте спиcок техники</div>
                        <div class="advantages__desc">Узнайте, сколько будет стоить модернизация вашего парка машин</div>
                        <a href="/store" class="btn btn-orange">Каталог техники</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
