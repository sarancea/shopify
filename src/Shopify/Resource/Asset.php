<?php

namespace Shopify\Resource;

class Asset extends ResourceAbstract
{

    /**
     * @var string
     */
    protected $_attachment;
    /**
     * @var string
     */
    protected $_content_type;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_key;
    /**
     * @var string
     */
    protected $_public_url;
    /**
     * @var string
     */
    protected $_size;
    /**
     * @var string
     */
    protected $_source_key;
    /**
     * @var string
     */
    protected $_src;
    /**
     * @var int
     */
    protected $_theme_id;
    /**
     * @var string
     */
    protected $_updated_at;

    /**
     * @param string $attachment
     */
    public function setAttachment($attachment)
    {
        $this->_attachment = $attachment;
    }

    /**
     * @return string
     */
    public function getAttachment()
    {
        return $this->_attachment;
    }

    /**
     * @param string $content_type
     */
    public function setContentType($content_type)
    {
        $this->_content_type = $content_type;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->_content_type;
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
     * @param string $public_url
     */
    public function setPublicUrl($public_url)
    {
        $this->_public_url = $public_url;
    }

    /**
     * @return string
     */
    public function getPublicUrl()
    {
        return $this->_public_url;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->_size = $size;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param string $source_key
     */
    public function setSourceKey($source_key)
    {
        $this->_source_key = $source_key;
    }

    /**
     * @return string
     */
    public function getSourceKey()
    {
        return $this->_source_key;
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
     * @param int $theme_id
     */
    public function setThemeId($theme_id)
    {
        $this->_theme_id = $theme_id;
    }

    /**
     * @return int
     */
    public function getThemeId()
    {
        return $this->_theme_id;
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
     * @param string $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @var string
     */
    protected $_value;

}