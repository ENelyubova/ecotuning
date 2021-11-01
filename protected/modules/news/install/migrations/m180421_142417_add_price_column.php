<?php

class m180421_142417_add_price_column extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{news_news}}', 'price', 'varchar(250) NOT NULL');
    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropColumn('{{news_news}}', 'price');
    }
}