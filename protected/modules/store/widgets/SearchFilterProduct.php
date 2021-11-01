<?php

Yii::import('application.modules.store.models.*');

class SearchFilterProduct extends yupe\widgets\YWidget
{   
	public $ajax = false;
	public $rootCategory = null;
	public $level = null;
	public $model = null;
	public $category = null;

    public $view = 'view';

    public function run()
    {
    	if($this->rootCategory){
    		$this->model = StoreCategory::model()->published()->findByPk($this->rootCategory);
    	}
        $this->render($this->view, [
        	'ajax'=>$this->ajax, 
        	'category' => $this->category,
        	'model' => $this->model,
        	'level' => $this->level,
        ]);
    }
}