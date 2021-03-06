<?php

namespace FondOfOryx\Client\ErpInvoicePermission;

use FondOfOryx\Client\ErpInvoicePermission\Dependency\Client\ErpInvoicePermissionToZedRequestBridge;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class ErpInvoicePermissionDependencyProvider extends AbstractDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addZedRequestClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addZedRequestClient(Container $container)
    {
        $container[static::CLIENT_ZED_REQUEST] = function (Container $container) {
            return new ErpInvoicePermissionToZedRequestBridge($container->getLocator()->zedRequest()->client());
        };

        return $container;
    }
}
