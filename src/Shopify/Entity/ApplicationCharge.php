<?php
namespace Shopify\Entity;

use Shopify\Exception;

/**
 * Class ApplicationCharge
 * @link http://docs.shopify.com/api/applicationcharge
 * @package Shopify\Entity
 */
class ApplicationCharge extends EntityAbstract
{

    /**
     * @var bool
     */
    protected $_isTest;

    /**
     * @var string
     */
    protected $_returnUrl;


    /**
     * Return test flag
     *
     * @return boolean
     */
    public function getIsTest()
    {
        return $this->_isTest;
    }

    /**
     * Setting this to TRUE will set the ApplicationCharge to not actually charge the credit card it otherwise would.
     *
     * @param boolean $isTest
     * @return $this
     */
    public function setIsTest($isTest)
    {
        $this->_isTest = $isTest;
        return $this;
    }

    /**
     * Return the URL is sent to once they accept/decline a charge.
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->_returnUrl;
    }

    /**
     * Set the URL the customer is sent to once they accept/decline a charge.
     *
     * @param string $returnUrl
     * @return $this
     */
    public function setReturnUrl($returnUrl)
    {
        $this->_returnUrl = $returnUrl;
        return $this;
    }


    /**
     * Create a new one-time application charge.
     *
     * @param float $price
     * @param string $name
     * @return \Shopify\Resource\ApplicationCharge
     * @throws \Shopify\Exception
     */
    public function createCharge($price, $name)
    {

        //Generate params for request
        $requestParams = [
            'application_charge' => [
                'name' => $name,
                'price' => number_format($price, 2, '.', ''),
                'return_url' => $this->getReturnUrl(),
            ]
        ];

        /** Set test flag */
        if ($this->getIsTest() == true) {
            $requestParams['application_charge']['test'] = true;
        }

        // Make an API call
        $response = $this->_request('/admin/application_charges.json', $requestParams, ApplicationCharge::METH_POST);

        //Check if response contains 'application_charge' object
        if (!isset($response['application_charge'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $applicationChargeData = $response['application_charge'];

        $applicationChargeObject = new \Shopify\Resource\ApplicationCharge();
        $applicationChargeObject->fillObjectFromArray($applicationChargeData);

        return $applicationChargeObject;
    }


    /**
     * Retrieve one-time application charge
     *
     * @param int $chargeId
     * @return \Shopify\Resource\ApplicationCharge
     * @throws \Shopify\Exception
     */
    public function getCharge($chargeId)
    {
        // Make an API call
        $response = $this->_request('/admin/application_charges/' . $chargeId . '.json');

        //Check if response contains 'application_charge' object
        if (!isset($response['application_charge'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $applicationChargeData = $response['application_charge'];

        $applicationChargeObject = new \Shopify\Resource\ApplicationCharge();
        $applicationChargeObject->fillObjectFromArray($applicationChargeData);

        return $applicationChargeObject;
    }


    /**
     * All charges that have been requested are retrieved by this request.
     *
     * @param int|null $sinceId Restrict results to after the specified ID
     * @param string|null $fields comma-separated list of fields to include in the response
     * @throws \Shopify\Exception
     * @return \Shopify\Resource\ApplicationCharge[]
     */
    public function getChargesList($sinceId = null, $fields = null)
    {
        //Prepare request params
        $requestParams = [
        ];

        if (!is_null($sinceId)) {
            $requestParams['since_id'] = $sinceId;
        }

        if (!is_null($fields)) {
            $requestParams['fields'] = $fields;
        }

        // Make an API call
        $response = $this->_request('/admin/application_charges.json', $requestParams);

        //Check if response contains 'application_charge' object
        if (!isset($response['application_charge'])) {
            throw new Exception('Response is not valid. Response dump: ' . var_export($response, true));
        }

        $applicationChargeList = $response['application_charge'];

        $applicationChargeObjectsList = [];

        //Parse all application charges
        foreach ($applicationChargeList as $applicationChargeData) {
            $applicationChargeObject = new \Shopify\Resource\ApplicationCharge();
            $applicationChargeObject->fillObjectFromArray($applicationChargeData);
            $applicationChargeObjectsList[] = $applicationChargeObject;
        }

        return $applicationChargeObjectsList;
    }


    /**
     * Activate a previously accepted one-time application charge.
     *
     * @param \Shopify\Resource\ApplicationCharge $charge
     * @return void
     */
    public function activateCharge(\Shopify\Resource\ApplicationCharge $charge)
    {
        $this->_request('/admin/application_charges/' . $charge->getId() . '/activate.json',
            ['application_charge' => $charge->toArray()], EntityAbstract::METH_POST);
    }
}