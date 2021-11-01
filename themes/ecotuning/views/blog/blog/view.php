<?php
/**
 * @var $this BlogController
 * @var $blog Blog
 */
$this->title = CHtml::encode($blog->name);
$this->description = CHtml::encode($blog->name);
$this->keywords = CHtml::encode($blog->name);
?>

<?php
$this->breadcrumbs = [
    Yii::t('BlogModule.blog', 'Блог компании "Экотюнинг"') => ['/blog/blog/index/'],
    CHtml::encode($blog->name),
];
?>

<div class="page-txt post-view pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>

        <?php if ($blog->icon): ?>
            <div class="post-view-img">
                <div class="post-img-wrap">
                    <?= CHtml::image(
                        $blog->getImageUrl(), CHtml::encode($blog->name),['class' => 'absolute-img']);
                    ?>
                </div>
            </div>
        <?php endif ?>

        <div class="post-view-header">
            <div class="post-view-subscribe fl fl-w fl-ai-c fl-jc-sb">
                <div class="post-view-date">
                    <div class="blog-item__date fl fl-ai-c">
                        <?= Yii::app()->getDateFormatter()->formatDateTime($blog->create_time, "short", "short"); ?>
                        <div class="blog-item__visit fl fl-ai-c">
                            <img class="" src="<?= $this->mainAssets . '/images/icon/eye.svg' ?>" alt="Кол-во просмотров">
                            <span>215</span>
                        </div>
                    </div>
                </div>
                <div class="post-view-share fl fl-w fl-ai-c">
                    <p>Поделиться</p> 
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
            </div>
            <h1 class="post-view-title"><?= $blog->name ?></h1>
            <div class="post-view-author fl fl-ai-c">
                <div class="author-ava">
                    <?php if ($user->image): ?>
                        <?= CHtml::image(
                            $blog->getImageUrl(), CHtml::encode($blog->name),['class' => 'absolute-img']);
                        ?>
                    <?php else: ?>
                        <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/no-avatar.png','', ['class' => 'absolute-img']); ?>
                    <?php endif ?>
                </div>
                <div class="author-name">
                    <span>Автор статьи</span>
                    <div>
                        <?php $this->widget(
                            'application.modules.user.widgets.UserPopupInfoWidget',
                            [
                                'view' => 'user-name',
                                'model' => $blog->createUser
                            ]
                        ); ?>
                    </div>
                </div>
            </div>
        </div><!-- post-view-header -->

        <div class="post-view-content">
            <?= $blog->description; ?>
        </div>

        <div class="post-view-share fl fl-w fl-ai-fs">
            <h2>Понравилось? поделитесь с друзьями</h2>
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

        <div class="post-read-all">
            <div class="header-block">
                <h2 class="title-page">Читайте также</h2>
            </div>
            <?php $this->widget("application.modules.blog.widgets.BlogsWidget", [
                // 'view' => 'news-sidebar',
                // 'notIds' => "{$model->id},13",
                // 'limit' => 6,
            ]); ?>
        </div>
    </div>
</div>







