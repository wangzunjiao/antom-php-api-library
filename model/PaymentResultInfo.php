<?php

/**
 * Payment API
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Model;

use \ArrayAccess;
use Request\AlipayRequest;

/**
 * PaymentResultInfo Class Doc Comment
 *
 * @category Class
 * @package  request
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentResultInfo  implements ModelInterface, ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PaymentResultInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cardNo' => 'string',
        'cardBrand' => 'string',
        'cardToken' => 'string',
        'issuingCountry' => 'string',
        'funding' => 'string',
        'paymentMethodRegion' => 'string',
        'threeDSResult' => 'string',
        'avsResultRaw' => 'string',
        'cvvResultRaw' => 'string',
        'networkTransactionId' => 'string',
        'creditPayPlan' => 'string',
        'cardholderName' => 'string',
        'cardBin' => 'string',
        'lastFour' => 'string',
        'expiryMonth' => 'string',
        'expiryYear' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cardNo' => null,
        'cardBrand' => null,
        'cardToken' => null,
        'issuingCountry' => null,
        'funding' => null,
        'paymentMethodRegion' => null,
        'threeDSResult' => null,
        'avsResultRaw' => null,
        'cvvResultRaw' => null,
        'networkTransactionId' => null,
        'creditPayPlan' => null,
        'cardholderName' => null,
        'cardBin' => null,
        'lastFour' => null,
        'expiryMonth' => null,
        'expiryYear' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'cardNo' => false,
        'cardBrand' => false,
        'cardToken' => false,
        'issuingCountry' => false,
        'funding' => false,
        'paymentMethodRegion' => false,
        'threeDSResult' => false,
        'avsResultRaw' => false,
        'cvvResultRaw' => false,
        'networkTransactionId' => false,
        'creditPayPlan' => false,
        'cardholderName' => false,
        'cardBin' => false,
        'lastFour' => false,
        'expiryMonth' => false,
        'expiryYear' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'cardNo' => 'cardNo',
        'cardBrand' => 'cardBrand',
        'cardToken' => 'cardToken',
        'issuingCountry' => 'issuingCountry',
        'funding' => 'funding',
        'paymentMethodRegion' => 'paymentMethodRegion',
        'threeDSResult' => 'threeDSResult',
        'avsResultRaw' => 'avsResultRaw',
        'cvvResultRaw' => 'cvvResultRaw',
        'networkTransactionId' => 'networkTransactionId',
        'creditPayPlan' => 'creditPayPlan',
        'cardholderName' => 'cardholderName',
        'cardBin' => 'cardBin',
        'lastFour' => 'lastFour',
        'expiryMonth' => 'expiryMonth',
        'expiryYear' => 'expiryYear'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cardNo' => 'setCardNo',
        'cardBrand' => 'setCardBrand',
        'cardToken' => 'setCardToken',
        'issuingCountry' => 'setIssuingCountry',
        'funding' => 'setFunding',
        'paymentMethodRegion' => 'setPaymentMethodRegion',
        'threeDSResult' => 'setThreeDSResult',
        'avsResultRaw' => 'setAvsResultRaw',
        'cvvResultRaw' => 'setCvvResultRaw',
        'networkTransactionId' => 'setNetworkTransactionId',
        'creditPayPlan' => 'setCreditPayPlan',
        'cardholderName' => 'setCardholderName',
        'cardBin' => 'setCardBin',
        'lastFour' => 'setLastFour',
        'expiryMonth' => 'setExpiryMonth',
        'expiryYear' => 'setExpiryYear'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cardNo' => 'getCardNo',
        'cardBrand' => 'getCardBrand',
        'cardToken' => 'getCardToken',
        'issuingCountry' => 'getIssuingCountry',
        'funding' => 'getFunding',
        'paymentMethodRegion' => 'getPaymentMethodRegion',
        'threeDSResult' => 'getThreeDSResult',
        'avsResultRaw' => 'getAvsResultRaw',
        'cvvResultRaw' => 'getCvvResultRaw',
        'networkTransactionId' => 'getNetworkTransactionId',
        'creditPayPlan' => 'getCreditPayPlan',
        'cardholderName' => 'getCardholderName',
        'cardBin' => 'getCardBin',
        'lastFour' => 'getLastFour',
        'expiryMonth' => 'getExpiryMonth',
        'expiryYear' => 'getExpiryYear'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('cardNo', $data ?? [], null);
        $this->setIfExists('cardBrand', $data ?? [], null);
        $this->setIfExists('cardToken', $data ?? [], null);
        $this->setIfExists('issuingCountry', $data ?? [], null);
        $this->setIfExists('funding', $data ?? [], null);
        $this->setIfExists('paymentMethodRegion', $data ?? [], null);
        $this->setIfExists('threeDSResult', $data ?? [], null);
        $this->setIfExists('avsResultRaw', $data ?? [], null);
        $this->setIfExists('cvvResultRaw', $data ?? [], null);
        $this->setIfExists('networkTransactionId', $data ?? [], null);
        $this->setIfExists('creditPayPlan', $data ?? [], null);
        $this->setIfExists('cardholderName', $data ?? [], null);
        $this->setIfExists('cardBin', $data ?? [], null);
        $this->setIfExists('lastFour', $data ?? [], null);
        $this->setIfExists('expiryMonth', $data ?? [], null);
        $this->setIfExists('expiryYear', $data ?? [], null);

            }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['cardNo'] === null) {
            $invalidProperties[] = "'cardNo' can't be null";
        }
        if ($this->container['cardBrand'] === null) {
            $invalidProperties[] = "'cardBrand' can't be null";
        }
        if ($this->container['cardToken'] === null) {
            $invalidProperties[] = "'cardToken' can't be null";
        }
        if ($this->container['issuingCountry'] === null) {
            $invalidProperties[] = "'issuingCountry' can't be null";
        }
        if ($this->container['funding'] === null) {
            $invalidProperties[] = "'funding' can't be null";
        }
        if ($this->container['paymentMethodRegion'] === null) {
            $invalidProperties[] = "'paymentMethodRegion' can't be null";
        }
        if ($this->container['threeDSResult'] === null) {
            $invalidProperties[] = "'threeDSResult' can't be null";
        }
        if ($this->container['avsResultRaw'] === null) {
            $invalidProperties[] = "'avsResultRaw' can't be null";
        }
        if ($this->container['cvvResultRaw'] === null) {
            $invalidProperties[] = "'cvvResultRaw' can't be null";
        }
        if ($this->container['networkTransactionId'] === null) {
            $invalidProperties[] = "'networkTransactionId' can't be null";
        }
        if ($this->container['creditPayPlan'] === null) {
            $invalidProperties[] = "'creditPayPlan' can't be null";
        }
        if ($this->container['cardholderName'] === null) {
            $invalidProperties[] = "'cardholderName' can't be null";
        }
        if ($this->container['cardBin'] === null) {
            $invalidProperties[] = "'cardBin' can't be null";
        }
        if ($this->container['lastFour'] === null) {
            $invalidProperties[] = "'lastFour' can't be null";
        }
        if ($this->container['expiryMonth'] === null) {
            $invalidProperties[] = "'expiryMonth' can't be null";
        }
        if ($this->container['expiryYear'] === null) {
            $invalidProperties[] = "'expiryYear' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets cardNo
     *
     * @return string
     */
    public function getCardNo()
    {
        return $this->container['cardNo'];
    }

    /**
     * Sets cardNo
     *
     * @param string $cardNo cardNo
     *
     * @return self
     */
    public function setCardNo($cardNo)
    {
        $this->container['cardNo'] = $cardNo;

        return $this;
    }

    /**
     * Gets cardBrand
     *
     * @return string
     */
    public function getCardBrand()
    {
        return $this->container['cardBrand'];
    }

    /**
     * Sets cardBrand
     *
     * @param string $cardBrand cardBrand
     *
     * @return self
     */
    public function setCardBrand($cardBrand)
    {
        $this->container['cardBrand'] = $cardBrand;

        return $this;
    }

    /**
     * Gets cardToken
     *
     * @return string
     */
    public function getCardToken()
    {
        return $this->container['cardToken'];
    }

    /**
     * Sets cardToken
     *
     * @param string $cardToken cardToken
     *
     * @return self
     */
    public function setCardToken($cardToken)
    {
        $this->container['cardToken'] = $cardToken;

        return $this;
    }

    /**
     * Gets issuingCountry
     *
     * @return string
     */
    public function getIssuingCountry()
    {
        return $this->container['issuingCountry'];
    }

    /**
     * Sets issuingCountry
     *
     * @param string $issuingCountry issuingCountry
     *
     * @return self
     */
    public function setIssuingCountry($issuingCountry)
    {
        $this->container['issuingCountry'] = $issuingCountry;

        return $this;
    }

    /**
     * Gets funding
     *
     * @return string
     */
    public function getFunding()
    {
        return $this->container['funding'];
    }

    /**
     * Sets funding
     *
     * @param string $funding funding
     *
     * @return self
     */
    public function setFunding($funding)
    {
        $this->container['funding'] = $funding;

        return $this;
    }

    /**
     * Gets paymentMethodRegion
     *
     * @return string
     */
    public function getPaymentMethodRegion()
    {
        return $this->container['paymentMethodRegion'];
    }

    /**
     * Sets paymentMethodRegion
     *
     * @param string $paymentMethodRegion paymentMethodRegion
     *
     * @return self
     */
    public function setPaymentMethodRegion($paymentMethodRegion)
    {
        $this->container['paymentMethodRegion'] = $paymentMethodRegion;

        return $this;
    }

    /**
     * Gets threeDSResult
     *
     * @return string
     */
    public function getThreeDSResult()
    {
        return $this->container['threeDSResult'];
    }

    /**
     * Sets threeDSResult
     *
     * @param string $threeDSResult threeDSResult
     *
     * @return self
     */
    public function setThreeDSResult($threeDSResult)
    {
        $this->container['threeDSResult'] = $threeDSResult;

        return $this;
    }

    /**
     * Gets avsResultRaw
     *
     * @return string
     */
    public function getAvsResultRaw()
    {
        return $this->container['avsResultRaw'];
    }

    /**
     * Sets avsResultRaw
     *
     * @param string $avsResultRaw avsResultRaw
     *
     * @return self
     */
    public function setAvsResultRaw($avsResultRaw)
    {
        $this->container['avsResultRaw'] = $avsResultRaw;

        return $this;
    }

    /**
     * Gets cvvResultRaw
     *
     * @return string
     */
    public function getCvvResultRaw()
    {
        return $this->container['cvvResultRaw'];
    }

    /**
     * Sets cvvResultRaw
     *
     * @param string $cvvResultRaw cvvResultRaw
     *
     * @return self
     */
    public function setCvvResultRaw($cvvResultRaw)
    {
        $this->container['cvvResultRaw'] = $cvvResultRaw;

        return $this;
    }

    /**
     * Gets networkTransactionId
     *
     * @return string
     */
    public function getNetworkTransactionId()
    {
        return $this->container['networkTransactionId'];
    }

    /**
     * Sets networkTransactionId
     *
     * @param string $networkTransactionId networkTransactionId
     *
     * @return self
     */
    public function setNetworkTransactionId($networkTransactionId)
    {
        $this->container['networkTransactionId'] = $networkTransactionId;

        return $this;
    }

    /**
     * Gets creditPayPlan
     *
     * @return string
     */
    public function getCreditPayPlan()
    {
        return $this->container['creditPayPlan'];
    }

    /**
     * Sets creditPayPlan
     *
     * @param string $creditPayPlan creditPayPlan
     *
     * @return self
     */
    public function setCreditPayPlan($creditPayPlan)
    {
        $this->container['creditPayPlan'] = $creditPayPlan;

        return $this;
    }

    /**
     * Gets cardholderName
     *
     * @return string
     */
    public function getCardholderName()
    {
        return $this->container['cardholderName'];
    }

    /**
     * Sets cardholderName
     *
     * @param string $cardholderName cardholderName
     *
     * @return self
     */
    public function setCardholderName($cardholderName)
    {
        $this->container['cardholderName'] = $cardholderName;

        return $this;
    }

    /**
     * Gets cardBin
     *
     * @return string
     */
    public function getCardBin()
    {
        return $this->container['cardBin'];
    }

    /**
     * Sets cardBin
     *
     * @param string $cardBin cardBin
     *
     * @return self
     */
    public function setCardBin($cardBin)
    {
        $this->container['cardBin'] = $cardBin;

        return $this;
    }

    /**
     * Gets lastFour
     *
     * @return string
     */
    public function getLastFour()
    {
        return $this->container['lastFour'];
    }

    /**
     * Sets lastFour
     *
     * @param string $lastFour lastFour
     *
     * @return self
     */
    public function setLastFour($lastFour)
    {
        $this->container['lastFour'] = $lastFour;

        return $this;
    }

    /**
     * Gets expiryMonth
     *
     * @return string
     */
    public function getExpiryMonth()
    {
        return $this->container['expiryMonth'];
    }

    /**
     * Sets expiryMonth
     *
     * @param string $expiryMonth expiryMonth
     *
     * @return self
     */
    public function setExpiryMonth($expiryMonth)
    {
        $this->container['expiryMonth'] = $expiryMonth;

        return $this;
    }

    /**
     * Gets expiryYear
     *
     * @return string
     */
    public function getExpiryYear()
    {
        return $this->container['expiryYear'];
    }

    /**
     * Sets expiryYear
     *
     * @param string $expiryYear expiryYear
     *
     * @return self
     */
    public function setExpiryYear($expiryYear)
    {
        $this->container['expiryYear'] = $expiryYear;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    public function toArray(): array
    {
        $array = [];
        foreach (self::$openAPITypes as $propertyName => $propertyType) {
            $propertyValue = $this[$propertyName];
            if ($propertyValue !== null) {
                // Check if the property value is an object and has a toArray() method
                if (is_object($propertyValue) && method_exists($propertyValue, 'toArray')) {
                    $array[$propertyName] = $propertyValue->toArray();
                // Check if it's type datetime
                } elseif ($propertyValue instanceof \DateTime) {
                    $array[$propertyName] = $propertyValue->format(DATE_ATOM);
                // If it's an array type we should check whether it contains objects and if so call toArray method
                } elseif (is_array($propertyValue)) {
                    $array[$propertyName] = array_map(function ($item) {
                        return $item instanceof ModelInterface ? $item->toArray() : $item;
                    }, $propertyValue);
                } else {
                    // Otherwise, directly assign the property value to the array
                    $array[$propertyName] = $propertyValue;
                }
            }
        }
        return $array;
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}
