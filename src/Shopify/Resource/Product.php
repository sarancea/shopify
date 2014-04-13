<?php
namespace Shopify\Resource;

class Product extends ResourceAbstract
{
    /**
     * @var int
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_body_html;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_handle;
    /**
     * @var array
     */
    protected $_images;
    /**
     * @var array
     */
    protected $_options;
    /**
     * @var string
     */
    protected $_product_type;
    /**
     * @var string
     */
    protected $_published_at;
    /**
     * @var string
     */
    protected $_published_scope;
    /**
     * @var string
     */
    protected $_tags;
    /**
     * @var string
     */
    protected $_template_suffix;
    /**
     * @var string
     */
    protected $_title;
    /**
     * @var string
     */
    protected $_updated_at;
    /**
     * @var array
     */
    protected $_variants;
    /**
     * @var string
     */
    protected $_vendor;

    /**
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->_body_html;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * @return string
     */
    public function getHandle()
    {
        return $this->_handle;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->_images;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->_product_type;
    }

    /**
     * @return string
     */
    public function getPublishedAt()
    {
        return $this->_published_at;
    }

    /**
     * @return string
     */
    public function getPublishedScope()
    {
        return $this->_published_scope;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->_tags;
    }

    /**
     * @return string
     */
    public function getTemplateSuffix()
    {
        return $this->_template_suffix;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    /**
     * @return array
     */
    public function getVariants()
    {
        return $this->_variants;
    }

    /**
     * @return string
     */
    public function getVendor()
    {
        return $this->_vendor;
    }
}