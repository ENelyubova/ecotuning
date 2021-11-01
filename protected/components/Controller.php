<?php
/**
 * Controller is the customized base front controller class.
 * All front controllers in all modules extends from this base class.
 */
namespace application\components;

use yupe\components\controllers\Controller as BaseController;

/**
 * Class Controller
 * @package application\components
 *
 * @property string|array $title
 * @property string $metaDescription
 * @property string $metaKeywords
 * @property array $metaProperties
 * @property string $canonical
 */
class Controller extends BaseController
{
    public $layout;
    public $userMenuLk;
    public $headerClass = 'header-page';

    /**
     * Contains data for "CBreadcrumbs" widget (navigation element on a site,
     * a look "Main >> Category 1 >> Subcategory 1")
     */
    public $breadcrumbs = [];

    /**
     * Contains data for "CMenu" widget (provides view for menu on the site)
     */
    public $menu = [];

    public function init()
    {
        $this->userMenuLk = [
            [
                'label' => 'История заказов',
                'url' => ['/order/user/index']
            ],
            [
                'label' => 'Настройки',
                'url' => ['/user/profile/profile']
            ],
        ];
        return parent::init();
    }

}
