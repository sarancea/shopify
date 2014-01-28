<?php
namespace Shopify\Entity;

/**
 * Class Shop
 * @package Shopify\Entity
 */
class Shop extends EntityAbstract
{
    /**
     * Get the configuration of the shop account
     *
     * @return \Shopify\Resource\Shop
     * @throws \Shopify\Exception
     */
    public function getConfig()
    {
        // Make an API call
        $response = $this->_request('/admin/shop.json');

        return $this->_parseSingleObject($response, 'shop', '\Shopify\Resource\Shop');
    }
}