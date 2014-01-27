<?php
namespace Shopify\Resource;

/**
 * Class ScriptTag
 * @package Shopify\Resource
 */
class ScriptTag extends ResourceAbstract
{
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
     * @param string $event
     */
    public function setEvent($event)
    {
        $this->_event = $event;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->_event;
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
     * @param string $src
     */
    public function setSrc($src)
    {
        $this->_src = $src;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->_src;
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
     * @var int
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_src;
    /**
     * @var string
     */
    protected $_event;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_updated_at;
}