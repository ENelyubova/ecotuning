<?php $lkurl = (Yii::app()->user->isGuest) ? Yii::app()->createUrl('user/account/login') : Yii::app()->createUrl('order/user/index'); ?>
<?php $lkname = (Yii::app()->user->isGuest) ? 'Войти' : Yii::app()->user->getProfile()->getNamee(); ?>

<div class="header <?= $this->headerClass;?> <?= ($this->action->id=='index' && $this->id=='hp') ? 'header-main' : ''; ?>">
  <div class="header-top">
    <div class="content-site">
      <div class="header-content fl fl-ai-c fl-jc-sb">
        <div class="header-logo fl fl-ai-c">
          <a href="/">
            <img class="header-logo-white" src="/uploads/image/logo.svg" alt="logo.svg" />
            <img class="header-logo-black" src="/uploads/image/logo-black.svg" alt="logo.svg" />
          </a>
          <span>Чип-тюнинг <br>сельскохозяйственной <br>и специальной техники</span>
        </div><!-- logo --> 
        
        <div class="header-contacts fl fl-ai-c">
          <div class="header-address header-item">
            <div class="header-address__point">
              <?php if (Yii::app()->hasModule('contentblock')) : ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
              <?php endif; ?>
            </div>
            <a class="header-btn btn" data-fancybox="" data-type="iframe" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2473.3235485114046!2d39.1623876159767!3d51.690524005117844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x413b2f2afc1b086d%3A0x14ce8940772c772!2z0YPQuy4g0KHQvtC70L3QtdGH0L3QsNGPLCAyMywg0JLQvtGA0L7QvdC10LYsINCS0L7RgNC-0L3QtdC20YHQutCw0Y8g0L7QsdC7LiwgMzk0MDI2!5e0!3m2!1sru!2sru!4v1611735014184!5m2!1sru!2sru" href="javascript:;">Местоположение</a>
          </div><!-- address -->

          <div class="header-phone header-item fl fl-d-c">
            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
            <?php endif; ?>
            <a href="#callbackModal" data-toggle="modal" class="header-btn btn">Заказать звонок</a>
          </div><!-- phone -->
          
          <div class="header-mode header-item">
            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'mode']); ?>
            <?php endif; ?>
          </div><!-- mode -->
          <div class="header-lk">
            <?php if (Yii::app()->user->isGuest) : ?>
              <a href="<?= Yii::app()->createUrl('user/account/login'); ?>">
                <div class="btn-lk__icon">
                  <img class="lk-white" src="<?= $this->mainAssets . '/images/icon/user.svg' ?>" alt="">
                  <img class="lk-black" src="<?= $this->mainAssets . '/images/icon/user-black.svg' ?>" alt="">
                </div>
              </a>
            <?php else : ?>
              <a href="<?= $lkurl; ?>">
                <div class="btn-lk__icon">
                  <img class="lk-white" src="<?= $this->mainAssets . '/images/icon/user.svg' ?>" alt="">
                  <img class="lk-black" src="<?= $this->mainAssets . '/images/icon/user-black.svg' ?>" alt="">
                </div>
              </a>
            <?php endif ?>

            
          </div><!-- lk -->
          
          <div class="header-search-mobile">
            <a class="fl fl-ai-c fl-jc-c" data-toggle="modal" data-target="#search-form-Modal" href="#">
              <img class="search-white" src="<?= $this->mainAssets . '/images/icon/search.svg' ?>" alt="">
              <img class="search-black" src="<?= $this->mainAssets . '/images/icon/search-black.svg' ?>" alt="">
            </a>
          </div><!-- header-search-mobile -->

          <div class="mobile-panel">
            <div class="m-menu-button">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
          </div><!-- mobile-panel -->
        </div><!-- contacts -->
      </div>
    </div>
  </div><!-- header-top -->
  
  <div class="header-bottom">
    <div class="content-site">
      <div class="header-content fl fl-ai-c fl-jc-sb">
        <div class="header-menu fl fl-ai-c">
          <?php if (Yii::app()->hasModule('menu')) : ?>
              <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
          <?php endif; ?>
        </div><!-- menu -->

        <div class="header-search fl fl-ai-c">
          <?php $this->widget('application.modules.store.widgets.SearchProductWidget', ['view' => 'search-product-form']); ?>
        </div><!-- header-search -->
      </div>  
    </div>
  </div>
</div>

<div class="mobile-panel">
  <div class="mobile-menu ">
      <div class="m-menu-buttons">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
      </div>
      <div class="mobile-content">
        <?php if (Yii::app()->hasModule('menu')) : ?>
          <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
        <?php endif; ?>

        <div class="mobile-content-contact">
          <div class="mobile-content__email mobile-content-item">
            <?php if (Yii::app()->hasModule('contentblock')) : ?>
              <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
            <?php endif; ?>
          </div>
          <div class="mobile-content-item">
            <?php if (Yii::app()->hasModule('contentblock')) : ?>
              <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'mode']); ?>
            <?php endif; ?>
          </div>
          <div class="mobile-content__phone mobile-content-item">
            <?php if (Yii::app()->hasModule('contentblock')) : ?>
              <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
            <?php endif; ?>
          </div>
          <div class="mobile-content-btn mobile-content-item"><a href="#callbackModal" data-toggle="modal" class="btn btn-green">Заказать звонок</a></div>
        </div><!-- address -->
      </div>
  </div>
</div><!-- mobile-panel -->
