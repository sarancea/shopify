<?php

namespace Shopify\Entity;

use Shopify\Exception;

class WebHook extends EntityAbstract
{
    protected $_options = [
        'address' => null,
        'created_at_max' => null,
        'created_at_min' => null,
        'updated_at_max' => null,
        'updated_at_min' => null,
        'fields' => null,
        'limit' => null,
        'page' => null,
        'since_id' => null,
        'topic' => null,
    ];

    /**
     * Verifies if call was done
     * @param string $data
     * @param string $hmacHeader
     * @param string $appSecret
     * @return bool
     */
    public static function verify($data, $hmacHeader, $appSecret)
    {
        $calculatedHmac = base64_encode(hash_hmac('sha256', $data, $appSecret, true));
        return $calculatedHmac == $hmacHeader;
    }

    /**
     * Get a list of all webhooks for your shop.
     * @return \Shopify\Resource\WebHook[]
     */
    public function getWebHooks()
    {
        $response = $this->_request('/admin/webhooks.json', $this->getOptions());
        return $this->_parseMultipleObjects($response, 'webhooks', '\Shopify\Resource\WebHook');
    }

    /**
     * Count all of the webhooks for your shop.
     *
     * @return int
     * @throws \Shopify\Exception
     */
    public function getWebHooksCount()
    {
        $response = $this->_request('/admin/webhooks/count.json', $this->getOptions());
        if (!isset($response['count'])) {
            throw new Exception('Invalid response format. Response: ' . var_export($response, true));
        }

        return intval($response['count']);
    }

    /**
     * Get a single webhook by its id.
     *
     * @param $webHookId
     * @return \Shopify\Resource\WebHook
     */
    public function getWebHook($webHookId)
    {
        $response = $this->_request('/admin/webhooks/' . $webHookId . '.json', $this->getOptions());

        return $this->_parseSingleObject($response, 'webhook', '\Shopify\Resource\WebHook');
    }

    /**
     * Create WebHooks
     *
     * @param \Shopify\Resource\WebHook $webHook
     * @return \Shopify\Resource\ResourceAbstract
     */
    public function createWebHook(\Shopify\Resource\WebHook $webHook)
    {
        $response = $this->_request('/admin/webhooks.json', ['webhook' => $webHook->toArray()], EntityAbstract::METH_POST);

        return $this->_parseSingleObject($response, 'webhook', '\Shopify\Resource\WebHook');
    }

    /**
     * Update existing webhook
     *
     * @param \Shopify\Resource\WebHook $webHook
     * @return \Shopify\Resource\ResourceAbstract
     * @throws \Shopify\Exception
     */
    public function updateWebHook(\Shopify\Resource\WebHook $webHook)
    {
        if (intval($webHook->getId()) <= 0) {
            throw new Exception('ID expected to be more than 0.');
        }

        $response = $this->_request('/admin/webhooks/' . $webHook->getId() . '.json',
            ['webhook' => $webHook->toArray()], EntityAbstract::METH_POST);

        return $this->_parseSingleObject($response, 'webhook', '\Shopify\Resource\WebHook');
    }

    /**
     * Remove an existing webhook from a shop
     * @param int $webhookId
     */
    public function deleteWebHook($webhookId)
    {
        $this->_request('/admin/webhooks/' . $webhookId . '.json', [], EntityAbstract::METH_DELETE);
    }
}