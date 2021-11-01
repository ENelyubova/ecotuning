<?php if($pages) : ?>
    <div class="steps bg-lightblue pt pb">
        <div class="content-site">
            <div class="steps-block fl fl-w fl-ai-c">
                <div class="steps__text">
                    <h2 class="heading heading-block"><?= $pages->getAttributeValue('box3')['name']; ?></h2>
                    <div class="steps__list steps-list">
                        <?= $pages->getAttributeValue('box3')['value']; ?>
                    </div>
                    <div class="steps__btn">
                        <a href="#callbackModal" data-toggle="modal" class="btn btn-green">Заказать звонок менеджера</a>
                    </div>
                </div>
                <div class="steps__image">
                    <div class="image-wrap">
                        <!-- <img src="/uploads/image/steps/Алексеев Алексей.png" alt="Алексеев Алексей.png"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>