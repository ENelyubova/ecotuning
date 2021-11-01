<?php
/**
 * Отображение для ./themes/default/views/news/news/news.php:
 *
 * @category YupeView
 * @package  YupeCMS
 * @author   Yupe Team <team@yupe.ru>
 * @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 * @link     http://yupe.ru
 *
 * @var $this NewsController
 * @var $model News
 **/
?>
<?php
$this->title = ($model->meta_title) ? $model->meta_title : $model->title;
$this->description = $model->meta_description;
$this->keywords = $model->meta_keywords;
?>

<?php
$this->breadcrumbs = [
    Yii::t('NewsModule.news', 'Портфолио') => ['/news/news/indexPortfolio'],
    $model->title
];
?>

<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
  <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="page-txt portfolio-page pb">
    <div class="content-site">
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
                'links' => $this->breadcrumbs,
        ]); ?>
        <h1 class="title-page"><?= CHtml::encode($model->title); ?></h1>
        
        <div class="portfolio-view">
            <?php if ($model->image): ?>
                <div class="portfolio-view__img">
                    <img src="<?= $model->getImageUrl(); ?>" class="absolute-img">
                </div>
            <?php endif; ?>
            <?php if ($model->short_text): ?>
                <div class="portfolio-view__attributes">
                    <h2>Характеристики</h2>
                    <div class="attributes-flex fl fl-w fl-d-c"><?= $model->short_text; ?></div>
                </div>
            <?php endif; ?>
            <?php if ($model->full_text): ?>
                <div class="portfolio-view__desc">
                    <h2>Описание</h2>
                    <?= $model->full_text; ?>
                </div>
            <?php endif; ?>

            <div class="post-view-share fl fl-w fl-ai-fs">
                <h2>Понравился кейс? Поделитесь с друзьями</h2>
                <div class="share-wrap fl fl-ai-c">
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,facebook,odnoklassniki,twitter"></div>
                    <a class="social-share-more js-sharemore fl fl-ai-bl fl-jc-c" href="#">
                        ...
                    </a> 
                    <div class="social-share-tooltip">
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="ya-share2" data-curtain data-shape="round" data-services="telegram,viber,whatsapp"></div>
                    </div>
                </div>  
            </div>
            <hr>
        </div>

        <div class="portfolio-case">
            <?php $this->widget("application.modules.news.widgets.MyNewsWidget", [
                'view' => 'read-all',
                'notIds' => "{$model->id}",
                'limit' => 6,
            ]); ?>
        </div>
    </div>
</div>


