<?php $this->beginContent('//layouts/main'); ?>
    <?php 
        $user = Yii::app()->getUser()->getProfile(); 
    ?>
    <?php $this->title = 'Личный кабинет'; ?>
    <div class="lk-content">
        <div class="content-site">
            <?php $this->widget('application.components.MyTbBreadcrumbs', [
                'links' => $this->breadcrumbs,
            ]); ?>
            <div class="lk-content-head fl fl-jc-sb">
                <h1><?= $this->title; ?></h1>
                <a href="<?= Yii::app()->createUrl('/user/account/logout'); ?>">
                    <span>Выйти</span>
                    <?= file_get_contents('.'. Yii::app()->getTheme()->getAssetsUrl() . '/images/svg/logout.svg'); ?>
                </a>
            </div>
            
            <div class="lk-user fl fl-w fl-jc-sb">
                <div class="lk-user__img">
                    <?php if($user->avatar) : ?>
                        <?= CHtml::image($user->getImageUrl(), ''); ?>
                    <?php else: ?>
                        <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.png', '', ['class' => 'nophoto']); ?>
                    <?php endif; ?>
                </div>
                <div class="lk-user__content fl fl-w">
                    <div class="lk-user__info lk-user-info">
                        <div class="lk-user__name lk-user-info__item">
                            <div class="lk-user-info__heading">Ф.И.О.: </div>
                            <div class="lk-user-info__body">
                                <?php if($user->last_name || $user->first_name || $user->middle_name): ?>
                                    <?php if($user->last_name): ?>
                                        <?= $user->last_name; ?>
                                    <?php endif; ?>
                                    <?php if($user->first_name): ?>
                                        <?= $user->first_name; ?>
                                    <?php endif; ?>
                                    <?php if($user->middle_name): ?>
                                        <?= $user->middle_name; ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    не указано
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="lk-user__gender lk-user__item lk-user-info__item">
                            <div class="lk-user-info__heading">Пол: </div>
                            <div class="lk-user-info__body">
                                <?php if($user->gender): ?>
                                    <?= $user->getGender(); ?>
                                <?php else: ?>
                                    не указан
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="lk-user__location lk-user__item lk-user-info__item">
                            <div class="lk-user-info__heading">Адрес: </div>
                            <div class="lk-user-info__body">
                                <?php if($user->location): ?>
                                    <?= $user->location; ?>
                                <?php else: ?>
                                    не указан
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="lk-user__contact lk-user-info">
                        <h4>Контакты</h4>
                        <div class="lk-user__phone lk-user__item lk-user-info__item">
                            <div class="lk-user-info__heading">Телефон: </div>
                            <div class="lk-user-info__body">
                                <?php if($user->phone): ?>
                                    <?= $user->phone; ?>
                                <?php else: ?>
                                    не указан
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="lk-user__email lk-user__item lk-user-info__item">
                            <div class="lk-user-info__heading">E-mail: </div>
                            <div class="lk-user-info__body">
                                <?php if($user->email): ?>
                                    <?= $user->email; ?>
                                <?php else: ?>
                                    не указан
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lk-box">
                <div class="lk-box__menu">
                    <?php $this->widget('zii.widgets.CMenu', [
                        'items' => $this->userMenuLk,
                        'htmlOptions' => ['class' => 'lk-menu'],
                    ]) ?>
                    
                </div>
                <div class="lk-box__content">
                    <?= $content; ?>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>
