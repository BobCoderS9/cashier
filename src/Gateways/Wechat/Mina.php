<?php
/**
 * @author: BobCoders9
 * @email: bobcoderss@gmail.com
 * @time: 2018-01
 */

namespace BobCoders9\Cashier\Gateways\Wechat;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use BobCoders9\Cashier\Exception\RequestGatewayException;
use BobCoders9\Cashier\Exception\WechatOpenIdException;
use BobCoders9\Cashier\Utils\HttpClient;

class Mina extends Official
{
    const JSAPI_AUTH_URL = 'https://api.weixin.qq.com/sns/jscode2session';

    protected function getOpenId($code): string
    {
        $parameters = [
            'appid'      => $this->config->get('app_id'),
            'secret'     => $this->config->get('app_secret'),
            'js_code'    => $code,
            'grant_type' => 'authorization_code',
        ];

        return HttpClient::request(
            'GET',
            static::JSAPI_AUTH_URL,
            [
                RequestOptions::QUERY => $parameters,
            ],
            function (ResponseInterface $response) {
                $result = json_decode($response->getBody(), true);

                if (isset($result['errcode'])) {
                    throw new WechatOpenIdException($result['errmsg']);
                }

                return $result['openid'];
            },
            function (RequestException $exception) {
                throw new RequestGatewayException('Wechat Gateway Error', $exception);
            }
        );
    }
}
