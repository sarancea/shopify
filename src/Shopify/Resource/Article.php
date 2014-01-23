<?php
namespace Shopify\Resource;

class Article extends ResourceAbstract
{
    /**
     * @var int
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_author;
    /**
     * @var int
     */
    protected $_blog_id;
    /**
     * @var string
     */
    protected $_body_html;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var bool
     */
    protected $_published;
    /**
     * @var string
     */
    protected $_published_at;
    /**
     * @var string
     */
    protected $_summary_html;
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
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @param int $blog_id
     */
    public function setBlogId($blog_id)
    {
        $this->_blog_id = $blog_id;
    }

    /**
     * @return int
     */
    public function getBlogId()
    {
        return $this->_blog_id;
    }

    /**
     * @param string $body_html
     */
    public function setBodyHtml($body_html)
    {
        $this->_body_html = $body_html;
    }

    /**
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->_body_html;
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
     * @param boolean $published
     */
    public function setPublished($published)
    {
        $this->_published = $published;
    }

    /**
     * @return boolean
     */
    public function getPublished()
    {
        return $this->_published;
    }

    /**
     * @param string $published_at
     */
    public function setPublishedAt($published_at)
    {
        $this->_published_at = $published_at;
    }

    /**
     * @return string
     */
    public function getPublishedAt()
    {
        return $this->_published_at;
    }

    /**
     * @param string $summary_html
     */
    public function setSummaryHtml($summary_html)
    {
        $this->_summary_html = $summary_html;
    }

    /**
     * @return string
     */
    public function getSummaryHtml()
    {
        return $this->_summary_html;
    }

    /**
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->_tags = $tags;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->_tags;
    }

    /**
     * @param string $template_suffix
     */
    public function setTemplateSuffix($template_suffix)
    {
        $this->_template_suffix = $template_suffix;
    }

    /**
     * @return string
     */
    public function getTemplateSuffix()
    {
        return $this->_template_suffix;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
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
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->_user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->_user_id;
    }

    /**
     * @var int
     */
    protected $_user_id;
}