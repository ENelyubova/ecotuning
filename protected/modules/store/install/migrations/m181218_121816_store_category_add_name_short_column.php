<?php

class m181218_121816_store_category_add_name_short_column extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{store_category}}', 'name_short', 'string');
    }

    public function safeDown()
    {
        $this->dropColumn('{{store_category}}', 'name_short');
    }
}