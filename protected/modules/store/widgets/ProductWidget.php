<?php

Yii::import('application.modules.store.models.*');

class ProductWidget extends yupe\widgets\YWidget
{   
    public $category_id;
    public $is_stock;
    public $is_order;
    public $limit = 15;
    public $product_id;
    // public $in_order = 't.position ASC';
    
    public $view = 'view';
    protected $products;

    public function run()
    {
        $criteria = new CDbCriteria();

        if($this->limit){
            $criteria->limit = $this->limit;
        }
        if($this->product_id){
            $this->product_id = explode(',', $this->product_id);
            $criteria->addNotInCondition('id', $this->product_id);
        }
        
        // $criteria->order = $this->order;
        
        $criteria->compare('t.is_stock', $this->is_stock);
        $criteria->compare('t.in_order', $this->is_order);
        $criteria->compare('t.category_id', $this->category_id);
        $this->products = Product::model()->published()->findAll($criteria);

        $this->render($this->view, [
            'products' => $this->products
        ]);
    }
}