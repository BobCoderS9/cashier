<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Gateways;

use BobCoders9\Cashier\Contracts\GatewayInterface;
use BobCoders9\Cashier\Utils\Config;

abstract class AbstractGateway implements GatewayInterface
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * AbstractGateway constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * 格式化消息.
     *
     * @param $receives
     *
     * @return array
     */
    abstract public function convertNotificationToArray($receives): array;
}
