<?php

class m180421_143941_add_blog_visit extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{blog_post}}', 'visit', 'integer default "0"');
    }
        public function safeDown()
    {
        $this->dropColumn('{{blog_post}}', 'visit');
    }
}