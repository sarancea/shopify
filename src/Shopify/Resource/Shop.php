<?php
namespace Shopify\Resource;

class Shop extends ResourceAbstract
{
    /**
     * @var int
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_address1;
    /**
     * @var string
     */
    protected $_city;
    /**
     * @var string
     */
    protected $_country;
    /**
     * @var string
     */
    protected $_country_code;
    /**
     * @var string
     */
    protected $_country_name;
    /**
     * @var string
     */
    protected $_created_at;
    /**
     * @var string
     */
    protected $_customer_email;
    /**
     * @var string
     */
    protected $_currency;
    /**
     * @var string
     */
    protected $_domain;
    /**
     * @var string
     */
    protected $_email;
    /**
     * @var string
     */
    protected $_google_apps_domain;
    /**
     * @var string
     */
    protected $_google_appsLogin_enabled;
    /**
     * @var string
     */
    protected $_latitude;
    /**
     * @var string
     */
    protected $_longitude;
    /**
     * @var string
     */
    protected $_money_format;
    /**
     * @var string
     */
    protected $_money_with_currency_format;
    /**
     * @var string
     */
    protected $_myshopify_domain;
    /**
     * @var string
     */
    protected $_name;
    /**
     * @var string
     */
    protected $_plan_name;
    /**
     * @var string
     */
    protected $_display_plan_name;
    /**
     * @var string
     */
    protected $_phone;
    /**
     * @var string
     */
    protected $_province;
    /**
     * @var string
     */
    protected $_province_code;
    /**
     * @var bool
     */
    protected $_public;
    /**
     * @var string
     */
    protected $_shop_owner;
    /**
     * @var string
     */
    protected $_source;
    /**
     * @var bool
     */
    protected $_tax_shipping;
    /**
     * @var bool
     */
    protected $_taxes_included;
    /**
     * @var string
     */
    protected $_country_taxes;
    /**
     * @var string
     */
    protected $_timezone;

    /**
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->_address1 = $address1;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->_address1;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->_country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @param string $country_code
     */
    public function setCountryCode($country_code)
    {
        $this->_country_code = $country_code;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->_country_code;
    }

    /**
     * @param string $country_name
     */
    public function setCountryName($country_name)
    {
        $this->_country_name = $country_name;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->_country_name;
    }

    /**
     * @param string $country_taxes
     */
    public function setCountryTaxes($country_taxes)
    {
        $this->_country_taxes = $country_taxes;
    }

    /**
     * @return string
     */
    public function getCountryTaxes()
    {
        return $this->_country_taxes;
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
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->_currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->_currency;
    }

    /**
     * @param string $customer_email
     */
    public function setCustomerEmail($customer_email)
    {
        $this->_customer_email = $customer_email;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->_customer_email;
    }

    /**
     * @param string $display_plan_name
     */
    public function setDisplayPlanName($display_plan_name)
    {
        $this->_display_plan_name = $display_plan_name;
    }

    /**
     * @return string
     */
    public function getDisplayPlanName()
    {
        return $this->_display_plan_name;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->_domain = $domain;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->_domain;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $google_appsLogin_enabled
     */
    public function setGoogleAppsLoginEnabled($google_appsLogin_enabled)
    {
        $this->_google_appsLogin_enabled = $google_appsLogin_enabled;
    }

    /**
     * @return string
     */
    public function getGoogleAppsLoginEnabled()
    {
        return $this->_google_appsLogin_enabled;
    }

    /**
     * @param string $google_apps_domain
     */
    public function setGoogleAppsDomain($google_apps_domain)
    {
        $this->_google_apps_domain = $google_apps_domain;
    }

    /**
     * @return string
     */
    public function getGoogleAppsDomain()
    {
        return $this->_google_apps_domain;
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
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->_latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->_latitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->_longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->_longitude;
    }

    /**
     * @param string $money_format
     */
    public function setMoneyFormat($money_format)
    {
        $this->_money_format = $money_format;
    }

    /**
     * @return string
     */
    public function getMoneyFormat()
    {
        return $this->_money_format;
    }

    /**
     * @param string $money_with_currency_format
     */
    public function setMoneyWithCurrencyFormat($money_with_currency_format)
    {
        $this->_money_with_currency_format = $money_with_currency_format;
    }

    /**
     * @return string
     */
    public function getMoneyWithCurrencyFormat()
    {
        return $this->_money_with_currency_format;
    }

    /**
     * @param string $myshopify_domain
     */
    public function setMyshopifyDomain($myshopify_domain)
    {
        $this->_myshopify_domain = $myshopify_domain;
    }

    /**
     * @return string
     */
    public function getMyshopifyDomain()
    {
        return $this->_myshopify_domain;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param string $plan_name
     */
    public function setPlanName($plan_name)
    {
        $this->_plan_name = $plan_name;
    }

    /**
     * @return string
     */
    public function getPlanName()
    {
        return $this->_plan_name;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->_province = $province;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->_province;
    }

    /**
     * @param string $province_code
     */
    public function setProvinceCode($province_code)
    {
        $this->_province_code = $province_code;
    }

    /**
     * @return string
     */
    public function getProvinceCode()
    {
        return $this->_province_code;
    }

    /**
     * @param boolean $public
     */
    public function setPublic($public)
    {
        $this->_public = $public;
    }

    /**
     * @return boolean
     */
    public function getPublic()
    {
        return $this->_public;
    }

    /**
     * @param string $shop_owner
     */
    public function setShopOwner($shop_owner)
    {
        $this->_shop_owner = $shop_owner;
    }

    /**
     * @return string
     */
    public function getShopOwner()
    {
        return $this->_shop_owner;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->_source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->_source;
    }

    /**
     * @param boolean $tax_shipping
     */
    public function setTaxShipping($tax_shipping)
    {
        $this->_tax_shipping = $tax_shipping;
    }

    /**
     * @return boolean
     */
    public function getTaxShipping()
    {
        return $this->_tax_shipping;
    }

    /**
     * @param boolean $taxes_included
     */
    public function setTaxesIncluded($taxes_included)
    {
        $this->_taxes_included = $taxes_included;
    }

    /**
     * @return boolean
     */
    public function getTaxesIncluded()
    {
        return $this->_taxes_included;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->_timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->_timezone;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->_zip = $zip;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->_zip;
    }

    /**
     * @var string
     */
    protected $_zip;
}