<?php

/**
 * Добавляем параметр "телефон"
 *
 * @category YupeMigration
 * @package  yupe.modules.user.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     https://yupe.ru
 **/
class m151006_000001_user_photo extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{user_user}}', 'image', 'varchar(250)');
    }

    public function safeDown()
    {
        $this->dropColumn('{{user_user}}', 'image');
    }
}
