<?php
namespace Shopify\Entity;

class Shop extends EntityAbstract
{
    /**
     * @var string
     */
    protected $_name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     * @return Shop
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }
}