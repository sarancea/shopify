<?php

namespace Shopify\Entity;

use Phalcon\Http\Client\Provider\Curl;

/**
 * Abstract entity class
 * @package Shopify\Entity
 */
abstract class EntityAbstract
{
    /**
     * @var string
     */
    protected $_baseUri;

    /**
     * @var Curl
     */
    protected $_curlClient;

    /**
     * @return mixed
     */
    public function getBaseUri()
    {
        return $this->_baseUri;
    }

    /**
     * @return \Phalcon\Http\Client\Provider\Curl
     */
    public function getCurlClient()
    {
        return $this->_curlClient;
    }

    /**
     * @param \Phalcon\Http\Client\Provider\Curl $curlClient
     * @return $this
     */
    public function setCurlClient($curlClient)
    {
        $this->_curlClient = $curlClient;
        return $this;
    }


}