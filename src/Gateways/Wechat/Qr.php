<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Gateways\Wechat;

use BobCoders9\Cashier\Requests\Charge;

class Qr extends AbstractWechatGateway
{
    /**
     * @param Charge $form
     *
     * @return array
     */
    protected function prepareCharge(Charge $form): array
    {
        return [];
    }

    protected function doCharge(array $response, Charge $form): array
    {
        return [
            'charge_url' => $response['code_url'],
            'parameters' => [
                'prepay_id' => $response['prepay_id'],
            ],
        ];
    }

    protected function getTradeType(): string
    {
        return 'NATIVE';
    }
}
