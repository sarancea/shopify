<?php
namespace Shopify;

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
     * Application ID
     * @var string
     */
    protected $_clientId;

    /**
     * Application secret
     *
     * @var string
     */
    protected $_clientSecret;

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
        return $this->_clientSecret;
    }

    /**
     * @param string $clientSecret
     * @return Appliaction
     */
    public function setClientSecret($clientSecret)
    {
        $this->_clientSecret = $clientSecret;
        return $this;
    }
}