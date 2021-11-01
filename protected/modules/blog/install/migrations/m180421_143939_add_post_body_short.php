<?php

class m180421_143939_add_post_body_short extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{blog_post}}', 'body_short', 'text');
    }
        public function safeDown()
    {
        $this->dropColumn('{{blog_post}}', 'body_short');
    }
}