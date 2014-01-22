<?php

namespace Shopify\Resource;

/**
 * ApplicationCharge Resource Class
 * @package Shopify\Resource
 */
class ApplicationCharge extends ResourceAbstract
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * @var int
     */
    protected $_api_client_id;
    /**
     * @var string
     */
    protected $_confirmation_url;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_name;
    /**
     * @var float
     */
    protected $_price;
    /**
     * @var string
     */
    protected $_return_url;
    /**
     * @var string
     */
    protected $_status;
    /**
     * @var bool
     */
    protected $_test;
    /**
     * @var string
     */
    protected $_updated_at;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmationUrl()
    {
        return $this->_confirmation_url;
    }

    /**
     * @param string $confirmation_url
     * @return $this
     */
    public function setConfirmationUrl($confirmation_url)
    {
        $this->_confirmation_url = $confirmation_url;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->_created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->_price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->_return_url;
    }

    /**
     * @param string $return_url
     * @return $this
     */
    public function setReturnUrl($return_url)
    {
        $this->_return_url = $return_url;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->_status = $status;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getTest()
    {
        return $this->_test;
    }

    /**
     * @param boolean $test
     * @return $this
     */
    public function setTest($test)
    {
        $this->_test = $test;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    /**
     * @param string $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->_updated_at = $updated_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getApiClientId()
    {
        return $this->_api_client_id;
    }

    /**
     * @param int $api_client_id
     */
    public function setApiClientId($api_client_id)
    {
        $this->_api_client_id = $api_client_id;
    }
}