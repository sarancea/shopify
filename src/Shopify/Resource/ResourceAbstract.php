<?php
namespace Shopify\Resource;

/**
 * Abstract Class ResourceAbstract
 * @package Shopify\Resource
 */
abstract class ResourceAbstract
{
    /**
     * Fills object with data from array
     *
     * @param array $data
     * @return void
     */
    public function fillObjectFromArray(array $data)
    {
        foreach ($data as $k => $v) {
            $propertyName = '_' . $k;
            if (property_exists($this, $propertyName)) {
                $this->{$propertyName} = $v;
            }
        }
    }

    /**
     * Converts object to assoc array
     * @return array
     */
    public function toArray()
    {
        $propertiesList = get_object_vars($this);
        $returnPropertiesList = [];

        //Change key name of property
        foreach ($propertiesList as $k => $v) {
            if (!is_null($v))
                $returnPropertiesList[preg_replace('/^\_/i', '', $k, 1)] = $v;
        }

        return $returnPropertiesList;
    }
}