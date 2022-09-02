<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Requests;

use BobCoders9\Cashier\Utils\AbstractOption;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Refund extends AbstractOption
{
    /**
     * @param OptionsResolver $resolver
     */
    protected function configureResolver(OptionsResolver $resolver): void
    {
        $resolver->setRequired(
            [
                'order_id',
                'total_amount',
                'refund_amount',
            ]
        );
        $resolver->setDefaults(
            [
                'reason'    => '',
                'trade_no'  => '',
                'refund_id' => '',
            ]
        );
    }
}
