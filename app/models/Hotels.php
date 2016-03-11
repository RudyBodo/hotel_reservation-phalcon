<?php

class Hotels extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var integer
     */
    public $zipcode;

    /**
     *
     * @var double
     */
    public $price;

    /**
     *
     * @var integer
     */
    public $city_id;

    /**
     *
     * @var integer
     */
    public $province_id;

    /**
     *
     * @var integer
     */
    public $country_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function initialize()
    {
        $this->hasMany("id", "Hotelsfacility", "hotelid");
        $this->belongsTo("city_id", "City", "id");
        $this->belongsTo("province_id", "Province", "id");
        $this->belongsTo("country_id", "Country", "id");

    }

    public function getSource()
    {
        return 'hotels';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Hotels[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Hotels
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
