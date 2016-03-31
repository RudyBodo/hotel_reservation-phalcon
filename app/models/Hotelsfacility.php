<?php

class Hotelsfacility extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $hotel_id;

    /**
     *
     * @var integer
     */
    public $facility_id;


    /**
     *
     * @var integer
     */
    public $amount;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function initialize()
    {
        $this->belongsTo("hotel_id", "Hotels", "id");
        $this->belongsTo("facility_id", "Facility", "id");
    }

    public function getSource()
    {
        return 'hotelsfacility';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Hotelsfacility[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Hotelsfacility
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
