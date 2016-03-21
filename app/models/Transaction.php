<?php

class Transaction extends \Phalcon\Mvc\Model
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
    public $reservation_id;

    /**
     *
     * @var integer
     */
    public $total_price;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function beforeSave()
    {
        //sample generate transaction in local model

    }

    public function initialize()
    {
        $this->belongsTo("reservation_id", "Reservation", "id");
    }

    public function getSource()
    {
        return 'transaction';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Transaction[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Transaction
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
