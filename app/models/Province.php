<?php

class Province extends \Phalcon\Mvc\Model
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
    public $province;

    /**
     *
     * @var string
     */
    public $code;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function initilize(){
        $this->hasMany("id", "Hotels", "province_id");
    }

    public function getSource()
    {
        return 'province';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Province[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Province
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
