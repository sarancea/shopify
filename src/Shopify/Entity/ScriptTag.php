<?php
namespace Shopify\Entity;


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
     *
     * @return \Shopify\Resource\ScriptTag[]
     */
    public function getScriptTags()
    {
        $response = $this->_request('/admin/metafields.json', $this->getOptions());
        return $this->_parseMultipleObjects($response, 'script_tags', '\Shopify\Resource\ScriptTag');
    }
}