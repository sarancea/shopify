<?php

namespace Shopify\Resource;

class Metafield extends ResourceAbstract
{

    /**
     * @var int
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_description;
    /**
     * @var string
     */
    protected $_key;
    /**
     * @var string
     */
    protected $_namespace;
    /**
     * @var string
     */
    protected $_owner_resource;
    /**
     * @var int
     */
    protected $_owner_id;
    /**
     * @var mixed
     */
    protected $_value;
    /**
     * @var string
     */
    protected $_value_type;
    /**
     * @var string
     */
    protected $_updated_at;

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
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
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
     * @param string $key
     */
    public function setKey($key)
    {
        $this->_key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->_namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->_namespace;
    }

    /**
     * @param string $owner_resource
     */
    public function setOwnerResource($owner_resource)
    {
        $this->_owner_resource = $owner_resource;
    }

    /**
     * @return string
     */
    public function getOwnerResource()
    {
        return $this->_owner_resource;
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

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param string $value_type
     */
    public function setValueType($value_type)
    {
        $this->_value_type = $value_type;
    }

    /**
     * @return string
     */
    public function getValueType()
    {
        return $this->_value_type;
    }

    /**
     * @return int
     */
    public function getOwnerId()
    {
        return $this->_owner_id;
    }

    /**
     * @param int $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->_owner_id = $owner_id;
    }


}