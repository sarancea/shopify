<?php

namespace Shopify\Entity;

use Phalcon\Http\Client\Provider\Curl;
use Phalcon\Http\Response;
use Phalcon\Http\ResponseInterface;
use Shopify\Application;
use Shopify\Exception;
use Shopify\Resource\ResourceAbstract;

/**
 * Abstract entity class
 * @package Shopify\Entity
 */
abstract class EntityAbstract
{

    /**
     * Options list
     * @var array
     */
    protected $_options = [];

    /**
     * @var Application
     */
    protected $_application;

    //Request method constants
    const METH_GET = 1;
    const METH_POST = 2;
    const METH_DELETE = 3;
    const METH_PUT = 4;
    const METH_HEAD = 5;

    /**
     * @var array
     */
    private $_requestOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 3,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_USERAGENT => 'Shopify Phalcon Library',
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT => 30,
    ];

    /**
     * @var Curl
     */
    protected $_curlClient;

    /**
     * @var \Phalcon\Http\Client\Response
     */
    protected $lastResponse;

    /**
     * @var array
     */
    protected $lastRequest;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->_curlClient = new Curl();
    }

    /**
     * @return \Phalcon\Http\Client\Response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @param \Phalcon\Http\Client\Response $lastResponse
     */
    public function setLastResponse($lastResponse)
    {
        $this->lastResponse = $lastResponse;
    }

    /**
     * @return array
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    /**
     * @param array $lastRequest
     */
    public function setLastRequest($lastRequest)
    {
        $this->lastRequest = $lastRequest;
    }


    /**
     * Returns method name by it's id
     *
     * @param int $methodId
     * @return null|string
     */
    public static function methodName($methodId)
    {
        $methodName = null;
        switch ($methodId) {
            case EntityAbstract::METH_POST:
                $methodName = 'POST';
                break;
            case EntityAbstract::METH_GET:
                $methodName = 'GET';
                break;
            case EntityAbstract::METH_HEAD:
                $methodName = 'HEAD';
                break;
            case EntityAbstract::METH_PUT:
                $methodName = 'PUT';
                break;
            case EntityAbstract::METH_DELETE:
                $methodName = 'DELETE';
                break;

        }
        return $methodName;
    }

    /**
     * @return \Phalcon\Http\Client\Provider\Curl
     */
    public function getCurlClient()
    {
        return $this->_curlClient;
    }


    /**
     * @return \Shopify\Application
     */
    public function getApplication()
    {
        return $this->_application;
    }

    /**
     * Set Shopify application for entity
     * @param \Shopify\Application $application
     * @return $this
     */
    public function setApplication($application)
    {
        $this->_application = $application;
        return $this;
    }

    /**
     * Set CURL client for requests
     *
     * @param \Phalcon\Http\Client\Provider\Curl $curlClient
     * @return $this
     */
    public function setCurlClient($curlClient)
    {
        $this->_curlClient = $curlClient;
        return $this;
    }

    /**
     * General method to validate if all needed info present to make a call to api
     */
    protected function validateBeforeRequest()
    {
        //Check if application object is assigned to entity
        if (!isset($this->_application)) {
            throw new Exception('Application should be initiated and assigned to entity.');
        }

        //Check if application has an access token
        if (!$this->getApplication()->getAccessToken()) {
            throw new Exception('Application has no access token.');
        }

        //Check for application base uri
        if (!$this->getApplication()->getBaseUri()) {
            throw new Exception('Base Uri required before request.');
        }

        //Check for curl client
        if (!isset($this->_curlClient)) {
            throw new Exception('CURL client is required to make requests.');
        }
    }

    /**
     * Returns the list of options
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * Returns option value by it's name
     * @param string $name
     * @return bool
     */
    public function getOptionByName($name)
    {
        if (array_key_exists($name, $this->_options)) {
            return $this->_options[$name];
        }
        return false;
    }

    /**
     * Set the list of options
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        foreach ($options as $optionKey => $optionValue) {
            if (array_key_exists($optionKey, $this->_options)) {
                $this->_options[$optionKey] = $optionValue;
            }
        }

        return $this;
    }


    /**
     * @param string $response
     * @param string $name
     * @param string $objectName
     * @return ResourceAbstract
     * @throws \Shopify\Exception
     */
    protected function _parseSingleObject($response, $name, $objectName)
    {
        if (!isset($response[$name])) {
            throw new Exception('Response is not valid. Response: ' . var_export($response, true));
        }

        $data = $response[$name];
        /** @var ResourceAbstract $object */
        $object = new $objectName();
        $object->fillObjectFromArray($data);

        return $object;
    }

    /**
     *
     * @param string $response
     * @param string $name
     * @param string $objectName
     * @return ResourceAbstract[]
     * @throws \Shopify\Exception
     */
    protected function _parseMultipleObjects($response, $name, $objectName)
    {
        if (!isset($response[$name])) {
            throw new Exception('Response is not valid. Response :' . var_export($response, true));
        }

        $dataList = $response[$name];
        $objectsList = [];

        foreach ($dataList as $data) {
            /** @var ResourceAbstract $object */
            $object = new $objectName();
            $object->fillObjectFromArray($data);

            $objectsList[] = $object;
        }

        return $objectsList;
    }

    /**
     * Make a request to Shopify API
     *
     * @param string $uri
     * @param array $params
     * @param int $method
     * @param array $extraHeaders
     * @return mixed
     * @throws \Shopify\Exception
     */
    protected function _request($uri = '/', array $params = [], $method = EntityAbstract::METH_GET, array $extraHeaders = [])
    {
        //Check needed data before request
        $this->validateBeforeRequest();


        //Adding Access-Token header
        $extraHeaders['X-Shopify-Access-Token'] = $this->getApplication()->getAccessToken();

        //Set BaseUri to CURL client
        $this->getCurlClient()->setBaseUri($this->getApplication()->getBaseUri());

        //Set headers
        $this->getCurlClient()->header->setMultiple($extraHeaders);


        //Set customer request method
        $this->_requestOptions[CURLOPT_CUSTOMREQUEST] = EntityAbstract::methodName($method);

        //Prepare params for request
        if ($method != EntityAbstract::METH_GET && !empty($params)) {
            $params = json_encode($params);
            $this->_requestOptions[CURLOPT_POSTFIELDS] = $params;
        } elseif ($method == EntityAbstract::METH_GET && !empty($params)) {
            //Set initial query separator
            if (stristr($uri, '?'))
                $uri .= '&';
            else
                $uri .= '?';

            //Unset params with null value
            array_walk($params, function ($k, $v) use (&$params) {
                if (is_null($v)) {
                    unset($params[$k]);
                }
            });

            //Build query string from params
            $uri .= http_build_query($params, '', '&');
        }

        //Set the options
        $this->getCurlClient()->setOptions($this->_requestOptions);


        //Make request
        switch ($method) {
            case EntityAbstract::METH_GET:
                $response = $this->getCurlClient()->get($uri, $params);
                break;
            case EntityAbstract::METH_DELETE:
                $response = $this->getCurlClient()->delete($uri, $params);
                break;
            case EntityAbstract::METH_PUT:
                $response = $this->getCurlClient()->put($uri, $params);
                break;
            case EntityAbstract::METH_POST:
                $response = $this->getCurlClient()->post($uri, $params);
                break;
            default:
                throw new Exception('Unknown request method');
                break;
        }

        $this->setLastRequest(['uri' => $uri, 'params' => $params, 'method' => $method]);
        $this->setLastResponse($response);

        //Check if response is ok
        if ($response->header->statusCode < 200 || $response->header->statusCode > 300) {
            throw new Exception($response->header->statusMessage, $response->header->statusCode);
        }

        $responseObject = json_decode($response->body, true);

        //check for json errors
        if (isset($responseObject['errors'])) {
            throw new Exception(implode(',', $responseObject['errors']));
        }

        return $responseObject;
    }

}