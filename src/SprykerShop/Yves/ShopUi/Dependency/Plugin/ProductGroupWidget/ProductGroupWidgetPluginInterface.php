<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ShopUi\Dependency\Plugin\ProductGroupWidget;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Yves\Kernel\Dependency\Plugin\WidgetPluginInterface;

/**
 * @deprecated Use \SprykerShop\Yves\ProductGroupWidget\Widget\ProductGroupWidget instead.
 */
interface ProductGroupWidgetPluginInterface extends WidgetPluginInterface
{
    public const NAME = 'ProductGroupWidgetPlugin';

    /**
     * @api
     *
     * @param int $idProductAbstract
     * @param string $template
     *
     * @return void
     */
    public function initialize(ProductViewTransfer $productViewTransfer, $template): void;
}
