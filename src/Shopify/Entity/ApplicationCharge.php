<?php
namespace Shopify\Entity;

/**
 * Class ApplicationCharge
 * @link http://docs.shopify.com/api/applicationcharge
 * @package Shopify\Entity
 */
class ApplicationCharge extends EntityAbstract
{


    /**
     * Options list
     * @var array
     */
    protected $_options = [
        'since_id' => null,
        'fields' => null,
    ];

    /**
     * Create a new one-time application charge.
     *
     * @param \Shopify\Resource\ApplicationCharge $applicationCharge
     * @return \Shopify\Resource\ApplicationCharge
     */
    public function createCharge(\Shopify\Resource\ApplicationCharge $applicationCharge)
    {

        // Make an API call
        $response = $this->_request('/admin/application_charges.json', ['application_charge' => $applicationCharge->toArray()], ApplicationCharge::METH_POST);

        return $this->_parseSingleObject($response, 'application_charge', '\Shopify\Resource\ApplicationCharge');
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

        return $this->_parseSingleObject($response, 'application_charge', '\Shopify\Resource\ApplicationCharge');
    }


    /**
     * All charges that have been requested are retrieved by this request.
     *
     * @throws \Shopify\Exception
     * @return \Shopify\Resource\ApplicationCharge[]
     */
    public function getChargesList()
    {

        // Make an API call
        $response = $this->_request('/admin/application_charges.json', $this->getOptions());

        return $this->_parseMultipleObjects($response, 'application_charges', '\Shopify\Resource\ApplicationCharge');
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