<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Gateways\Union;

use BobCoders9\Cashier\Requests\Charge;
use BobCoders9\Cashier\Requests\Query;

class Web extends AbstractUnionGateway
{
    /**
     * 支付.
     *
     * @param Charge $form
     *
     * @return array
     */
    public function charge(Charge $form): array
    {
        $payload = $this->createPayload(
            array_merge(
                [
                    'txnTime'        => date('YmdHis', $form->get('created_at')),
                    'txnType'        => '01',
                    'txnSubType'     => '01',
                    'frontUrl'       => $form->get('return_url'),
                    'backUrl'        => $this->config->get('notify_url'),
                    'channelType'    => '08',
                    'orderId'        => $form->get('order_id'),
                    'txnAmt'         => $form->get('amount'),
                    'currencyCode'   => '156',
                    'defaultPayType' => '0001',
                ],
                $form->get('extras')
            )
        );

        return [
            'charge_url' => self::WEB_CHARGE,
            'parameters' => $payload,
        ];
    }

    /**
     * 查询.
     *
     * @param Query $form
     *
     * @return array
     */
    public function query(Query $form): array
    {
        $payload = $this->createPayload(
            array_merge(
                [
                    'txnTime'    => date('YmdHis', $form->get('created_at')),
                    'txnType'    => '00',
                    'txnSubType' => '00',
                    'orderId'    => $form->get('order_id'),
                ],
                $form->get('extras')
            )
        );

        $response = $this->request(self::WEB_QUERY_ORDER, $payload);

        return [
            'order_id'              => $response['orderId'],
            'status'                => $this->formatTradeStatus($response['origRespCode']),
            'trade_sn'              => $response['queryId'] ?? '',
            'buyer_identifiable_id' => '',
            'amount'                => ($response['settleAmt'] ?? 0),
            'buyer_name'            => '',
            'raw'                   => $response,
        ];
    }
}
