<?php
namespace Shopify;

use Phalcon\Http\Client\Provider\Curl;

class Application
{
    // Content read/write scope
    const SHOPIFY_API_SCOPE_READ_CONTENT = 'read_content';
    const SHOPIFY_API_SCOPE_WRITE_CONTENT = 'write_content';

    //Themes read/write scope
    const SHOPIFY_API_SCOPE_READ_THEMES = 'read_themes';
    const SHOPIFY_API_SCOPE_WRITE_THEMES = 'write_themes';

    //Products read/write scope
    const SHOPIFY_API_SCOPE_READ_PRODUCTS = 'read_products';
    const SHOPIFY_API_SCOPE_WRITE_PRODUCTS = 'write_products';

    //Customers read/write scope
    const SHOPIFY_API_SCOPE_READ_CUSTOMERS = 'read_customers';
    const SHOPIFY_API_SCOPE_WRITE_CUSTOMERS = 'write_customers';

    //Orders read/write scope
    const SHOPIFY_API_SCOPE_READ_ORDERS = 'read_orders';
    const SHOPIFY_API_SCOPE_WRITE_ORDERS = 'write_orders';

    //ScriptTags read/write scope
    const SHOPIFY_API_SCOPE_READ_SCRIPT_TAGS = 'read_script_tags';
    const SHOPIFY_API_SCOPE_WRITE_SCRIPT_TAGS = 'write_script_tags';

    //Customers read/write scope
    const SHOPIFY_API_SCOPE_READ_FULFILLMENTS = 'read_fulfillments';
    const SHOPIFY_API_SCOPE_WRITE_FULFILLMENTS = 'write_fulfillments';

    //Shipping read/write scope
    const SHOPIFY_API_SCOPE_READ_SHIPPING = 'read_shipping';
    const SHOPIFY_API_SCOPE_WRITE_SHIPPING = 'write_shipping';


    /**
     * List of scopes
     * @var array
     */
    protected $_scope;

    /**
     * @var string
     */
    protected $_baseUri;

    /**
     * Application ID
     * @var string
     */
    protected $_clientId;

    /**
     * @var string
     */
    protected $_redirectUri;

    /**
     * Application secret
     *
     * @var string
     */
    protected static $_clientSecret;

    /**
     * The access token
     * @var string
     */
    protected $_accessToken;


    /**
     * Set up application base uri
     *
     * @param string $baseUri
     * @return $this
     */
    public function setBaseUri($baseUri)
    {
        $this->_baseUri = $baseUri;
        return $this;
    }


    /**
     * Returns shop base uri
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->_baseUri;
    }


    /**
     * Returns the list of scopes
     * @return array
     */
    public function getScope()
    {
        return $this->_scope;
    }

    /**
     * Set the list of scopes for application
     *
     * @param array $scopesList
     * @return Application
     */
    public function setScope(array $scopesList)
    {
        $this->_scope = $scopesList;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->_clientId;
    }

    /**
     * @param string $clientId
     * @return Application
     */
    public function setClientId($clientId)
    {
        $this->_clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return self::$_clientSecret;
    }

    /**
     * @param string $clientSecret
     * @return Application
     */
    public function setClientSecret($clientSecret)
    {
        self::$_clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->_redirectUri;
    }

    /**
     * @param string $redirectUri
     * @return Application
     */
    public function setRedirectUri($redirectUri)
    {
        $this->_redirectUri = $redirectUri;
        return $this;
    }

    /**
     * Verify is request params are valid
     *
     * @param array $queryParams
     * @return bool
     * @throws Exception
     */
    public static function validateRequest(array $queryParams)
    {
        /** Check for signature */
        if (!isset($queryParams['signature'])) {
            throw new Exception('Query params should contain signature.');
        }

        $signature = $queryParams['signature'];
        $calculatedSignature = self::$_clientSecret;

        //# Remove the "signature" entry, we don't need it.
        unset($queryParams['signature']);

        //# Sort the key/value pairs in the array
        ksort($queryParams);

        //# Join the array elements into a string
        array_walk($queryParams, function ($v, $k) use (&$calculatedSignature) {
            $calculatedSignature .= $k . "=" . $v;
        });

        $calculatedSignature = md5($calculatedSignature);

        //This calculated signature should match the one in the original URL.
        return ($signature == $calculatedSignature);
    }

    /**
     * Return Access Token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->_accessToken;
    }

    /**
     * Set application ACCESS TOKEN for API
     * @param string $accessToken
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->_accessToken = $accessToken;
        return $this;
    }

    /**
     * Generates authorization url
     * @return string
     */
    public function generateAuthorizationUrl()
    {
        $authorizationUrl = $this->getBaseUri() . "/admin/oauth/authorize?client_id={$this->getClientId()}&scope="
            . urlencode(implode(',', $this->getScope()));
        if ($this->_redirectUri != '') {
            $authorizationUrl .= "&redirect_uri=" . urlencode($this->getRedirectUri());
        }
        return $authorizationUrl;
    }

    /**
     * Fetches authentication token based on authorization code
     * @param string $authorizationCode
     * @return string
     * @throws Exception
     */
    public function fetchAccessToken($authorizationCode)
    {
        $client = new Curl();
        $client->setBaseUri($this->getBaseUri());
        $response = $client->post("/admin/oauth/access_token", [
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'code' => $authorizationCode,
        ]);

        //Check if response is ok
        if ($response->header->statusCode < 200 || $response->header->statusCode > 300) {
            throw new Exception($response->header->statusMessage, $response->header->statusCode);
        }

        $responseObject = json_decode($response->body, true);
        //Validate response
        if (!isset($responseObject['access_token'])) {
            throw new Exception('Invalid response : ' . var_export($responseObject, true));
        }

        return $responseObject['access_token'];
    }

}