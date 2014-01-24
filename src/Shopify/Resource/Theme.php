<?php
namespace Shopify\Resource;

class Theme extends ResourceAbstract
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
    protected $_name;
    /**
     * @var string
     */
    protected $_src;
    /**
     * @var string
     */
    protected $_role;

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
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->_role = $role;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->_role;
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
     * @var string
     */
    protected $_updated_at;

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->_src;
    }

    /**
     * @param string $src
     */
    public function setSrc($src)
    {
        $this->_src = $src;
    }
}