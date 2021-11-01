<?= Yii::t(
    'UserModule.user',
    'You was successfully registered on "{site}" !',
    [
        '{site}' => CHtml::encode(
            Yii::app()->getModule('yupe')->siteName
        ),
    ]
); ?>
<br/>
<strong>Ваш логин:</strong> <?= CHtml::encode($user->email); ?><br>
<strong>Ваш пароль:</strong> <?= CHtml::encode($user->password); ?>

<br/><br/>

<?= Yii::t(
    'UserModule.user',
    'Truly yours, administration of "{site}" !',
    [
        '{site}' => CHtml::encode(
            Yii::app()->getModule('yupe')->siteName
        ),
    ]
); ?>