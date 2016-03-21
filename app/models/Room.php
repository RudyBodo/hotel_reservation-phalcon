<?php

class Room extends \Phalcon\Mvc\Model
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
    public $room;

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

    public function initialize()
    {
        $this->hasMany("id", "HotelRoom", "room_id");
    }

    public function getSource()
    {
        return 'room';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Room[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Room
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
