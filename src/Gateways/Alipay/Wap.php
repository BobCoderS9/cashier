<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Gateways\Alipay;

use BobCoders9\Cashier\Requests\Charge;

class Wap extends AbstractAlipayGateway
{
    protected function getChargeMethod(): string
    {
        return 'alipay.trade.wap.pay';
    }

    protected function prepareCharge(Charge $form): array
    {
        return [
            'product_code' => 'QUICK_WAP_WAY',
        ];
    }
}
