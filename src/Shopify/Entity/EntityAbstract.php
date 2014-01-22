<?php

namespace Shopify\Entity;

/**
 * Abstract entity class
 * @package Shopify\Entity
 */
abstract class EntityAbstract
{
    protected $_baseUri;

    /**
     * @return mixed
     */
    public function getBaseUri()
    {
        return $this->_baseUri;
    }

}