<div class="footer">
    <div class="content-site">
        <div class="footer-panel fl fl-jc-sb">
            <div class="footer-logo footer-item">
                <div class="logo">
                    <a href="/">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'logo-footer']); ?>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="footer-info"> 
                    © <?= date('Y'); ?> "Экотюнинг" ООО <br>Все права защищены
                </div>
                <a href="/politika-konfidencialnosti" target="_blank" class="link-policy">Политика конфиденциальности</a>
            </div>
            <div class="footer-menu footer-item">
                <p class="footer-heading">Навигация</p>
                <?php if (Yii::app()->hasModule('menu')) : ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
                <?php endif; ?>
            </div>
            
            <div class="footer-contacts footer-item">
                <p class="footer-heading">Контакты</p>
                <div class="footer-contacts-item footer-contacts-phone">
                    <p>
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'mode']); ?>
                        <?php endif; ?>
                    </p>
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-contacts-item footer-contacts-email">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-contacts-item">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-contacts-item">
                    <div class="footer-social fl fl-ai-c">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom fl fl-ai-c fl-jc-sb">
            <div class="footer-info footer-info-bottom"> 
                Обращаем ваше внимание на то, что данный интернет-сайт, а также вся информация об услугах и ценах, предоставленная на нём, носит исключительно информационный характер и не является публичной офертой, определяемой положениями Статьи 437 Гражданского кодекса Российской Федерации.
            </div>
            <div class="dc56 fl fl-d-c">
                <p>Создано в</p>
                <a href="https://dcmedia.ru/"></a>
            </div>
        </div>
    </div>
</div>
