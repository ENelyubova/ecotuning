<?php
use yupe\components\controllers\FrontController;

/**
 * Class CategoryController
 */
class CategoryController extends FrontController
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var StoreCategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var AttributeFilter
     */
    protected $attributeFilter;

    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->productRepository = Yii::app()->getComponent('productRepository');
        $this->attributeFilter = Yii::app()->getComponent('attributesFilter');
        $this->categoryRepository = Yii::app()->getComponent('categoryRepository');
    }

    /**
     *
     */
    public function actionIndex()
    {
        $this->render(
            'index',
            [
                'dataProvider' => $this->categoryRepository->getAllDataProvider(),
            ]
        );
    }

    /**
     * @param $path
     * @throws CHttpException
     */
    public function actionView($path)
    {
        $category = $this->categoryRepository->getByPath($path);

        if (null === $category) {
            throw new CHttpException(404);
        }

        $typesSearchParam = $this->attributeFilter->getTypeAttributesForSearchFromQuery(Yii::app()->getRequest());

        $mainSearchParam = $this->attributeFilter->getMainAttributesForSearchFromQuery(
            Yii::app()->getRequest(),
            [
                AttributeFilter::MAIN_SEARCH_PARAM_CATEGORY => Yii::app()->getRequest()->getQuery('category',
                    [$category->id]),
            ]
        );

        if (!empty($mainSearchParam) || !empty($typesSearchParam)) {
            $data = $this->productRepository->getByFilter($mainSearchParam, $typesSearchParam);
        } else {
            $data = $this->productRepository->getListForCategory($category);
        }

        $this->render(
            $category->view ?: 'view',
            [
                'dataProvider' => $data,
                'category' => $category,
            ]
        );
    }
    public function actionLoadingData()
    {
        $category = null;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = StoreCategory::model()->published()->findByPk($id);
        }

        if (null === $category) {
            throw new CHttpException(404);
        }
        $childCategory = $category->children(['condition' => 'status=1']);
        if($childCategory){
            foreach($childCategory as $key => $item){
                echo "<li class='js-loading-item'><a data-id='{$item->id}' class='js-loading-data' href='{$item->getCategoryUrl()}'>{$item->name_short}</a></li>";
            }
        }else{
            return '';
        }
    }
}