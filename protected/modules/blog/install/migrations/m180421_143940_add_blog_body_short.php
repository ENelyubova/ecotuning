<?php

class m180421_143940_add_blog_body_short extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{blog_blog}}', 'body_short', 'text');
    }
        public function safeDown()
    {
        $this->dropColumn('{{blog_blog}}', 'body_short');
    }
}