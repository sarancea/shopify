<?php

namespace Shopify\Entity;

use Shopify\Exception;

class Theme extends EntityAbstract
{

    /**
     * @var array
     */
    protected $_options = [
        'fields' => null,
    ];

    /**
     * Returns list of a shop's themes.
     *
     * @return \Shopify\Resource\Theme[]
     * @throws \Shopify\Exception
     */
    public function getThemes()
    {
        $response = $this->_request('/admin/themes.json', $this->getOptions());

        return $this->_parseMultipleObjects($response, 'themes', '\Shopify\Resource\Theme');
    }

    /**
     * Return a single theme
     *
     * @param int $themeId
     * @return \Shopify\Resource\Theme
     * @throws \Shopify\Exception
     */
    public function getTheme($themeId)
    {
        $response = $this->_request('/admin/themes/' . $themeId . '.json', $this->getOptions());

        return $this->_parseSingleObject($response, 'theme', '\Shopify\Resource\Theme');
    }

    /**
     * Create a new theme
     *
     * @param \Shopify\Resource\Theme $theme
     * @return \Shopify\Resource\Theme
     * @throws \Shopify\Exception
     */
    public function createTheme(\Shopify\Resource\Theme $theme)
    {
        $response = $this->_request('/admin/themes.json', ['theme' => $theme->toArray()], EntityAbstract::METH_POST);

        return $this->_parseSingleObject($response, 'theme', '\Shopify\Resource\Theme');
    }

    /**
     * Update existing theme
     *
     * @param \Shopify\Resource\Theme $theme
     * @return \Shopify\Resource\Theme
     * @throws \Shopify\Exception
     */
    public function updateTheme(\Shopify\Resource\Theme $theme)
    {

        //Check for ID
        if ((int)$theme->getId() <= 0) {
            throw new Exception('Theme should have ID.');
        }

        $response = $this->_request('/admin/themes/' . $theme->getId() . '.json', ['theme' => $theme->toArray()], EntityAbstract::METH_PUT);

        return $this->_parseSingleObject($response, 'theme', '\Shopify\Resource\Theme');
    }

    /**
     * Delete existing theme
     * @param int $themeId
     * @return \Shopify\Resource\Theme
     * @throws \Shopify\Exception
     */
    public function deleteTheme($themeId)
    {
        $themeData = $this->_request('/admin/themes/' . $themeId . '.json', [], EntityAbstract::METH_DELETE);


        $themeObject = new \Shopify\Resource\Theme();
        $themeObject->fillObjectFromArray($themeData);

        return $themeObject;
    }
}