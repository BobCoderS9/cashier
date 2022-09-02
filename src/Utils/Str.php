<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-03
 */

namespace BobCoders9\Cashier\Utils;

class Str
{
    /**
     * @param $string
     *
     * @return string
     */
    public static function studly($string)
    {
        return ucfirst(str_replace(' ', '', lcfirst(ucwords(str_replace(['-', '_'], ' ', $string)))));
    }
}
