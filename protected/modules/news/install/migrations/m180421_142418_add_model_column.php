<?php

class m180421_142418_add_model_column extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{news_news}}', 'name_model', 'varchar(250) NOT NULL');
    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropColumn('{{news_news}}', 'name_model');
    }
}