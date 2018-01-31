<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ShopPermission;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use SprykerShop\Yves\ShopPermission\Dependency\Client\ShopPermissionToPermissionClientBridge;

class ShopPermissionDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PERMISSION_TWIG_FUNCTION_PLUGINS = 'PERMISSION_TWIG_FUNCTION_PLUGINS';
    public const CLIENT_PERMISSION = 'CLIENT_PERMISSION';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = parent::provideDependencies($container);
        $container = $this->addPermissionClient($container);
        $container = $this->addPermissionTwigFunctionPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addPermissionClient(Container $container)
    {
        $container[static::CLIENT_PERMISSION] = function (Container $container) {
            return new ShopPermissionToPermissionClientBridge($container->getLocator()->permission()->client());
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addPermissionTwigFunctionPlugins(Container $container)
    {
        $container[static::PERMISSION_TWIG_FUNCTION_PLUGINS] = function (Container $container) {
            return $this->getPermissionTwigFunctionPlugins();
        };

        return $container;
    }

    /**
     * @return \Spryker\Yves\Twig\Plugin\TwigFunctionPluginInterface[]
     */
    protected function getPermissionTwigFunctionPlugins()
    {
        return [];
    }
}