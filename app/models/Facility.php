<?php

class Facility extends \Phalcon\Mvc\Model
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
    public $nick;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */

    public function initilaize()
    {
        $this->hasMany("id", "Hotelsfacility", "facility_id");
    }

    public function getSource()
    {
        return 'facility';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Facility[]
     */

    public function initilize()
    {
     $this->hasMany("id", "Hotelsfacility", "facility_id");
    }

    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Facility
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
