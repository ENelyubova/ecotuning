<?php
/**
 * @var $this PostController
 */

$this->title = $post->meta_title ?: $post->title;
$this->description = !empty($post->meta_description) ? $post->meta_description : strip_tags($post->getQuote());
$this->keywords = !empty($post->meta_keywords) ? $post->meta_keywords : implode(', ', $post->getTags());

Yii::app()->clientScript->registerScript(
    "ajaxBlogToken",
    "var ajaxToken = " . json_encode(
        Yii::app()->getRequest()->csrfTokenName . '=' . Yii::app()->getRequest()->csrfToken
    ) . ";",
    CClientScript::POS_BEGIN
);

$this->breadcrumbs = [
    Yii::t('BlogModule.blog', 'Блог компании «Экотюнинг»') => ['/blog/blog/index/'],
    // CHtml::encode($post->blog->name)   => ['/blog/blog/view', 'slug' => $post->blog->slug],
    $post->title,
];

$user = $post->createUser;
?>
<div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
    <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
</div>

<div class="page-txt post-view pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>

        <?php if ($post->image): ?>
            <div class="post-view-img">
                <div class="post-img-wrap">
                    <?= CHtml::image(
                        $post->getImageUrl(), CHtml::encode($post->title),['class' => 'absolute-img']);
                    ?>
                </div>
            </div>
        <?php endif ?>

        <div class="post-view-header">
            <div class="post-view-subscribe fl fl-w fl-ai-c fl-jc-sb">
                <div class="post-view-date">
                    <div class="blog-item__date fl fl-ai-c">
                        <?= Yii::app()->getDateFormatter()->formatDateTime($post->publish_time, "short", false); ?>
                        <div class="blog-item__visit fl fl-ai-c">
                            <img class="" src="<?= $this->mainAssets . '/images/icon/eye.svg' ?>" alt="Кол-во просмотров">
                            <span><?= $post->visit; ?></span>
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
            <h1 class="post-view-title"><?= $post->title ?></h1>
            <div class="post-view-author fl fl-ai-c">
                <div class="author-ava">
                    <?php if ($user->avatar): ?>
                        <?= CHtml::image(
                            $user->getImageUrl(),'',['class' => 'absolute-img']);
                        ?>
                    <?php else: ?>
                        <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/no-avatar.png','', ['class' => 'absolute-img']); ?>
                    <?php endif ?>
                </div>
                <div class="author-name">
                    <span>Автор статьи</span>
                    <div>
                        <?= $user->getFullName(); ?>
                    </div>
                </div>
            </div>
        </div><!-- post-view-header -->

        <div class="post-view-content">
            <?= $post->content; ?>
        </div>

        <div class="post-view-share fl fl-w fl-ai-fs">
            <h2>Понравилась статья? Поделитесь ею с друзьями!</h2>
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

        <?php $this->widget(
        'blog.widgets.LastPostsOfBlogWidget',
            ['blogId' => $post->blog_id, 'postId' => $post->id, 'view' => 'in-post']
        ); ?>
    </div>
</div>
