<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Responses;

use BobCoders9\Cashier\Utils\AbstractOption;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Charge extends AbstractOption
{
    /**
     * @param OptionsResolver $resolver
     */
    protected function configureResolver(OptionsResolver $resolver): void
    {
        $resolver->setRequired(
            [
                'charge_url',
            ]
        );
        $resolver->setDefaults(
            [
                'parameters' => [],
            ]
        );
        $resolver->setAllowedTypes('parameters', 'array');
    }
}
