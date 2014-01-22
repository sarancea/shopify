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

        //Change key name of property
        foreach ($propertiesList as &$k => $v) {
            $k = preg_replace('/^\_/i', '', $k, 1);
        }

        return $propertiesList;
    }
}