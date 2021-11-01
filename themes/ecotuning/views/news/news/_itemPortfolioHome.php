<div class="portfolio-block__item js-portfolio-item">
    <div class="portfolio-item fl fl-w fl-jc-sb">
        <div class="portfolio-item__text fl fl-d-c">
            <div class="portfolio-item__title">
                Результаты оптимизации мощности <br><?= $data->name_model; ?>
            </div>
            <div class="portfolio-item__description js-portfolio-desc">
                <div class="portfolio-item__body js-portfolio-text"><?= $data->short_text; ?></div>
            </div>
                <a class="portfolio-item__more js-portfolio-more btn-link" href="#" data-text="Свернуть">
                    <span>Все параметры</span>
                </a>
            <div class="portfolio-item__price fl fl-w fl-ai-c">
                <div class="portfolio-item__price-sum">
                    <?= $data->price; ?>
                    <span class="ruble">
                        <svg width="18" height="20" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.03696 15V12.144H0.209961V10.779H2.03696V8.90998H0.209961V7.31398H2.03696V0.00598145H5.98496C7.81896 0.00598145 9.17696 0.376982 10.059 1.11898C10.955 1.86098 11.403 2.93898 11.403 4.35298C11.403 5.78098 10.92 6.90098 9.95396 7.71298C8.98796 8.51098 7.56696 8.90998 5.69096 8.90998H3.92696V10.779H7.39196V12.144H3.92696V15H2.03696ZM3.92696 7.31398H5.41796C6.69196 7.31398 7.67896 7.10398 8.37896 6.68398C9.09296 6.26398 9.44996 5.50798 9.44996 4.41598C9.44996 3.46398 9.15596 2.75698 8.56796 2.29498C7.97996 1.83298 7.06296 1.60198 5.81696 1.60198H3.92696V7.31398Z" fill="black"></path></svg>
                    </span>
                </div>
                <p>Стоимость модернизации</p>
            </div>
            <div class="portfolio-item__btn fl fl-w fl-ai-c">
                <a href="<?= Yii::app()->createUrl('/news/news/viewPortfolio', ['slug' => $data->slug]); ?>" class="btn btn-link">Подробнее</a>
                <a href="/portfolio" class="btn btn-link">Портфолио</a>
            </div>
        </div>
        <div class="portfolio-item__img">
            <picture class="absolute-img-picture">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(350, 230, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(350, 230, true, null,'image'); ?>">

                <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->title; ?>">
            </picture>
        </div>
    </div>
</div>





