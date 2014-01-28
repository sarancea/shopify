<?php
namespace Shopify\Entity;

class Asset extends EntityAbstract
{
    /**
     * @var array
     */
    protected $_options = ['fields' => null, 'theme_id' => null, 'asset[key]' => null,];


    /**
     * Listing theme assets only returns metadata about each asset.
     * You need to request assets individually in order to get their contents.
     *
     * @param int $themeId
     * @return \Shopify\Resource\Asset[]
     * @throws \Shopify\Exception
     */
    public function getAssets($themeId)
    {
        // Make an API call
        $response = $this->_request('/admin/themes/' . $themeId . '/assets.json', $this->getOptions());

        return $this->_parseMultipleObjects($response, 'assets', '\Shopify\Resource\Asset');
    }

    /**
     * Receive a single asset
     * @param int $themeId
     * @param string $assetKey
     * @return \Shopify\Resource\Asset
     * @throws \Shopify\Exception
     */
    public function getAsset($themeId, $assetKey)
    {

        // Make an API call
        $response = $this->_request('/admin/themes/' . $themeId . '/assets.json',
            array_merge(['asset[key]' => $assetKey, 'theme_id' => $themeId], $this->getOptions())
        );

        $this->_parseSingleObject($response, 'asset', '\Shopify\Resource\Asset');
    }

    /**
     * This method takes care of both creating new assets and updating existing ones
     *
     * @param int $themeId
     * @param \Shopify\Resource\Asset $asset
     * @return \Shopify\Resource\Asset
     * @throws \Shopify\Exception
     */
    public function putAsset($themeId, \Shopify\Resource\Asset $asset)
    {
        // Make an API call
        $response = $this->_request(
            '/admin/themes/' . $themeId . '/assets.json',
            ['asset' => $asset->toArray()],
            EntityAbstract::METH_PUT
        );

        $this->_parseSingleObject($response, 'asset', '\Shopify\Resource\Asset');

    }

    /**
     * Remove assets from your shop
     *
     * @param int $themeId
     * @param string $assetKey
     */
    public function deleteAsset($themeId, $assetKey)
    {
        $this->_request(
            '/admin/themes/' . $themeId . '/assets.json?asset[key]=' . rawurlencode($assetKey),
            [],
            EntityAbstract::METH_DELETE
        );
    }
}