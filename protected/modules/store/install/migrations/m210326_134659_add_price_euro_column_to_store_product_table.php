<?php

class m210326_134659_add_price_euro_column_to_store_product_table extends yupe\components\DbMigration
{
	public function safeUp()
	{
        $this->addColumn('{{store_product}}', 'price_euro', 'decimal(8,3)');
	}

	public function safeDown()
	{
        $this->dropColumn('{{store_product}}', 'price_euro');
	}
}