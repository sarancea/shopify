<?php
namespace Shopify\Entity;


use Shopify\Exception;

class ScriptTag extends EntityAbstract
{
    /**
     * @var array
     */
    protected $_options = [
        'limit' => null,
        'page' => null,
        'since_id' => null,
        'created_at_min' => null,
        'created_at_max' => null,
        'updated_at_min' => null,
        'updated_at_max' => null,
        'src' => null,
        'fields' => null,
    ];

    /**
     * Get a list of all script tags
     *
     * @return \Shopify\Resource\ScriptTag[]
     */
    public function getScriptTags()
    {
        $response = $this->_request('/admin/script_tags.json', $this->getOptions());
        return $this->_parseMultipleObjects($response, 'script_tags', '\Shopify\Resource\ScriptTag');
    }

    /**
     * Count script tags with given URL
     *
     * @return int
     * @throws \Shopify\Exception
     */
    public function getScriptTagsCount()
    {
        $response = $this->_request('/admin/script_tags/count.json', $this->getOptions());
        if (!isset($response['count'])) {
            throw new Exception('Response is not valid. Response : ' . var_export($response, true));
        }

        return intval($response['count']);
    }

    /**
     * Get a single script tags by its ID.
     *
     * @param int $scriptTagId
     * @return \Shopify\Resource\ScriptTag
     */
    public function getScriptTag($scriptTagId)
    {
        $response = $this->_request('/admin/script_tags/' . $scriptTagId . '.json', $this->getOptions());
        return $this->_parseSingleObject($response, 'script_tag', '\Shopify\Resource\ScriptTag');
    }

    /**
     * Create a new script tag
     *
     * @param \Shopify\Resource\ScriptTag $scriptTag
     * @return \Shopify\Resource\ScriptTag
     */
    public function createScriptTag(\Shopify\Resource\ScriptTag $scriptTag)
    {
        $response = $this->_request('/admin/script_tags.json', ['script_tag' => $scriptTag->toArray()], EntityAbstract::METH_POST);
        return $this->_parseSingleObject($response, 'script_tag', '\Shopify\Resource\ScriptTag');
    }

    /**
     * Update a script tag
     *
     * @param \Shopify\Resource\ScriptTag $scriptTag
     * @return \Shopify\Resource\ResourceAbstract
     * @throws \Shopify\Exception
     */
    public function updateScriptTag(\Shopify\Resource\ScriptTag $scriptTag)
    {
        if (intval(($scriptTag->getId())) <= 0) {
            throw new Exception('Script Tag resource should have an ID.');
        }

        $response = $this->_request('/admin/script_tags/' . $scriptTag->getId() . '.json',
            ['script_tag' => $scriptTag->toArray()], EntityAbstract::METH_PUT);
        return $this->_parseSingleObject($response, 'script_tag', '\Shopify\Resource\ScriptTag');
    }

    /**
     * Remove an existing script tag from a shop
     *
     * @param int $scriptTagId
     * @return void
     */
    public function deleteScriptTag($scriptTagId)
    {
        $this->_request('/admin/script_tags/' . $scriptTagId . '.json', [], EntityAbstract::METH_DELETE);
    }

}