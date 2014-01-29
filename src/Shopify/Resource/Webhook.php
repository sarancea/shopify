<?php

namespace Shopify\Resource;

use Shopify\Exception;

class WebHook extends ResourceAbstract
{

    /**
     * @var int
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_address;
    /**
     * @var string
     */
    protected $_format = 'json';
    /**
     * @var string
     */
    protected $_topic;
    /**
     * @var array
     */
    protected $_valid_topics = [
        'orders/create', 'orders/delete', 'orders/updated', 'orders/paid', 'orders/cancelled', 'orders/fulfilled',
        'orders/partially_fulfilled', 'carts/create', 'carts/update', 'checkouts/create', 'checkouts/update',
        'checkouts/delete', 'products/create', 'products/update', 'products/delete', 'collections/create',
        'collections/update', 'collections/delete', 'customer_groups/create', 'customer_groups/update',
        'customer_groups/delete', 'customers/create', 'customers/enable', 'customers/disable', 'customers/update',
        'customers/delete', 'fulfillments/create', 'fulfillments/update', 'shop/update', 'app/uninstalled',
    ];


    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_updated_at;

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->_created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->_format = $format;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->_format;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $topic
     * @throws Exception
     */
    public function setTopic($topic)
    {

        if (!in_array($topic, $this->_valid_topics)) {
            throw new Exception('Event is not valid.');
        }

        $this->_topic = $topic;
    }

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->_topic;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->_updated_at = $updated_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }
}