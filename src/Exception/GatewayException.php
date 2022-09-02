<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Exception;

use RuntimeException;

class GatewayException extends RuntimeException
{
    protected $raw;

    public function __construct(string $message, $raw = null)
    {
        $this->raw = $raw;

        parent::__construct($message, 0, null);
    }
}
