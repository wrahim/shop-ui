<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\NewsletterWidget\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class NewsletterWidgetControllerProvider extends AbstractYvesControllerProvider
{
    const ROUTE_NEWSLETTER_SUBSCRIBE = 'newsletter/subscribe';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{newsletter}/subscribe', self::ROUTE_NEWSLETTER_SUBSCRIBE, 'NewsletterWidget', 'Subscription', 'subscribe')
            ->assert('newsletter', $allowedLocalesPattern . 'newsletter|newsletter')
            ->value('newsletter', 'newsletter');
    }
}