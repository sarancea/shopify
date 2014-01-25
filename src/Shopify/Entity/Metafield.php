<?php

namespace Shopify\Entity;

use Shopify\Exception;

class Metafield extends EntityAbstract
{
    /**
     * @var array
     */
    protected $_options = [
        'limit' => null,
        'since_id' => null,
        'created_at_min' => null,
        'created_at_max' => null,
        'updated_at_min' => null,
        'updated_at_max' => null,
        'namespace' => null,
        'key' => null,
        'value_type' => null,
        'fields' => null,
    ];

    /**
     * Get metafields that belong to a store
     *
     * @return \Shopify\Resource\Metafield[]
     * @throws \Shopify\Exception
     */
    public function getStoreMetafields()
    {
        $response = $this->_request('/admin/metafields.json', $this->getOptions());
        return $this->_processMetafields($response);
    }

    /**
     * Return a count of metafields that belong to a store
     *
     * @return int
     */
    public function getStoreMetafieldsCount()
    {
        $response = $this->_request('/admin/metafields/count.json', []);
        return (int)$response['count'];
    }


    /**
     * Return all metafields that belong to the images of a product
     *
     * @param int $productImageId
     * @return \Shopify\Resource\Metafield[]
     */
    public function getProductImageMetafields($productImageId)
    {
        $response = $this->_request('/admin/metafields.json?metafield[owner_id]='
            . $productImageId . '&metafield[owner_resource]=product_image', $this->getOptions());
        return $this->_processMetafields($response);
    }

    /**
     * Returns metafields that belong to a product
     * @param int $productId
     * @return \Shopify\Resource\Metafield[]
     */
    public function getProductMetafields($productId)
    {
        $response = $this->_request('/admin/products/' . $productId . '/metafields.json', $this->getOptions());
        return $this->_processMetafields($response);
    }

    /**
     * Return a count of all metafields that belong to a product
     *
     * @param int $productId
     * @return int
     */
    public function getProductMetafieldsCount($productId)
    {
        $response = $this->_request('/admin/products/' . $productId . '/metafields/count.json', []);
        return (int)$response['count'];
    }


    /**
     * Return  a single store metafield by its ID
     * @param int $metafieldId
     * @return \Shopify\Resource\Metafield
     * @throws \Shopify\Exception
     */
    public function getStoreMetafield($metafieldId)
    {
        $response = $this->_request('/admin/metafields/' . $metafieldId . '.json', $this->getOptions());

        return $this->_processMetafield($response);
    }

    /**
     * Return a single product metafield by its ID
     *
     * @param int $productId
     * @param int $metafieldId
     * @return \Shopify\Resource\Metafield
     */
    public function getProductMetafield($productId, $metafieldId)
    {
        $response = $this->_request('/admin/products/' . $productId . '/metafields/' . $metafieldId . '.json',
            $this->getOptions());

        return $this->_processMetafield($response);
    }


    /**
     * Internal processor of a single metafield response
     * @param array $response
     * @return \Shopify\Resource\Metafield
     * @throws \Shopify\Exception
     */
    protected function _processMetafield($response)
    {
        if (!isset($response['metafield'])) {
            throw new Exception('Response is not valid. Response: ' . var_export($response, true));
        }

        $metafieldData = $response['metafield'];

        $metafieldObject = new \Shopify\Resource\Metafield();
        $metafieldObject->fillObjectFromArray($metafieldData);

        return $metafieldObject;
    }

    /**
     * Internal processor of metafields response
     * @param array $response
     * @return \Shopify\Resource\Metafield[]
     * @throws \Shopify\Exception
     */
    protected function _processMetafields($response)
    {
        if (!isset($response['metafields'])) {
            throw new Exception('Response is not valid. Response :' . var_export($response, true));
        }

        $metafieldsDataList = $response['metafields'];
        $metafieldsObjectsList = [];

        foreach ($metafieldsDataList as $metafieldData) {
            $metafieldObject = new \Shopify\Resource\Metafield();
            $metafieldObject->fillObjectFromArray($metafieldData);

            $metafieldsObjectsList[] = $metafieldObject;
        }

        return $metafieldsObjectsList;
    }
}