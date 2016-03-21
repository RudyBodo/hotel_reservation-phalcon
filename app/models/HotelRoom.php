<?php

class HotelRoom extends \Phalcon\Mvc\Model
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
    public $room_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public $price;

    public function initialize()
    {
        $this->belongsTo("hotel_id", "Hotels", "id");
        $this->belongsTo("room_id", "Room", "id");
    }

    public function getSource()
    {
        return 'hotel_room';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return HotelRoom[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return HotelRoom
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
