<?php

/**
 * PriceOverview
 */
class PriceOverview extends yupe\widgets\YWidget
{
    public $view = 'price-overview';

    public function run()
    {
        $cart = Yii::app()->cart;
        $positions = $cart->getPositions();
        $orderModule = Yii::app()->getModule('order');

        $this->render($this->view, [
            'cart'         => $cart,
            'positions'    => $positions,
            'discountSumm' => $this->getDiscountSumm($positions),
            'orderModule'    => $orderModule,
        ]);
    }

    public function getDiscountSumm($positions)
    {
        $summ = 0;
        foreach ($positions as $position) {
        }

        return $summ;
    }
}
