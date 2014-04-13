<?php
namespace Shopify\Entity;

use Shopify\Exception;

class Product extends EntityAbstract
{

    /**
     * @var array
     */
    protected $_options = [
        'limit' => null,
        'page' => null,
        'since_id' => null,
        'vendor' => null,
        'handle' => null,
        'product_type' => null,
        'collection_id' => null,
        'created_at_min' => null,
        'created_at_max' => null,
        'updated_at_min' => null,
        'updated_at_max' => null,
        'published_at_min' => null,
        'published_at_max' => null,
        'published_status' => null,
        'fields' => null,
    ];

    /**
     * Returns the list of products
     *
     * @return \Shopify\Resource\Product[]
     */
    public function getProducts()
    {
        $response = $this->_request('/admin/products.json', $this->getOptions());

        return $this->_parseMultipleObjects($response, 'products', '\Shopify\Resource\Product');
    }


    /**
     * Returns the number of products
     * @return int
     * @throws \Shopify\Exception
     */
    public function getProductsCount()
    {
        // Make an API call
        $response = $this->_request('/admin/products/count.json', $this->getOptions());

        //Check if response contains 'application_charge' object
        if (!isset($response['count'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        return (int)$response['count'];
    }

    /**
     * Returns the product info by it's ID
     *
     * @param int $productId
     * @return \Shopify\Resource\Product
     */
    public function getProduct($productId)
    {
        // Make an API call
        $response = $this->_request('/admin/products/' . $productId . '.json', $this->getOptions());

        return $this->_parseSingleObject($response, 'product', '\Shopify\Resource\Product');
    }

    /**
     * Create a new product
     *
     * @param \Shopify\Resource\Product $product
     * @return \Shopify\Resource\ResourceAbstract
     */
    public function createProduct(\Shopify\Resource\Product $product)
    {
        $response = $this->_request('/admin/products.json',
            ['product' => $product->toArray()], EntityAbstract::METH_POST);

        return $this->_parseSingleObject($response, 'product', '\Shopify\Resource\Product');
    }

    /**
     * Update specified product with provided data
     *
     * @param \Shopify\Resource\Product $product
     * @return \Shopify\Resource\ResourceAbstract
     * @throws \Shopify\Exception
     */
    public function updateProduct(\Shopify\Resource\Product $product)
    {
        //Check for an ID
        if ((int)$product->getId() <= 0) {
            throw new Exception('Provided entity should have an ID.');
        }

        $response = $this->_request('/admin/products/' . $product->getId() . '.json',
            ['product' => $product->toArray()], EntityAbstract::METH_PUT);

        return $this->_parseSingleObject($response, 'product', '\Shopify\Resource\Product');
    }

    /**
     * Remove product
     *
     * @param int $productId
     */
    public function deleteProduct($productId)
    {
        $this->_request('/admin/products/' . $productId . '.json', [], EntityAbstract::METH_DELETE);
    }
}