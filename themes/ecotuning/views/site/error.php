<?php 
$this->title = Yii::t('default', 'Error') . ' ' . $error['code']; 
?>


<div class="page-error">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <div class="title-error">Ошибка 404</div>
        <h2 class="title text-center">Извините, но запрашиваемая <br>страница не найдена</h2>
        <p class="text-center">Возможно она была удалена или даже никогда не существовала. <br>Чтобы найти нужную информацию,рекомендуем перейти на <a href="/">главную страницу</a></p>
        <div class="page-error-search"></div>
        <div class="page-error-img text-center">
            <img src="/uploads/image/404.svg" alt="error_404">
        </div>
        <!-- <div id="notfound">
            <div class="notfound">
                <div class="notfound-404">
                <h3>Страница не найдена</h3>
                <h1><span>4</span><span>0</span><span>4</span></h1>
                </div>
                <h2>Извините, но заправшиваемая страница не найдена</h2>
                <a href="/" class="btn notfound-btn">На главную</a>
            </div>
        </div> -->
    </div>
</div>