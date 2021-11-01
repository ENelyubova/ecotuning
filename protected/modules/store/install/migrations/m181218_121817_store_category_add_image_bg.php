<?php

class m181218_121817_store_category_add_image_bg extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{store_category}}', 'img_bg', 'string');
    }

    public function safeDown()
    {
        $this->dropColumn('{{store_category}}', 'img_bg');
    }
}