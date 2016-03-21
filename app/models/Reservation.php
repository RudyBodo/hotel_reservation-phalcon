<?php

class Reservation extends \Phalcon\Mvc\Model
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
    public $user_id;

    /**
     *
     * @var integer
     */
    public $hotel_id;

    /**
     *
     * @var string
     */
    public $reservation_code;

    /**
     *
     * @var string
     */
    public $checkin_date;

    /**
     *
     * @var string
     */
    public $checkout_date;

    /**
     *
     * @var string
     */
    public $room_number;

    /**
     *
     * @var string
     */
    public $room;

    /**
     *
     * @var integer
     */
    public $adult;

    /**
     *
     * @var integer
     */
    public $amount;

    /**
     *
     * @var integer
     */
    public $night;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $checkin_status;

    /**
     *
     * @var integer
     */
    public $checkout_status;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function initialize()
    {
        $this->belongsTo("hotel_id", "Hotels", "id");
        $this->belongsTo("user_id", "User", "id");
        $this->hasMany("id", "Transaction", "reservation_id");
    }

    public function getSource()
    {
        return 'reservation';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reservation[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reservation
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
