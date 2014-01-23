<?php
namespace Shopify\Entity;

use Shopify\Exception;

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

        //Check if response contains 'application_charge' object
        if (!isset($response['shop'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $shopData = $response['shop'];

        $shopObject = new \Shopify\Resource\Shop();
        $shopObject->fillObjectFromArray($shopData);

        return $shopObject;
    }
}