<?php
namespace Shopify\Authorization;

use Phalcon\Http\Client\Provider\Curl;
use Shopify\Application;
use Shopify\Entity\Shop;
use Shopify\Exception;

class OAuth
{

    /**
     * @var Application
     */
    protected $_application;

    /**
     * @return \Shopify\Application
     */
    public function getApplication()
    {
        return $this->_application;
    }

    /**
     * @param \Shopify\Application $application
     * @return OAuth
     */
    public function setApplication($application)
    {
        $this->_application = $application;
        return $this;
    }

    /**
     * Generates authorization url
     *
     * @param Shop $shop
     * @return string
     * @throws \Shopify\Exception
     */
    public function generateAuthorizationUrl(Shop $shop)
    {
        /** Check if application is already set */
        if (!isset($this->_application)) {
            throw new Exception('Application required.');
        }

        $clientId = $this->getApplication()->getClientId();
        $scope = implode(',', $this->getApplication()->getScope());

        //Check for required params
        if (!$clientId || empty($scope)) {
            throw new Exception('Client ID and Scope are required for authorization URL.');
        }

        $params = [
            'client_id' => $this->getApplication()->getClientId(),
            'scope' => implode(',', $this->getApplication()->getScope()),
        ];

        //Redirect_uri is optional param
        if ($this->getApplication()->getRedirectUri()) {
            $params['redirect_uri'] = $this->getApplication()->getRedirectUri();
        }

        //Build query
        $queryParams = http_build_query($params, '', '&');

        return 'https://' . $shop->getName() . '.myshopify.com/admin/oauth/authorize?' . $queryParams;
    }

    /**
     * Returns API access token
     *
     * @param Shop $shop
     * @param string $authorizationCode
     * @return string
     * @throws \Shopify\Exception
     */
    public function generateAccessToken(Shop $shop, $authorizationCode)
    {
        /** Check if application is already set */
        if (!isset($this->_application)) {
            throw new Exception('Application required.');
        }

        $clientId = $this->getApplication()->getClientId();
        $clientSecret = $this->getApplication()->getClientSecret();

        //Check required fields
        if (
            (!is_string($clientId) || empty($clientId)) ||
            (!is_string($clientSecret) || empty($clientSecret)) ||
            (!is_string($authorizationCode) || empty($authorizationCode))
        ) {
            throw new Exception('Client ID, Client Secret and Authorization Code are required for authentication.');
        }

        $httpClient = new Curl();
        $httpClient->setOptions('https://' . $shop->getName() . '.myshopify.com');
        $result = $httpClient->post('/admin/oauth/access_token', [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $authorizationCode,
        ]);

        //Check response code
        if ($result->header->statusCode != 200) {
            throw new Exception($result->header->statusMessage, $result->header->statusCode);
        }

        //Try to decode response
        $response = @json_decode($result->body);

        if (json_last_error() != JSON_ERROR_NONE) {
            throw new Exception('Response is not valid json. [' . $result->body . ']');
        }

        //Check if access token exists in response
        if (isset($response['access_token'])) {
            throw new Exception("Couldn't found access token in response [" . var_export($response, true) . "]");
        }

        return $response['access_token'];
    }
}