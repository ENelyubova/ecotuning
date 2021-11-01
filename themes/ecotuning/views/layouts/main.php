<!DOCTYPE html>
<html lang="<?= Yii::app()->language; ?>">
<head>
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_START);?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="ru-RU" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?= $this->title;?></title>
    <meta name="description" content="<?= $this->description;?>" />
    <meta name="keywords" content="<?= $this->keywords;?>" />

    <link rel="apple-touch-icon" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-180x180.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <?php if ($this->canonical) : ?>
        <link rel="canonical" href="<?= $this->canonical ?>" />
    <?php endif; ?>

    <?php
        Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/style.css');

        $mainJs = $this->mainAssets . "/js/main.min.js";
        $mainJs = $mainJs . "?v-" . filectime(Yii::getPathOfAlias('public') . $mainJs);
        Yii::app()->getClientScript()->registerScriptFile($mainJs, CClientScript::POS_END); 
        Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/modernizr.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/store.js', CClientScript::POS_END);
    ?>

    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
    </script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_END);?>
</head>

<body class="page_fix">

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_START);?>

<div class="container-site">
    <div class="wrapper">
        <div class="wrap1">
            <?php $this->renderPartial('//layouts/_header'); ?>
            <?= $this->decodeWidgets($content); ?>
        </div>
        
        <div class="wrap2">
            <?php $this->renderPartial('//layouts/_footer'); ?>
        </div>
    </div>
</div>

<!-- Закзать звонок -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'callbackModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Оставьте заявку',
    'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => false,
    'showAttributeBody' => false,
    'eventCode' => 'zakazat-zvonok',
    'successKey' => 'zakazat-zvonok',
    'modalHtmlOptions' => [
        'class' => 'modal-my modal-my-xs',
    ],
    'formOptions' => [
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => 'Обратный звонок',
    ],
]) ?>
<!-- Оставить заяявку -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
   'id' => 'writeUsModal',
   'formClassName' => 'StandartForm',
   'buttonModal' => false,
   'titleModal' => 'Оставьте <span>заявку</span>',
   'subTitleModal' => 'и мы Вам перезвоним!',
   'showCloseButton' => false,
   'isRefresh' => true,
   'showAttributeBody' => true,
   'eventCode' => 'napisat-nam',
   'successKey' => 'napisat-nam',
   'modalHtmlOptions' => [
       'class' => 'modal-my modal-my-xs',
   ],
   'formOptions' => [
       'htmlOptions' => [
           'class' => 'form-my',
       ]
   ],
   'modelAttributes' => [
       'theme' => 'Написать нам',
   ],
]) ?>

<div id="messageModal" class="modal modal-my modal-msg fade" role="dialog">
    <div class="modal-dialog modal-dialog-msg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div data-dismiss="modal" class="modal-close"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modal-my-heading">
                    <h4 class="text-center">Спасибо! Мы получили вашу заявку. Менеджер позвонит вам в течение 5 минут</h4>
                </div>
            </div>
            <!-- <div class="modal-body">
                Ваше сообщение отравлено. Спасибо за обращение!
            </div> -->
        </div>
    </div>
</div>

<div id="messageFormModal" class="modal modal-my modal-msg fade" role="dialog">
    <div class="modal-dialog modal-dialog-msg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div data-dismiss="modal" class="modal-close"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modal-my-heading">
                    <h4 class="text-center">Ваше сообщение отравлено. Спасибо за обращение!</h4>
                </div>
            </div>
            <!-- <div class="modal-body">
                Ваше сообщение отравлено. Спасибо за обращение!
            </div> -->
        </div>
    </div>
</div>

<div id="portfolioModal" class="portfolioModal js-portfolioModal modal modal-my modal-my-sm fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div data-dismiss="modal" class="modal-close"><i class="fa fa-times" aria-hidden="true"></i><div></div></div>
            <div class="modal-body">
                <div class="portfolio-block portfolio-block-modal">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="reviewsModal" class="reviewsModal js-reviewsModal modal modal-my modal-my-sm fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div data-dismiss="modal" class="modal-close"><i class="fa fa-times" aria-hidden="true"></i><div></div></div>
            <div class="modal-body">
                <div class="reviews-block reviews-block-modal">
                </div>
            </div>
        </div>
    </div>
</div>

<?php //Модалка для поиска ?>
<?php $this->widget('application.modules.store.widgets.SearchProductWidget', [
    'view' => 'search-product-form-modal'
]); ?>

<?php $fancybox = $this->widget(
    'gallery.extensions.fancybox3.AlFancybox', [
        'target' => '[data-fancybox]',
        'lang'   => 'ru',
        'config' => [
            'animationEffect' => "fade",
            'buttons' => [
                "zoom",
                "close",
            ]
        ],
    ]
); ?>

<div class="ajax-loading"></div>
<!-- container end -->

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_END);?>
</body>
</html>