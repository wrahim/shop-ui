<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\DiscountWidget\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class DiscountWidgetControllerProvider extends AbstractYvesControllerProvider
{
    const ROUTE_DISCOUNT_VOUCHER_ADD = 'discount/voucher/add';
    const ROUTE_DISCOUNT_VOUCHER_REMOVE = 'discount/voucher/remove';
    const ROUTE_DISCOUNT_VOUCHER_CLEAR = 'discount/voucher/clear';
    const CHECKOUT_VOUCHER_ADD = 'checkout-voucher-add';

    const SKU_PATTERN = '[a-zA-Z0-9-_]+';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{discount}/voucher/add', self::ROUTE_DISCOUNT_VOUCHER_ADD, 'DiscountWidget', 'Voucher', 'add')
            ->assert('discount', $allowedLocalesPattern . 'discount|discount')
            ->value('discount', 'discount');

        $this->createController('/{discount}/voucher/remove', self::ROUTE_DISCOUNT_VOUCHER_REMOVE, 'DiscountWidget', 'Voucher', 'remove')
            ->assert('discount', $allowedLocalesPattern . 'discount|discount')
            ->value('discount', 'discount');

        $this->createController('/{discount}/voucher/clear', self::ROUTE_DISCOUNT_VOUCHER_CLEAR, 'DiscountWidget', 'Voucher', 'clear')
            ->assert('discount', $allowedLocalesPattern . 'discount|discount')
            ->value('discount', 'discount');

        $this->createController('/{checkout}/add-voucher', self::CHECKOUT_VOUCHER_ADD, 'DiscountWidget', 'Checkout', 'addVoucher')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');
    }
}