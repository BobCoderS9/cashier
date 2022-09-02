<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Gateways\Alipay;

use BobCoders9\Cashier\Requests\Charge;

class Web extends AbstractAlipayGateway
{
    protected function getChargeMethod(): string
    {
        return 'alipay.trade.page.pay';
    }

    protected function prepareCharge(Charge $form): array
    {
        return [
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
        ];
    }
}
