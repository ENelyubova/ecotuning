 <?php
/** @var Page $page */

if ($page->layout) {
    $this->layout = "//layouts/{$page->layout}";
}
$this->headerClass = "header-home";

$this->title = $page->title;
$this->breadcrumbs = [
    Yii::t('HomepageModule.homepage', 'Pages'),
    $page->title
];
$this->description = !empty($page->meta_description) ? $page->meta_description : Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = !empty($page->meta_keywords) ? $page->meta_keywords : Yii::app()->getModule('yupe')->siteKeyWords
?>

<div class="slider">
    <?php $this->widget("application.modules.gallery.widgets.SlickMyWidget", ['galleryId' => 1,
        'slickClass' => 'carouselSlider slick-slider',
        'view' => 'slick',
    ]); ?>
    <div class="list-order cart shopping-cart-widget js-shopping-cart-widget" id="shopping-cart-widget">
      <?php $this->widget('application.modules.cart.widgets.ShoppingCartWidget'); ?>
    </div>
</div>

<?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
    'id'=> 1,
    'view' => 'about'
]); ?>


<?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
    'id'=> 1,
    'view' => 'service'
]); ?>
 

<?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
    'id'=> 1,
    'view' => 'steps'
]); ?>
    

<?php $this->widget("application.modules.news.widgets.MyNewsWidget", [
    'view' => 'portfolio-home',
    'category_id' => 1,
]); ?>
    

<?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
    'id'=> 8,
    'view' => 'reasons'
]); ?>
    

<?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
    'id'=> 1,
    'view' => 'advantages'
]); ?>
    

<?php $this->widget("application.modules.gallery.widgets.GalleryWidget", ['galleryId' => 2,
    // 'slickClass' => 'clients-slider slick-slider',
    'view' => 'gallery-page',
]); ?>


<?php $this->widget('application.modules.review.widgets.ReviewCarouselWidget', [
    'view' => 'review-home-carousel'
]); ?>
    
<div class="qustions js-load-chapche pt">  
    <div class="content-site">
        <h2 class="heading heading-block" data-aos="fade-right">???????????? ???? ??????????????</h2>
        <?php $this->widget("application.modules.page.widgets.PagesNewWidget", [
            'id'=> 13,
            'view' => 'questions'
        ]); ?>
    </div>
</div>
   

<div class="contacts-form pt pb">
    <div class="content-site">
        <div class="heading-block">
            <h2 class="heading">???????????????? ???????????????</h2>
            <div class="subheading">?????????????????? ?????????? ???????????????? ???????????? ?? ???????? ?????????????????????? <br>???????????????? ?? ???????? ?? ?????????????????? ??????????!</div>
        </div>
            <?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
                'id' => 'contactModal',
                'view' => 'contact-form',
                'formClassName' => 'StandartForm',
                'buttonModal' => false,
                'titleModal' => '???????????????? <span>????????????</span>',
                'subTitleModal' => '?? ???? ?????? ????????????????????!',
                'showCloseButton' => false,
                'isRefresh' => true,
                'eventCode' => 'napisat-nam',
                'successKey' => 'napisat-nam',
                'showAttributeBody' => true,
                'showAttributeEmail' => true,
                'showAttributeCheck' => true,
                'required' => 'emailRequired',
                'modalHtmlOptions' => [
                    'class' => 'modal-my modal-my-xs',
                ],
                'formOptions' => [
                    'htmlOptions' => [
                        'class' => 'form-my',
                    ]
                ],
                'modelAttributes' => [
                    'theme' => '???????????????? ??????????',
                ],
            ]) ?>
    </div>
</div>

