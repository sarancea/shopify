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
        return $this->_parseMultipleObjects($response, 'metafields', '\Shopify\Resource\Metafield');
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
        return $this->_parseMultipleObjects($response, 'metafields', '\Shopify\Resource\Metafield');
    }

    /**
     * Returns metafields that belong to a product
     * @param int $productId
     * @return \Shopify\Resource\Metafield[]
     */
    public function getProductMetafields($productId)
    {
        $response = $this->_request('/admin/products/' . $productId . '/metafields.json', $this->getOptions());
        return $this->_parseMultipleObjects($response, 'metafields', '\Shopify\Resource\Metafield');
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

        return $this->_parseSingleObject($response, 'metafield', '\Shopify\Resource\Metafield');
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

        return $this->_parseSingleObject($response, 'metafield', '\Shopify\Resource\Metafield');
    }


    /**
     * Create a new metafield for a store
     *
     * @param \Shopify\Resource\Metafield $metafield
     * @return \Shopify\Resource\Metafield
     */
    public function createStoreMetafield(\Shopify\Resource\Metafield $metafield)
    {
        $response = $this->_request(
            '/admin/metafields.json',
            $metafield->toArray(),
            EntityAbstract::METH_POST
        );

        return $this->_parseSingleObject($response, 'metafield', '\Shopify\Resource\Metafield');
    }

    /**
     * Create a new metafield for a product
     *
     * @param int $productId
     * @param \Shopify\Resource\Metafield $metafield
     * @return \Shopify\Resource\Metafield
     */
    public function createProductMetafield($productId, \Shopify\Resource\Metafield $metafield)
    {
        $response = $this->_request(
            '/admin/products/' . $productId . '/metafields.json',
            $metafield->toArray(),
            EntityAbstract::METH_POST
        );

        return $this->_parseSingleObject($response, 'metafield', '\Shopify\Resource\Metafield');
    }

    /**
     * Update a store metafield
     *
     * @param \Shopify\Resource\Metafield $metafield
     * @return \Shopify\Resource\Metafield
     * @throws \Shopify\Exception
     */
    public function updateStoreMetafield(\Shopify\Resource\Metafield $metafield)
    {
        if ((int)$metafield->getId() <= 0) {
            throw new Exception('Metafield should have an ID.');
        }

        $response = $this->_request(
            '/admin/metafields/' . $metafield->getId() . '.json',
            $metafield->toArray(),
            EntityAbstract::METH_PUT
        );

        return $this->_parseSingleObject($response, 'metafield', '\Shopify\Resource\Metafield');
    }

    /**
     * Update a product metafield
     *
     * @param int $productId
     * @param \Shopify\Resource\Metafield $metafield
     * @throws \Shopify\Exception
     * @return \Shopify\Resource\Metafield
     */
    public function updateProductMetafield($productId, \Shopify\Resource\Metafield $metafield)
    {
        if ((int)$metafield->getId() <= 0) {
            throw new Exception('Metafield should have an ID.');
        }

        $response = $this->_request(
            '/admin/products/' . $productId . '/metafields/' . $metafield->getId() . '.json',
            $metafield->toArray(),
            EntityAbstract::METH_PUT
        );

        return $this->_parseSingleObject($response, 'metafield', '\Shopify\Resource\Metafield');
    }


    /**
     * Delete a store metafield
     * @param int $metafieldId
     * @return void
     */
    public function deleteStoreMetafield($metafieldId)
    {
        $this->_request('/admin/metafields/' . $metafieldId . '.json', [], EntityAbstract::METH_DELETE);
    }

    /**
     * Delete a product metafield
     *
     * @param int $productId
     * @param int $metafieldId
     * @return void
     */
    public function deleteProductMetafield($productId, $metafieldId)
    {
        $this->_request('/admin/products/' . $productId . '/metafields/' . $metafieldId . '.json', [], EntityAbstract::METH_DELETE);
    }


}