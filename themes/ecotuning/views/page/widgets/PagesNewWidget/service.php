<?php if($pages) : ?>
    <div class="service pt pb">
        <div class="content-site">
            <div class="service-block fl fl-w fl-ai-c fl-jc-sb">
                <div class="service__text">
                    <h2 class="heading heading-block heading-white"><?= $pages->getAttributeValue('box2')['name']; ?></h2>
                    <div class="service__info service-info">
                        <?= $pages->getAttributeValue('box2')['value']; ?>
                    </div>

                    <?php 
                        $companyButName = $pages->getAttributeValue('box2')['butName'];
                        $companyButLink = $pages->getAttributeValue('box2')['butLink'];
                     ?>
                    <div class="service-btn">
                        <?php if($companyButLink) : ?>
                            <a class="btn btn-orange" href="<?= $companyButLink; ?>">
                                <?= ($companyButName) ?: 'Каталог техники'; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="service__image">
                    <div class="image-wrap">
                        <img src="/uploads/image/service/image.png" alt="Трактор.png" class="absolute-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>