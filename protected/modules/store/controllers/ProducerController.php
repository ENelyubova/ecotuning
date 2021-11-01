<?php
use yupe\components\controllers\FrontController;

/**
 * Class ProducerController
 */
class ProducerController extends FrontController
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ProducerRepository
     */
    protected $producerRepository;

    /**
     *
     */
    public function init()
    {
        $this->productRepository = Yii::app()->getComponent('productRepository');

        $this->producerRepository = Yii::app()->getComponent('producerRepository');

        parent::init();
    }

    /**
     *
     */
    public function actionIndex()
    {
        $this->render(
            'index',
            [
                'brands' => $this->producerRepository->getAllDataProvider(),
            ]
        );
    }

    /**
     * @param $slug
     * @throws CHttpException
     */
    public function actionView($slug)
    {
        $producer = $this->producerRepository->getBySlug($slug);

        if (null === $producer) {
            throw new CHttpException(404, Yii::t('StoreModule.store', 'Page not found!'));
        }
        $ids = array_column(Yii::app()
                ->db
                ->createCommand()
                ->select('pr.category_id')
                ->from('{{store_product}} pr')
                ->where('pr.producer_id = :producer_id AND pr.category_id IS NOT NULL', [
                    ':producer_id' => $producer->id
                ])
                ->group('pr.category_id')
                ->queryAll(), 'category_id');
        $ids2 = array_column(Yii::app()
                ->db
                ->createCommand()
                ->select('spc.category_id')
                ->from('{{store_product}} pr')
                ->leftjoin('{{store_product_category}} as spc', 'spc.product_id = pr.id')
                ->where('pr.producer_id = :producer_id AND spc.category_id IS NOT NULL', [
                    ':producer_id' => $producer->id
                ])
                ->group('spc.category_id')
                ->queryAll(), 'category_id');
            
            $ids = array_merge($ids, $ids2);

        $categories = StoreCategory::model()->findAllByPk($ids);

        $array = [];
        foreach ($categories as $key => $category) {
            $array[] = $category->parent->name;
        }
        // $ids = array_column(Yii::app()
        //         ->db
        //         ->createCommand()
        //         ->select('pr.category_id, spc.category_id')
        //         ->from('{{store_product}} pr')
        //         ->leftjoin('{{store_category}} as sc', 'sc.id = pr.category_id')
        //         ->leftjoin('{{store_product_category}} as spc', 'spc.product_id = pr.id')
        //         ->where('pr.producer_id = :producer_id', [
        //             ':producer_id' => $producer->id
        //         ])
        //         ->group('spc.category_id, pr.category_id')
        //         ->queryAll(), 'id');

        // $category = $this->producerRepository->getByCategoryProduct($producer);
        echo "<pre>";
        print_r($array);
        Yii::app()->end();

        $this->render(
            $producer->view ?: 'view',
            [
                'brand' => $producer,
                'products' => $this->productRepository->getByBrandProvider($producer),
            ]
        );
    }
}
