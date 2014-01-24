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

        if (!isset($response['themes'])) {
            throw new Exception('Response is not valid. Response :' . var_export($response, true));
        }

        $themesList = $response['themes'];
        $themesObjectsList = [];

        foreach ($themesList as $themeData) {
            $themeObject = new \Shopify\Resource\Theme();
            $themeObject->fillObjectFromArray($themeData);
            $themesObjectsList[] = $themeObject;
        }

        return $themesObjectsList;
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

        if (!isset($response['theme'])) {
            throw new Exception('Response is not valid. Response :' . var_export($response, true));
        }

        $themeData = $response['theme'];
        $themeObject = new \Shopify\Resource\Theme();
        $themeObject->fillObjectFromArray($themeData);

        return $themeObject;
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
        $response = $this->_request('/admin/themes.json', $theme->toArray(), EntityAbstract::METH_POST);

        if (!isset($response['theme'])) {
            throw new Exception('Response is not valid. Response :' . var_export($response, true));
        }

        $themeData = $response['theme'];
        $themeObject = new \Shopify\Resource\Theme();
        $themeObject->fillObjectFromArray($themeData);

        return $themeObject;
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

        $response = $this->_request('/admin/themes/' . $theme->getId() . '.json', $theme->toArray(), EntityAbstract::METH_PUT);

        if (!isset($response['theme'])) {
            throw new Exception('Response is not valid. Response :' . var_export($response, true));
        }

        $themeData = $response['theme'];
        $themeObject = new \Shopify\Resource\Theme();
        $themeObject->fillObjectFromArray($themeData);

        return $themeObject;
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